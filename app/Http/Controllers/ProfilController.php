<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserTraining;
use App\Models\Document;
use App\Models\ConseillerJeune;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function profil()
    {
        $user = Auth::user();
        $information = $user->information; // Récupère les informations liées à l'utilisateur

         // Le jeune peut télécharger les documents que son conseiller a envoyés
         $documents = $user->documents;


        return view('profil', compact('information','documents'));
    }

    public function edit()
    {
        // Récupérez les données de l'utilisateur actuel
        $information = Auth::user()->information;

        // Retournez la vue avec les données de l'utilisateur
        return view('edit', compact('information'));
    }

    public function update(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            // Ajoutez ici les règles de validation pour chaque champ
        ]);

        // Mettez à jour les données de l'utilisateur
        $user = Auth::user();
        $user->information->update($request->all());

        // Redirigez l'utilisateur vers la page de profil avec un message de succès
        return redirect('profil')->with('success', 'Profil mis à jour avec succès.');
    }

    public function editPassword()
    {
        return view('editPassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Vérifier si le mot de passe actuel est correct
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe en utilisant la méthode update sur le modèle User
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect('profil')->with('success', 'Mot de passe mis à jour avec succès.');
    }


    public function rendezVous()
    {
        // Récupérez l'utilisateur connecté (jeune)
        $jeune = auth()->user();

        // Chargez les rendez-vous liés à ce jeune
        $rendezVous = $jeune->rendezVous;

        return view('mesrendezvous', compact('rendezVous'));
    }

    public function mesformations()
    {
        // Récupérer les formations auxquelles l'utilisateur a postulé avec leur statut
        $user = auth()->user();
        $formations = $user->userTrainings;

        return view('mesformations', compact('formations'));
    }


    public function downloadDocument($documentId)
    {
        $document = Document::findOrFail($documentId);

        $filePath = storage_path('app/public/' . $document->document_path);

        return response()->download($filePath, $document->title . '.pdf');
    }
}
