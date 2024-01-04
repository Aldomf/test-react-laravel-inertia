<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Information;

class EntrepriseGestion extends Controller
{
    public function index()
    {
        // Récupérer les utilisateurs actifs avec leurs informations liées
        $usersActifs = User::where('actif', 1)->where('role','entreprise')->with('information')->get();

        // Récupérer les utilisateurs inactifs avec leurs informations liées
        $usersInactifs = User::where('actif', 0)->where('role','entreprise')->with('information')->get();

        return view('admin.entreprise', compact('usersActifs', 'usersInactifs'));
    }
}
