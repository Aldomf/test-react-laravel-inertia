<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Information;

class ManagerController extends Controller
{
    public function index(){
        
        $activeManagers = User::where('role', 'manager')->where('actif', 1)->get();

        return view('admin.manager.manager',compact('activeManagers'));
    }
    
    public function managerInactif(){
        $inactiveManagers = User::where('role', 'manager')->where('actif', 0)->get();

        return view('admin.manager.managerInactive',compact('inactiveManagers'));
    }

    public function create()
    {
        return view('admin.manager.create');
    }


    public function store(Request $request){
        // Validation des données du formulaire
        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
            'last_name' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
            'phone' => 'required|regex:/^[+0-9 -]+$/|between:10,20',
            'email' => 'required|email|unique:preregistrations,email|unique:users,email|unique:information,email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ],[
            'password.required' => 'Le champ du mot de passe est requis.',
            'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.',

            'first_name.required' => 'Le champ Prénom est requis.',
            'first_name.regex' => 'Le Prénom doit contenir  des lettres, les espaces et les tirets sont acceptés.',

            'last_name.required' => 'Le champ Nom est requis.',
            'last_name.regex' => 'Le Nom doit contenir uniquement des lettres.',

            'phone.required' => 'Le champ Téléphone est requis.',
            'phone.min' => 'Le Téléphone doit contenir au moins 10 chiffres',
            'phone.min' => 'Le Téléphone doit contenir au maximum 20 chiffres',
            'phone.regex' => 'Le Téléphone doit contenir uniquement des chiffres.',

            'email.required' => 'Le champ Email est requis.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'email.unique' => 'Cet email est déjà pris.',

        ]);

        // Création de l'utilisateur (manager) dans la table users
        $user = new User;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'manager';
        $user->actif = 1;
        $user->save();

        // Création des informations de l'utilisateur dans la table informations
        $information = new Information;
        $information->user_id = $user->id;
        $information->first_name = $request->input('first_name');
        $information->last_name = $request->input('last_name');
        $information->phone = $request->input('phone');
        $information->email = $request->input('email');
        $information->save();

        // Redirection avec un message de succès
        return redirect()->route('admin.manager.manager')->with('success', 'Manager créé avec succès.');
        }


    
    public function toggle($id)
    {
        $user = User::findOrFail($id);
        $user->actif = !$user->actif; // Inversez la valeur d'actif (1 devient 0 et vice versa)
        $user->save();

        return redirect()->back()->with('success', 'Conseiller activée/désactivée avec succès.');
    }
    public function edit($id)
    {
        // Récupérer la formation par son ID
        $user = User::findOrFail($id);
        if (!$user) {
        return redirect()->route('admin.manager.manager')->with('error', 'Formation non trouvée');
        }
        // Retourner la vue d'édition avec la formation
        return view('admin.manager.edit_manager', compact('user'));
    }

 
    public function update(Request $request, $id)
    {
        // Récupération de l'utilisateur
        $user = User::findOrFail($id);

        // Validation des données du formulaire
        // Récupération de l'utilisateur
    $user = User::findOrFail($id);

    // Définition des règles de validation
    $rules = [
        'first_name' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
        'last_name' => 'required|regex:/^[a-zA-ZÀ-ÿ -]+$/',
        'phone' => 'required|regex:/^[+0-9 -]+$/|between:10,20',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ];

    $customMessages = [
        'first_name.required' => 'Le champ Prénom est requis.',
        'first_name.regex' => 'Le Prénom doit contenir  des lettres, les espaces et les tirets sont acceptés.',

        'last_name.required' => 'Le champ Nom est requis.',
        'last_name.regex' => 'Le Nom doit contenir uniquement des lettres.',

        'phone.required' => 'Le champ Téléphone est requis.',
        'phone.min' => 'Le Téléphone doit contenir au moins 10 chiffres',
        'phone.min' => 'Le Téléphone doit contenir au maximum 20 chiffres',
        'phone.regex' => 'Le Téléphone doit contenir uniquement des chiffres.',

        'email.required' => 'Le champ Email est requis.',
        'email.email' => 'Veuillez saisir une adresse email valide.',
        'email.unique' => 'Cet email est déjà pris.',
    ];

    // Validation des données du formulaire
    $request->validate($rules, $customMessages);

        // Utilisation d'une transaction pour assurer la cohérence des mises à jour
        DB::transaction(function () use ($request, $user) {
            // Mise à jour des informations de l'utilisateur dans la table informations
            $user->information->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);

            // Mise à jour de l'email dans la table users
            $user->email = $request->input('email');
            $user->save();
        });

        return redirect()->route('admin.manager.manager')->with('success', 'Manager mis à jour avec succès.');
    }
}
