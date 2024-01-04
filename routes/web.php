<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Pour le back
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Accueil', [
        
//     ]);
// });

// Route::get('/nos-missions', function () {
//     return Inertia::render('NosMissions');
// })->name('nosMissions');

Route::controller(FrontController::class)->group(function () {
    Route::get('/','Accueil')->name('home');

    //Missions
    Route::get('/nos-missions','nosmissions')->name('nosmissions');
    Route::get('/nos-communes','noscommunes')->name('noscommunes');
    Route::get('/gouvernance','gouvernance')->name('gouvernance');
    Route::get('/equipe','equipe')->name('equipe');

    //Services
    Route::get('/se-former','seformer')->name('seformer');
    Route::get('/sorienter','orienter')->name('orienter');
    Route::get('/trouver-un-emploi','TrouverUnEmploi')->name('trouverUnEmploi');
    Route::get('/etre-accompagne','etreAccompagne')->name('etreAccompagne');
   
    //Actualites
    Route::get('/actualites','actualite')->name('actualite');
    Route::get('/actualites/{id}','uneactualite')->name('actualiteDetail');

    //Atelier
    Route::get('/ateliers','ateliers')->name('ateliers');
    Route::get('/ateliers/{id}','unatelier')->name('atelierDetail');

    //Entreprise
    Route::get('/expertise','notreexpertise')->name('notreexpertise');
    Route::get('/taxe-apprentissage','taxeapprentissage')->name('taxeapprentissage');
    Route::get('/demarche-rse','demarcheRSE')->name('demarcheRSE');

    //Contact
    Route::get('/contact','contact')->name('contact');

    //Connexion
    Route::get('/connexion-jeune','inscriptionjeune')->name('inscriptionjeune');
    Route::get('/connexion-entreprise','inscriptionentreprise')->name('inscriptionentreprise');

    //Formations
    Route::get('/formations','formation')->name('formation');
    Route::get('/formations/{id}','formationDetail')->name('formationDetail');
});













Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
