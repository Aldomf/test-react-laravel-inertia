<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Training;

class TrainingGestion extends Controller
{
    public function index()
    {
        $activeTrainings = Training::where('actif', 1)->get();

        $inactiveTrainings = Training::where('actif', 0)->get();

      return view('admin.training.training',compact('activeTrainings','inactiveTrainings'));
    }
    public function inactiveView()
    {
        $inactiveTrainings = Training::where('actif', 0)->get();

        return view('admin.training.traininginactive',compact('inactiveTrainings'));
    }

    public function create()
    {
        return view('admin.training.create');
    }

    public function store(Request $request)
    {
    
        $customMessages = [
            'title.required' => 'Le champ titre est requis.',
            'title.string' => 'Le champ titre doit être une chaîne de caractères.',
            'title.max' => 'Le champ titre ne doit pas dépasser :max caractères.',
            'job.required' => 'Le champ "Job visé" est requis.',
            'job.string' => 'Le champ "Job visé" doit être une chaîne de caractères.',
            'type.required' => 'Le champ type est requis.',
            'type.string' => 'Le champ type doit être une chaîne de caractères.',
            'type.in' => 'Le champ type doit être l\'une des options suivantes : Continue, Qualifiante, Alternance, Certifiante.',
            'description.string' => 'Le champ description doit être une chaîne de caractères.',
            'publication.date' => 'Le champ publication doit être une date valide.',
            'start.required' => 'Le champ "Date de début" est requis.',
            'start.date' => 'Le champ "Date de début" doit être une date valide.',
            'end.required' => 'Le champ "Date de fin" est requis.',
            'end.date' => 'Le champ "Date de fin" doit être une date valide.',
            'end.after_or_equal' => 'Le champ "Date de fin" doit être postérieur ou égal à la date de début.',
            'slots.string' => 'Le champ "Nombre de place" doit être une chaîne de caractères.',
            'image_path.image' => 'Le fichier doit être une image.',
            'image_path.mimes' => 'Le fichier doit être de type jpeg ou png ou jpg ou gif.',
            'image_path.max' => 'Le fichier ne doit pas dépasser 2Mo.',
            'place.required' => 'Le champ "Lieu" est requis.',
            'place.string' => 'Le champ "Lieu" doit être une chaîne de caractères.',
            'job_summary.required' => 'Le champ "Résumé du métier" est requis.',
            'job_summary.string' => 'Le champ "Résumé du métier" doit être une chaîne de caractères.',
            'objectives.required' => 'Le champ "Objectif" est requis.',
            'objectives.string' => 'Le champ "Objectif" doit être une chaîne de caractères.',
            'duration.required' => 'Le champ "Durée" est requis.',
            'duration.string' => 'Le champ "Durée" doit être une chaîne de caractères.',
            'prerequisites.required' => 'Le champ "Pré-requis" est requis.',
            'prerequisites.string' => 'Le champ "Pré-requis" doit être une chaîne de caractères.',
            'program.required' => 'Le champ "Programme" est requis.',
            'program.string' => 'Le champ "Programme" doit être une chaîne de caractères.',
        ];
        
        // Validation des données du formulaire avec messages personnalisés
        $request->validate([
            'title' => 'required|string|max:255',
            'job' => 'required|string',
            'type' => 'required|string|in:Continue,Qualifiante,Alternance,Certifiante',
            'description' => 'nullable|string',
            'publication' => 'nullable|date',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'slots' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place' => 'required|string',
            'job_summary' => 'required|string',
            'objectives' => 'required|string',
            'duration' => 'required|string',
            'prerequisites' => 'required|string',
            'program' => 'required|string',
        ], $customMessages);
        
        // Récupération du chemin où stocker l'image
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('training', 'public');
        } else {
            $imagePath = null;
        }

          // Enregistrez l'offre de formation dans la base de données
          Training::create([
            'title' => $request->input('title'),
            'job' => $request->input('job'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'publication' => $request->input('publication'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'slots' => $request->input('slots'),
            'image_path' => $imagePath,
            'place' => $request->input('place'),
            'job_summary' => $request->input('job_summary'),
            'objectives' => $request->input('objectives'),
            'duration' => $request->input('duration'),
            'prerequisites' => $request->input('prerequisites'),
            'program' => $request->input('program'),
            'user_id' => $request->input('user_id'),
        ]);
      
        // Redirection avec un message de succès
        return redirect()->route('admin.training.training')->with('success', 'Offre de formation créée avec succès.');
    }

    public function toggle($id)
    {
        $training = Training::findOrFail($id);
        $training->actif = !$training->actif; // Inversez la valeur d'actif (1 devient 0 et vice versa)
        $training->save();

        return redirect()->back()->with('success', 'Formation activée/désactivée avec succès.');
    }
    public function edit($id)
    {
        // Récupérer la formation par son ID
        $training = Training::findOrFail($id);
        if (!$training) {
        return redirect()->route('admin.training.training')->with('error', 'Formation non trouvée');
        }
        // Retourner la vue d'édition avec la formation
        return view('admin.training.edit_training', compact('training'));
    }
    public function update(Request $request, $id)
    {
        
        $customMessages = [
            'title.required' => 'Le champ "Titre" est requis.',
            'title.string' => 'Le champ "Titre" doit être une chaîne de caractères.',
            'title.max' => 'Le champ "Titre" ne doit pas dépasser :max caractères.',
            'job.required' => 'Le champ "Job visé" est requis.',
            'job.string' => 'Le champ "Job visé" doit être une chaîne de caractères.',
            'type.required' => 'Le champ "type" est requis.',
            'type.string' => 'Le champ "type" doit être une chaîne de caractères.',
            'type.in' => 'Le champ "type" doit être l\'une des options suivantes : Continue, Qualifiante, Alternance, Certifiante.',
            'description.string' => 'Le champ "description" doit être une chaîne de caractères.',
            'publication.date' => 'Le champ "publication" doit être une date valide.',
            'start.required' => 'Le champ "Date de début" est requis.',
            'start.date' => 'Le champ "Date de début" doit être une date valide.',
            'end.required' => 'Le champ "Date de fin" est requis.',
            'end.date' => 'Le champ "Date de fin" doit être une date valide.',
            'end.after_or_equal' => 'Le champ "Date de fin" doit être postérieur ou égal à la date de début.',
            'slots.string' => 'Le champ "Nombre de place" doit être une chaîne de caractères.',
            'image_path.image' => 'Le fichier doit être une image.',
            'image_path.mimes' => 'Le fichier doit être de type jpeg ou png ou jpg ou gif.',
            'image_path.max' => 'Le fichier ne doit pas dépasser 2Mo.',
            'place.required' => 'Le champ "Lieu" est requis.',
            'place.string' => 'Le champ "Lieu" doit être une chaîne de caractères.',
            'job_summary.required' => 'Le champ "Résumé du métier" est requis.',
            'job_summary.string' => 'Le champ "Résumé du métier" doit être une chaîne de caractères.',
            'objectives.required' => 'Le champ "Objectif" est requis.',
            'objectives.string' => 'Le champ "Objectif" doit être une chaîne de caractères.',
            'duration.required' => 'Le champ "Durée" est requis.',
            'duration.string' => 'Le champ "Durée" doit être une chaîne de caractères.',
            'prerequisites.required' => 'Le champ "Pré-requis" est requis.',
            'prerequisites.string' => 'Le champ "Pré-requis" doit être une chaîne de caractères.',
            'program.required' => 'Le champ "Programme" est requis.',
            'program.string' => 'Le champ "Programme" doit être une chaîne de caractères.',
        ];
        
        // Validation des données du formulaire avec messages personnalisés
        $request->validate([
            'title' => 'required|string|max:255',
            'job' => 'required|string',
            'type' => 'required|string|in:Continue,Qualifiante,Alternance,Certifiante',
            'description' => 'nullable|string',
            'publication' => 'nullable|date',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'slots' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place' => 'required|string',
            'job_summary' => 'required|string',
            'objectives' => 'required|string',
            'duration' => 'required|string',
            'prerequisites' => 'required|string',
            'program' => 'required|string',
        ], $customMessages);
        
        // Récupération du chemin où stocker l'image
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('training', 'public');
        } else {
            $imagePath = null;
        }
    
        $training = Training::findOrFail($id);
    
        // Vérifiez si les dates sont au bon format et transformez-les en objets Carbon
        $publication = Carbon::createFromFormat('Y-m-d', $request->input('publication'));
        $start = Carbon::createFromFormat('Y-m-d', $request->input('start'));
        $end = Carbon::createFromFormat('Y-m-d', $request->input('end'));
    
        if ($request->hasFile('image_path')) {
            if ($training->image_path) {
                Storage::disk('public')->delete($training->image_path);
            }
    
            $imagePath = $request->file('image_path')->store('training', 'public');
            $training->update(['image_path' => $imagePath]);
        }

        $training->update([
            'title' => $request->input('title'),
            'job' => $request->input('job'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'publication' => $publication,
            'start' => $start,
            'end' => $end,
            'slots' => $request->input('slots'),
            'place' => $request->input('place'),
            'job_summary' => $request->input('job_summary'),
            'objectives' => $request->input('objectives'),
            'duration' => $request->input('duration'),
            'prerequisites' => $request->input('prerequisites'),
            'program' => $request->input('program'),
            'user_id' => $request->input('user_id'),
        ]);
        // Redirigez l'utilisateur vers la page de détails de la formation mise à jour
        return redirect()->route('admin.training.training')->with('success', 'Formation mise à jour avec succès');
    }

}
