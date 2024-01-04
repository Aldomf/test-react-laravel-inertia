<?php

namespace App\Http\Controllers;

use App\Models\PhotoGroupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoGroupeController extends Controller
{
    //
    public function index()
    {
        //Récupérer tous les membres du personnel depuis la base de données
        $photogroupes = PhotoGroupe::all();
        return view('admin.photogroupe.photogroupe', compact('photogroupes'));
    }

    public function create()
    {
        return view('admin.photogroupe.create');
    }
    public function store(Request $request)
    {
        $staffRules = [
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:4096', // Validation for the image (optional)
        ];
        
        // Custom error messages for staff creation
        $staffCustomMessages = [
            'image_path.image' => 'Le fichier doit être une image.',
            'image_path.mimes' => 'Le fichier doit être de type jpeg ou png ou jpg ou gif.',
            'image_path.max' => 'Le fichier ne doit pas dépasser 4096 ko.',
        ];
        $request->validate($staffRules, $staffCustomMessages);


        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('photo_groupe','public');  // stocker le fichier dans le dossier photo_groupe
        } else {
            $imagePath = null;
        }

        // Création de l'actualité
        PhotoGroupe::create([
            'image_path' => $imagePath,
        ]);

        return redirect()
            ->route('admin.photogroupe.photogroupe')
            ->with('success', 'Actualité créée avec succès.');
    }
    public function edit($id)
    {
        $photogroupes = PhotoGroupe::find($id);
        return view('admin.photogroupe.edit', compact('photogroupes'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $rules = [
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:32768', // Validation for the image (optional)
        ];
        
        // Custom error messages for staff creation
        $staffCustomMessages = [
            'image_path.image' => 'Le fichier doit être une image.',
            'image_path.mimes' => 'Le fichier doit être de type jpeg ou png ou jpg ou gif.',
            'image_path.max' => 'Le fichier ne doit pas dépasser 4096 ko.',
        ];
        $request->validate($rules, $staffCustomMessages);


        // Trouver l'instance de l'actualité par ID
        $photogroupes = PhotoGroupe::findOrFail($id);

        // Si une nouvelle image est téléchargée, supprimer l'ancienne image
        if ($request->hasFile('image_path')) {
            // Supprimer l'ancienne image si elle existe
            if ($photogroupes->image_path) {
                Storage::disk('public')->delete($photogroupes->image_path);
            }

            // Stocker et mettre à jour la nouvelle image
            $imagePath = $request->file('image_path')->store('photo_groupe');
            $photogroupes->image_path = $imagePath;
        }


        $photogroupes->save();

        // Rediriger avec un message de succès
        return redirect()
            ->route('admin.photogroupe.photogroupe')
            ->with('success', 'Actualité modifiée avec succès.');
    }

    public function destroy($id)
    {
        // Trouver l'instance de l'actualité par ID
        $photogroupes = PhotoGroupe::find($id);

        if ($photogroupes) {
            // Supprimer l'image associée à l'actualité si elle existe
            if ($photogroupes->image_path) {
                Storage::disk('public')->delete($photogroupes->image_path);
            }

            // Supprimer l'actualité de la base de données
            $photogroupes->delete();

            return redirect()
                ->route('admin.photogroupe.photogroupe')
                ->with('success', 'Photo supprimée avec succès.');
        } else {
            // Gérer le cas où l'actualité n'est pas trouvée.
            return redirect()
                ->route('admin.photogroupe.photogroupe')
                ->with('error', 'Photo introuvable.');
        }
    }
}
