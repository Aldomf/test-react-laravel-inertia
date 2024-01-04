<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Preregistrations;

class CandidatController extends Controller
{
  public function index()
  {
    return view('admin.registerCandidat');// Retourne la vue 'registerCandidat' du dossier 'admin' dans 'resources/views/admin'
  }

  public function register(Request $request)
  {
    // Validation des données
// dd($request->all());
$request->validate([
  'password' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
  'first_name' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
  'last_name' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
  'phone' => 'required|regex:/^[\d\s]+$/|digits_between:10,20',
  'email' => 'required|email|unique:preregistrations,email|unique:users,email|unique:information,email',
  'city' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
  'dateOfBirth' => 'required|date|before_or_equal:-16 years|after_or_equal:-25 years',
], [
  'password.required' => 'Le champ du mot de passe est requis.',
  'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
  'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.',
  'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',

  'first_name.required' => 'Le champ Prénom est requis.',
  'first_name.regex' => 'Le Prénom doit contenir uniquement des lettres.',

  'last_name.required' => 'Le champ Nom est requis.',
  'last_name.regex' => 'Le Nom doit contenir uniquement des lettres.',

  'phone.required' => 'Le champ Téléphone est requis.',
  'phone.digits' => 'Le Téléphone doit contenir exactement :digits chiffres.',
  'phone.regex' => 'Le Téléphone doit contenir uniquement des chiffres.',

  'email.required' => 'Le champ Email est requis.',
  'email.email' => 'Veuillez saisir une adresse email valide.',
  'email.unique' => 'Cet email est déjà pris.',

  'city.required' => 'Le champ Commune est requis.',
  'city.regex' => 'La Commune doit contenir uniquement des lettres.',

  'dateOfBirth.required' => 'Le champ Date de naissance est requis.',
  'dateOfBirth.date' => 'Veuillez saisir une date valide.',
  'dateOfBirth.before_or_equal' => 'Vous devez avoir au moins 16 ans.',
  'dateOfBirth.after_or_equal' => 'Vous devez avoir moins de 25 ans.',
]);

    // Création d'une nouvelle préinscription
     // Création d'une nouvelle Préinscription
     $preregistration = new Preregistrations();
     $preregistration->password = bcrypt($request->input('password'));
     $preregistration->first_name = $request->input('first_name');
     $preregistration->last_name = $request->input('last_name');
     $preregistration->phone = $request->input('phone');
     $preregistration->email = $request->input('email');
     $preregistration->city = $request->input('city');
     $preregistration->dateOfBirth = $request->input('dateOfBirth');
     $preregistration->role = 'jeune';
     #dd($preregistration);
     // Enregistrement de la Préinscription
     $preregistration->save();
     

     // Rediriger l'utilisateur avec un message de succès
     return redirect()->route('preinscription')->with('success', "Votre préinscription a été enregistrée avec succès. Il ne vous reste désormais plus qu'à attendre que l'un de nos conseillers prenne contact avec vous.");
  }
}
