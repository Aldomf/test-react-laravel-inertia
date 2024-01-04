<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;

use App\Models\User;
use App\Models\Information;

use App\Models\Training;
use App\Models\UserTraining;
use App\Models\Atelier;
use App\Models\UserAtelier;


class ConseillerController extends Controller
{
    public function jeunes()
{
    // Récupérez l'utilisateur connecté (conseiller)
    $conseiller = auth()->user();

    // Chargez les jeunes liés à ce conseiller
    $jeunes = $conseiller->jeunes;

    return view('conseiller.jeune', compact('jeunes'));
}
public function formation()
{
    $formations = Training::all();

    // Récupérer le nombre de candidatures pour chaque formation selon le statut
    $candidaturesParFormation = [];

    foreach ($formations as $formation) {
        // Récupérer le nombre de candidatures 'en attente' pour chaque formation
        $candidaturesEnAttente = UserTraining::where('training_id', $formation->id)
            ->where('status', 'en attente')
            ->count();

        // Récupérer le nombre de candidatures 'acceptées' pour chaque formation
        $candidaturesAcceptees = UserTraining::where('training_id', $formation->id)
            ->where('status', 'accepte')
            ->count();

        // Stocker le nombre de candidatures 'en attente' et 'acceptées' par formation dans un tableau associatif
        $candidaturesParFormation[$formation->id]['en_attente'] = $candidaturesEnAttente;
        $candidaturesParFormation[$formation->id]['accepte'] = $candidaturesAcceptees;
    }

    return view('conseiller.trainings.training', compact('formations', 'candidaturesParFormation'));
}

public function showCandidatures(Training $formation)
{
    // Récupérer les candidatures pour la formation spécifique avec le statut en attente
    $candidaturesEnAttente = $formation->userTrainings()
        ->where('status', 'en attente')
        ->with('user.information')
        ->get();

    return view('conseiller.trainings.showCandidature', compact('formation', 'candidaturesEnAttente'));
}

public function validerCandidature(UserTraining $candidature)
{
    // Valider la candidature
    $candidature->update(['status' => 'accepte']);
   

    return redirect()->back()->with('success', 'Candidature validée avec succès.');
}

public function refuserCandidature(UserTraining $candidature)
{
    // Refuser la candidature
    $candidature->update(['status' => 'refuse']);
 

    return redirect()->back()->with('success', 'Candidature refusée avec succès.');
}

public function showAcceptees($formationId)
{
    // Récupérer la formation
    $formation = Training::findOrFail($formationId);

    // Récupérer les utilisateurs acceptés pour cette formation
    $usersAcceptes = UserTraining::where('training_id', $formation->id)
        ->where('status', 'accepte')
        ->with(['user.information', 'user.conseillerJeunes.conseiller.information'])
        ->get();

    return view('conseiller.trainings.showAccepte', compact('formation', 'usersAcceptes'));
}

public function atelier()
{
    $conseiller = auth()->user();
    $jeunesSuivisIds = $conseiller->jeunes->pluck('id')->toArray();

    $ateliers = Atelier::all();
    $candidaturesParAtelier = [];

    foreach ($ateliers as $atelier) {
        $candidaturesEnAttente = UserAtelier::whereIn('user_id', $jeunesSuivisIds)
            ->where('atelier_id', $atelier->id)
            ->where('status', 'en attente')
            ->count();

            $candidaturesAcceptees = UserAtelier::where('atelier_id', $atelier->id)
            ->where('status', 'accepte')
            ->count();
        $candidaturesParAtelier[$atelier->id]['en_attente'] = $candidaturesEnAttente;
        $candidaturesParAtelier[$atelier->id]['accepte_total'] = $candidaturesAcceptees;
    }

    return view('conseiller.ateliers.atelier', compact('ateliers', 'candidaturesParAtelier'));
}

public function enAttente(Atelier $atelier)
{
    $conseiller = auth()->user();
    $jeunesSuivisIds = $conseiller->jeunes->pluck('id')->toArray();

    $candidaturesEnAttente = UserAtelier::whereIn('user_id', $jeunesSuivisIds)
        ->where('atelier_id', $atelier->id)
        ->where('status', 'en attente')
        ->with('user.information') // Charger les informations utilisateur
        ->get();

    return view('conseiller.ateliers.showCandidature', compact('candidaturesEnAttente', 'atelier'));
}
public function accepter($id)
{
    // Trouver la candidature
    $candidature = UserAtelier::findOrFail($id);

    // Modifier le statut de la candidature en 'accepte'
    $candidature->status = 'accepte';
    $candidature->save();

    return redirect()->back()->with('success', 'Candidature acceptée avec succès.');
}

public function refuser($id)
{
    // Trouver la candidature
    $candidature = UserAtelier::findOrFail($id);

    // Modifier le statut de la candidature en 'refuse'
    $candidature->status = 'refuse';
    $candidature->save();

    return redirect()->back()->with('success', 'Candidature refusée.');
}


public function generatePDF($id)
{
    $user = User::find($id);
    $information = Information::where('user_id', $id)->first();
    $formattedDate = now()->format('d/m/Y');
    
    if ($user && $information) {
        // Calcul de l'âge à partir de la date de naissance
        $dateOfBirth = \Carbon\Carbon::parse($information->dateOfBirth);
        $age = $dateOfBirth->diffInYears(\Carbon\Carbon::now());

        // Nom du fichier PDF avec l'âge inclus
        $fileName = 'Dossier_inscription_' . $information->last_name . '_' . $information->first_name . '_' . $age . 'ans_' . $formattedDate . '.pdf';

        // Générer le contenu du PDF
        $pdf = \PDF::loadView('user_info', [
            'user' => $user,
            'information' => $information,
            'age' => $age, // Passer l'âge à la vue
        ]);

        // Télécharger le fichier PDF
        return $pdf->download($fileName);
    } else {
        return "Utilisateur introuvable ou manque d'informations.";
    }
}

}
