<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Information;

class UserGestion extends Controller
{
    public function index()
    {
        // Récupérer les utilisateurs actifs avec leurs informations liées
        $usersActifs = User::where('actif', 1)->where('role','jeune')->with('information')->get();

        // Récupérer les utilisateurs inactifs avec leurs informations liées
        $usersInactifs = User::where('actif', 0)->where('role','jeune')->with('information')->get();

        return view('admin.user', compact('usersActifs', 'usersInactifs'));
    }
    public function toggleActivation($id)
{
    $user = User::find($id);
    $user->actif = !$user->actif; // Inversez l'état actif de l'utilisateur (0 devient 1, et vice versa)
    $user->save();

    return redirect()->back()->with('success', 'État actif de l\'utilisateur mis à jour.');
}
}
