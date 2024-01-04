<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Information;
use App\Models\BusinessManagerEntreprise;
use Illuminate\Support\Facades\DB;

class ChargeEntrepriseController extends Controller
{
    //

    public function entreprise()
    {
        // Récupérez l'utilisateur connecté (conseiller)
        $businessmanager = auth()->user();
    
        // Chargez les jeunes liés à ce conseiller
        $entreprises = $businessmanager->entreprises;
    
        return view('businessManager.entreprise', compact('entreprises'));
    }
}
