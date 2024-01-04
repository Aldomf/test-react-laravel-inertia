<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Preregistrations;

class EntrepriseController extends Controller
{
    public function index()
    {
        return view('admin.registerEntreprise'); // Retourne la vue 'registerEntreprise' du dossier 'admin' dans 'resources/views/admin'
    }

    public function register(Request $request)
    {
        // Validation des données
        $request->validate([
            'password' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'company_name' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
            'siret' => 'required|regex:/^[0-9]{14}$/|unique:preregistrations,siret',
            'responsible_name' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
            'company_phone' => 'required|regex:/^[+0-9 -]+$/|between:10,20',
            'company_email' => 'required|email|unique:preregistrations,email||unique:information,email',
            
        ], [
            
            'company_email.required' => 'Le Nom de l\'entreprise est requis.',
            'company_email.unique' => 'Cet email est déjà pris.',
            'password.required' => 'Le champ du mot de passe est requis.',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.',
            'siret.required' => 'Le Numéro Siret est requis.',
            'siret.min' => 'Le mot de passe doit comporter au moins 14 chiffres.',
            'responsible_name.required' => 'Le nom d\'un interlocuteur est requis',
            'responsible_name.regex' => 'Le nom de l\'interlocuteur',
            'company_phone.required' => 'Le champ Téléphone est requis.',
            'company_phone.digits' => 'Le Téléphone doit contenir exactement :digits chiffres.',
            'company_phone.regex' => 'Le Téléphone doit contenir uniquement des chiffres.',
            'company_email.required' => 'Le champ Email est requis.',
            'company_email.email' => 'Veuillez saisir une adresse email valide.',
            'company_email.unique' => 'Cet email est déjà pris.',
        ]);
    
        // Création d'une nouvelle Préinscription
        $preregistration = new Preregistrations();
        $preregistration->password = bcrypt($request->input('password'));
        $preregistration->company_name = $request->input('company_name');
        $preregistration->siret = $request->input('siret');
        $preregistration->responsible_name = $request->input('responsible_name');
        $preregistration->company_phone = $request->input('company_phone');
        $preregistration->company_email = $request->input('company_email');
        
        $preregistration->role = 'entreprise';
    
        // Enregistrement de la Préinscription
        $preregistration->save();
    
         // Ajouter un message de succès à la session flash
    session()->flash('success', 'Votre préinscription a été enregistrée avec succès!');
        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('admin.registerEntreprise.post');
    }

}
