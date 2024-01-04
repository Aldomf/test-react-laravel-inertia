<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Training;
use App\Models\UserTraining;
use App\Models\UserAtelier;
use App\Models\User;
use App\Models\Atelier;
use App\Models\Joboffer;
use App\Models\ConseillerJeune;
use App\Models\Staff;
use App\Models\News;
use App\Models\PhotoGroupe;
use App\Models\UserJoboffer;

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

    //Entreprise
    public function notreexpertise()
    {
        return Inertia::render('Expertise');
    }

    public function taxeapprentissage()
    {
        return Inertia::render('TaxeApprentissage');
    }

    public function demarcheRSE()
    {
        return Inertia::render('DemarcheRse');
    }

    //Contact
    public function contact()
    {
        return Inertia::render('Contact');
    }

    //Connexion
    public function inscriptionjeune()
    {
        return Inertia::render('ConnexionJeune');
    }

    public function inscriptionentreprise()
    {
        return Inertia::render('ConnexionEntreprise'); 
    }

    //Formations
    public function formation()
    {
        //$formations = Training::paginate(6);
    
        return Inertia::render('Formation', [ //'formations' => $formations
         ]); // Assuming 'Formation' is the Inertia view file
    }

    public function formationDetail($id)
    {
        //$formation = Training::findOrFail($id);

        return Inertia::render('Formations', [ //'formation' => $formation
        ]); // Assuming 'FormationDetail' is the Inertia view file
    }
}
