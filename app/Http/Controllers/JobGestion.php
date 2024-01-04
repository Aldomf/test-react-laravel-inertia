<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Joboffer;

class JobGestion extends Controller
{
   public function index(){



    $inactiveJob = Joboffer::where('actif', 0)->with('user.information')->get();

    return view('admin.job.job',compact('inactiveJob'));
   }

   public function alljob(){
    $activeJob = Joboffer::where('actif', 1)->with('information')->get();

    return view('admin.job.alljob',compact('activeJob'));
   }
   public function create()
   {
       return view('admin.job.create');
   }

   
   public function store(Request $request)
   {
       // Validation des données du formulaire
       $request->validate([
        'title' => 'required|string|max:255',
        'job' => 'required|string',
        'type' => 'required|string|in:CDI,CDD,Alternance',
        'description' => 'nullable|string',
        'publication' => 'nullable|date',
    ], [
        'title.required' => 'Le champ "Titre" est requis.',
        'title.string' => 'Le champ "Titre" doit être une chaîne de caractères.',
        'title.max' => 'Le champ "Titre" ne doit pas dépasser :max caractères.',

        'job.required' => 'Le champ "Job visé" est requis.',
        'job.string' => 'Le champ "Job visé" doit être une chaîne de caractères.',

        'type.required' => 'Le champ "Type" est requis.',
        'type.string' => 'Le champ "Type" doit être une chaîne de caractères.',
        'type.in' => 'La valeur du champ "Type" doit être parmi :values.',

        'description.string' => 'Le champ "Description" doit être une chaîne de caractères.',

        'publication.date' => 'Le champ "Date de Publication" doit être une date valide.',
    ]);
   
       // Création de l'offre de formation
       $job = new Joboffer;
       $job->title = $request->input('title');
       $job->job = $request->input('job');
       $job->type = $request->input('type');
       $job->description = $request->input('description');
       $job->publication = $request->input('publication');
       $job->actif = 0; // Par défaut, l'offre n'est pas active
       $job->user_id = auth()->id();
   
       // Enregistrez l'offre de formation dans la base de données
       $job->save();
   
       // Redirection avec un message de succès
       return redirect()->route('admin.job.job')->with('success', 'Offre de formation créée avec succès.');
   }

   public function edit($id)
    {
        $job = Joboffer::findOrFail($id);
        return view('admin.job.edit_job', compact('job'));
    }

   public function update(Request $request, $id)
{
    // Validation des données du formulaire
    $request->validate([
        'title' => 'required|string|max:255',
        'job' => 'required|string',
        'type' => 'required|string|in:CDI,CDD,Alternance',
        'description' => 'nullable|string',
        'publication' => 'nullable|date',
    ], [
        'title.required' => 'Le champ "Titre" est requis.',
        'title.string' => 'Le champ "Titre" doit être une chaîne de caractères.',
        'title.max' => 'Le champ "Titre" ne doit pas dépasser :max caractères.',

        'job.required' => 'Le champ "Job visé" est requis.',
        'job.string' => 'Le champ "Job visé" doit être une chaîne de caractères.',

        'type.required' => 'Le champ "Type de Poste" est requis.',
        'type.string' => 'Le champ "Type de Poste" doit être une chaîne de caractères.',
        'type.in' => 'La valeur du champ "Type de Poste" doit être parmi :values.',

        'description.string' => 'Le champ "Description" doit être une chaîne de caractères.',

        'publication.date' => 'Le champ "Date de Publication" doit être une date valide.',
    ]);

    // Récupérer l'offre de formation à mettre à jour
    $job = Joboffer::findOrFail($id);
    $job->title = $request->input('title');
    $job->job = $request->input('job');
    $job->type = $request->input('type');
    $job->description = $request->input('description');
    $job->publication = $request->input('publication');

    // Enregistrez les modifications dans la base de données
    $job->save();

    // Redirection avec un message de succès
    return redirect()->route('admin.job.job')->with('success', 'Offre d\'emploi mise à jour avec succès.');
}

   public function toggle($id)
   {
       $job = Joboffer::findOrFail($id);
       $job->actif = !$job->actif; // Inversez la valeur d'actif (1 devient 0 et vice versa)
       $job->save();

       return redirect()->back()->with('success', "Offre d'emploi activée/désactivée avec succès.");
   }

   public function delete($id)
{
    $job = Joboffer::findOrFail($id);
    $job->delete();

    return redirect()->back()->with('success', 'Offre d\'emploi supprimée avec succès.');
}
}
