<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\Atelier;

class AtelierGestion extends Controller
{
   public function index(){
      $activeatelier = Atelier::where('actif', 1)->with('information')->get();
      $inactiveatelier = Atelier::where('actif', 0)->with('information')->get();
      return view('admin.atelier.atelier',compact('activeatelier','inactiveatelier'));
   }
   public function inactiveView()
    {
        $inactiveatelier = Atelier::where('actif', 0)->get();

        return view('admin.atelier.atelierinactif',compact('inactiveatelier'));
    }

   public function create()
   {
       return view('admin.atelier.create');
   }

   public function edit($id)
{
    $atelier = Atelier::find($id);
    return view('admin.atelier.edit', compact('atelier'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'resume' => 'string',
        'objectif' => 'string',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'place' => 'required|string|max:255',
        'user_id' => 'nullable',
        'date' => 'required|date',
    ], [
        'title.required' => 'Le champ Titre est requis.',
        'title.string' => 'Le champ Titre doit être une chaîne de caractères.',
        'title.max' => 'Le champ Titre ne doit pas dépasser :max caractères.',
        'description.required' => 'Le champ Description est requis.',
        'description.string' => 'Le champ Description doit être une chaîne de caractères.',
        'resume.string' => 'Le champ Résumé doit être une chaîne de caractères.',
        'objectif.string' => 'Le champ Objectif doit être une chaîne de caractères.',
        'image_path.image' => 'Le fichier doit être une image.',
        'image_path.mimes' => 'Le fichier doit être de type jpeg, png, jpg ou gif.',
        'place.required' => 'Le champ Place est requis.',
        'place.string' => 'Le champ Place doit être une chaîne de caractères.',
        'place.max' => 'Le champ Place ne doit pas dépasser :max caractères.',
        'user_id.nullable' => 'Le champ User ID doit être null ou non présent.',
        'date.required' => 'Le champ Date est requis.',
        'date.date' => 'Le champ Date doit être une date valide.',
    ]);
 
 
    $atelier = Atelier::findOrFail($id);
 
    $oldDate = $atelier->date;
 
    if ($request->input('date') !== $oldDate) {
        // La date a été modifiée
 
        // Suppression des inscriptions pour cet atelier
        $atelier->users()->detach();
    }
   
    if ($request->hasFile('image_path')) {
        if ($atelier->image_path) {
            Storage::disk('public')->delete($atelier->image_path);
        }
 
        $imagePath = $request->file('image_path')->store('atelier', 'public');
        $atelier->update(['image_path' => $imagePath]);
    }
 
    $atelier->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'resume' => $request->input('resume'),
        'objectif' => $request->input('objectif'),
        'place' => $request->input('place'),
        'date' => $request->input('date'),
        'user_id' => $request->input('user_id'),
    ]);
 
    return redirect()->route('admin.atelier.atelier')->with('success', 'L\'atelier a été mis à jour avec succès.');
}
    
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'resume' => 'string',
            'objectif' => 'string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'place' => 'required|string|max:255',
            'user_id' => 'nullable',
            'date' => 'required|date',
        ], [
            'title.required' => 'Le champ Titre est requis.',
            'title.string' => 'Le champ Titre doit être une chaîne de caractères.',
            'title.max' => 'Le champ Titre ne doit pas dépasser :max caractères.',
            'description.required' => 'Le champ Description est requis.',
            'description.string' => 'Le champ Description doit être une chaîne de caractères.',
            'resume.string' => 'Le champ Résumé doit être une chaîne de caractères.',
            'objectif.string' => 'Le champ Objectif doit être une chaîne de caractères.',
            'image_path.image' => 'Le fichier doit être une image.',
            'image_path.mimes' => 'Le fichier doit être de type jpeg, png, jpg ou gif.',
            'place.required' => 'Le champ Place est requis.',
            'place.string' => 'Le champ Place doit être une chaîne de caractères.',
            'place.max' => 'Le champ Place ne doit pas dépasser :max caractères.',
            'user_id.nullable' => 'Le champ User ID doit être null ou non présent.',
            'date.required' => 'Le champ Date est requis.',
            'date.date' => 'Le champ Date doit être une date valide.',
        ]);
            
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('atelier', 'public');
        
        } else {
            $imagePath = null;
        }

        // Enregistrez l'offre de formation dans la base de données
        Atelier::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'resume' => $request->input('resume'),
            'objectif' => $request->input('objectif'),
            'image_path' => $imagePath,
            'place' => $request->input('place'),
            'date' => $request->input('date'),
            'user_id' => $request->input('user_id'),
        ]);
        
        // dd('Atelier created successfully'); // Add this line for debugging
        // Redirection avec un message de succès
        return redirect()->route('admin.atelier.atelier')->with('success', 'L\'atelier a été créé avec succès.');
    }

   public function toggle($id)
   {
       $atelier = atelier::findOrFail($id);
       $atelier->actif = !$atelier->actif; // Inversez la valeur d'actif (1 devient 0 et vice versa)
       $atelier->save();

       return redirect()->back()->with('success', "Atelier activé/désactivé avec succès.");
   }

   public function delete($id)
    {
        // Find the Atelier instance by ID
        $atelier = Atelier::findOrFail($id);

        // Delete the associated image if it exists
        if ($atelier->image_path) {
            Storage::disk('public')->delete($atelier->image_path);
        }

        // Delete the Atelier
        $atelier->delete();

        // Redirect with a success message
        return redirect()->route('admin.atelier.atelier')->with('success', 'L\'atelier a été supprimé avec succès.');
    }
}