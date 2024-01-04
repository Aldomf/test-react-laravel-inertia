<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preregistrations;
use App\Models\User;
use App\Models\Information;
use App\Models\ConseillerJeune;
use App\Models\BusinessManagerEntreprise;


class ValidationRegisterController extends Controller
{
    public function index()
    {
    
        // Récupérez les jeunes (rôle 'jeune') non validés
        $jeunes = Preregistrations::where('role', 'jeune')->where('valid', 0)->get();
    
        $refusjeune = Preregistrations::where('role','jeune')->where('valid','1')->get();

        $conseillers = User::where('role', 'manager')
        ->join('information', 'users.id', '=', 'information.user_id')
        ->select('users.id', 'information.first_name', 'information.last_name')
        ->get();
            
        return view('admin.validPreregister', compact('jeunes','refusjeune','conseillers')); 
    }

    public function entreprise()
    {
            // Récupérez les entreprises (rôle 'entreprise') non validées
            $entreprises = Preregistrations::where('role', 'entreprise')->where('valid', 0)->get();

            $refusentreprise = Preregistrations::where('role','entreprise')
            ->where('valid','1')->get();

            $business_managers = User::where('role','businessManager')
            ->join('information','users.id','=','information.user_id')
            ->select('users.id', 'information.first_name', 'information.last_name')
            ->get();

        return view('admin.validPreregisterEntreprise',compact('entreprises','refusentreprise','business_managers'));
    }
    public function validation(Request $request)
{
    // Récupérer l'ID de l'utilisateur à valider
    $userId = $request->input('user_id');

    // Récupérer les informations de l'utilisateur à partir de la table Preregistrations
    $preregistration = Preregistrations::find($userId);

    // Créer un nouvel utilisateur dans la table Users
    $user = new User();
    $user->email = $preregistration->email;
    $user->password = $preregistration->password;
    $user->role = $preregistration->role;
    $user->save();

    // Créer un nouvel enregistrement dans la table Information
    $information = new Information();

    //Jeune
    $information->first_name = $preregistration->first_name;
    $information->last_name = $preregistration->last_name;
    $information->city = $preregistration->city;
    $information->phone = $preregistration->phone;
    $information->email = $preregistration->email;
    $information->dateOfBirth = $preregistration->dateOfBirth;

    $information->user_id = $user->id; // Assurez-vous que la colonne user_id est présente dans la table Information
    $information->save();

    // Récupérer l'ID du conseiller sélectionné depuis le formulaire
    $conseillerId = $request->input('conseiller_id');

    // Créer une nouvelle entrée dans la table ConseillerJeune
    $conseillerJeune = new ConseillerJeune();
    $conseillerJeune->conseiller_id = $conseillerId; // ID du conseiller sélectionné
    $conseillerJeune->jeune_id = $user->id; // ID du jeune
    $conseillerJeune->save();

    // Supprimer l'enregistrement de Preregistrations après la validation
    $preregistration->delete();

    session()->flash('success', 'Votre préinscription a été enregistrée avec succès!');
    // Rediriger l'utilisateur avec un message de succès
    return back();
}
public function validationEntreprise(Request $request)
{
    // Récupérer l'ID de l'utilisateur à valider
    $userId = $request->input('user_id');

    // Récupérer les informations de l'utilisateur à partir de la table Preregistrations
    $preregistration = Preregistrations::find($userId);

    // Créer un nouvel utilisateur dans la table Users
    $user = new User();
    $user->email = $preregistration->company_email;
    $user->password = $preregistration->password; // Vous pouvez ajouter la logique de hashage ici si nécessaire
    $user->role = $preregistration->role;
    $user->save();

    // Créer un nouvel enregistrement dans la table Information
    $information = new Information();
    // Remplissez les autres champs de la table Information ici en fonction de votre structure de données
    //Entreprise
    $information->company_name = $preregistration->company_name;
    $information->siret = $preregistration->siret;
    $information->company_phone = $preregistration->company_phone;
    $information->company_email = $preregistration->company_email;
    $information->responsible_name = $preregistration->responsible_name;

    $information->user_id = $user->id; // Assurez-vous que la colonne user_id est présente dans la table Information
    $information->save();

    // Récupérer l'ID du businessManager sélectionné depuis le formulaire
    $business_manager_id = $request->input('business_manager_id');

    // Créer une nouvelle entrée dans la table business_manager_entreprise
    $business_entreprise = new BusinessManagerEntreprise();
    $business_entreprise->business_manager_id = $business_manager_id; // ID du businessManager sélectionné
    $business_entreprise->entreprise_id = $user->id; // ID de l'entreprise
    $business_entreprise->save();

    // Supprimer l'enregistrement de Preregistrations après la validation
    $preregistration->delete();

    session()->flash('success1', 'La préinscription a été enregistrée avec succès!');
    // Rediriger l'utilisateur avec un message de succès
    return back();
}

public function getUserDetails(Request $request) {
    // Récupérez l'ID de l'utilisateur depuis la requête AJAX
    $preregistrationId = $request->input('preregistration_id');

    // Récupérez les détails de l'utilisateur en fonction de l'ID et retournez-les au format JSON
    $userDetails = Preregistrations::find($preregistrationId);
    return response()->json($userDetails);
}

public function upgradeValid(Request $request, $id)
{
    // Recherchez la préinscription par son ID
    $preregistration = Preregistrations::findOrFail($id);

    // Mettez à jour la valeur de 'valid' à 1
    $preregistration->update(['valid' => 1]);

    // Redirigez l'utilisateur vers la page précédente avec un message de succès
    return redirect()->back()->with('success', 'La préinscription a été refusée avec succès.');
}

public function upgradeValidjeune(Request $request, $id)
{
    // Recherchez la préinscription par son ID
    $preregistration = Preregistrations::findOrFail($id);

    // Mettez à jour la valeur de 'valid' à 1
    $preregistration->update(['valid' => 1]);

    // Redirigez l'utilisateur vers la page précédente avec un message de succès
    return redirect()->back()->with('success', 'La préinscription a été refusée avec succès.');
}


public function deleteJeune($id)
{
    // Trouver le jeune à supprimer dans la base de données par son ID
    $jeune = Preregistrations::find($id);

    // Vérifier si le jeune a été trouvé
    if ($jeune) {
        // Supprimer le jeune de la base de données
        $jeune->delete();
        
        session()->flash('success', 'Le jeune a été supprimé avec succès!');
    } else {
        session()->flash('error', 'Jeune non trouvé ou déjà supprimé.');
    }

    // Rediriger l'utilisateur vers la page précédente
    return back();
}
public function deleteEntreprise($id)
{
    // Trouver le jeune à supprimer dans la base de données par son ID
    $entreprise = Preregistrations::find($id);

    // Vérifier si le jeune a été trouvé
    if ($entreprise) {
        // Supprimer le jeune de la base de données
        $entreprise->delete();
        
        session()->flash('success', "L'entreprise' a été supprimé avec succès!");
    } else {
        session()->flash('error', 'Jeune non trouvé ou déjà supprimé.');
    }

    // Rediriger l'utilisateur vers la page précédente
    return back();
}
}
