<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontController extends Controller
{
    public function Accueil()
    {
        // $latestNews = News::orderBy('created_at', 'desc')->take(3)->get();

        return Inertia::render('Accueil', [
            // 'latestNews' => $latestNews,
        ]);
    }
    
    public function nosmissions()
    {
        return Inertia::render('NosMissions');
    }

    public function noscommunes()
    {
        return Inertia::render('NosCommunes');
    }

    public function gouvernance()
    {
        return Inertia::render('Gouvernance');
    }

    public function equipe()
    {
        return Inertia::render('Equipe');
    }

    //
    public function seformer()
    {
        return Inertia::render('SeFormer');
    }

    public function orienter()
    {
        return Inertia::render('Sorienter');
    }

    public function trouverUnEmploi()
    {
        return Inertia::render('TrouverUnEmploi');
    }

    function etreAccompagne()
    {
        return Inertia::render('EtreAccompagne');
    }

    //
    public function actualite()
    {
        //$actualites = News::orderBy('created_at', 'desc')->paginate(6);

        return Inertia::render('Actualites', [
            //'actualites' => $actualites,
        ]);
    }

    public function uneactualite($id)
    {
        //$actualite = News::findOrFail($id); // Récupère l'actualité correspondant à l'ID

        return Inertia::render('UneActualite', [
            //'actualite' => $actualite,
        ]);
    }

    //
    public function ateliers()
    {
        //$ateliers = Atelier::where('actif', 1)->orderBy('date')->get();

        return Inertia::render('Ateliers', [
            //'ateliers' => $ateliers,
        ]);
    }

    public function unatelier($id)
    {
        //$atelier = Atelier::findOrFail($id);

        // Conversion de la date en objet Carbon pour manipulation
        //$date = \Carbon\Carbon::parse($atelier->date);
        // Extraction du jour, mois et année
        //$day = $date->format('d');
        //$month = $date->format('m');
        //$year = $date->format('Y');

        return Inertia::render('UnAtelier', [
            //'atelier' => $atelier,
            //'day' => $day,
            //'month' => $month,
            //'year' => $year,
        ]);
    }

}
