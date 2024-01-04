<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Staff;

class NewsGestion extends Controller
{
    public function index()
    {
        //Récupérer tous les membres du personnel depuis la base de données
        $news = News::all();
        return view('admin.news.news', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        #dd($request->all());
        // Validation des données du formulaire
        $staffRules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place' => 'required|string|max:255',
            'hashtag' => 'nullable|string',
            'user_id' => 'required|exists:users,id', // Assurez-vous que l'utilisateur avec cet id existe dans la table des utilisateurs
        ];


        // Custom error messages for staff creation
        $staffCustomMessages = [
            'title.required' => 'Le titre est requis.',
            'title.string' => 'Le titre doit être une chaîne de caractère.',
            'title.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'description.required' => 'La description est requise.',
            'description.string' => 'La description doit être une chaîne de caractère.',
            'image_path.image' => 'Le fichier doit être une image.',
            'image_path.mimes' => 'Le fichier doit être de type :mimes.',
            'image_path.max' => 'Le fichier ne doit pas dépasser :max kilo-octets.',
            'place.required' => 'Le lieu est requis.',
            'place.string' => 'Le lieu doit être une chaîne de caractère.',
            'place.max' => 'Le lieu ne doit pas dépasser :max caractères.',
            'hashtag.string' => 'Le hashtag doit être une chaîne de caractère.',
            'user_id.exists' => 'l\'utilisateur n\'existe pas',

        ];
        
        // Validation of the staff creation form
        $request->validate($staffRules, $staffCustomMessages);

        // Traitement de l'image

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('actualite_images', 'public');
        } else {
            $imagePath = null;
        }

        // Création de l'actualité
        News::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $imagePath,
            'place' => $request->input('place'),
            'hashtag' => $request->input('hashtag'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()
            ->route('admin.news.news')
            ->with('success', 'Actualité créée avec succès.');
    }
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit_news', compact('news'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $staffRules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place' => 'required|string|max:255',
            'hashtag' => 'nullable|string',
            'user_id' => 'required|exists:users,id', // Assurez-vous que l'utilisateur avec cet id existe dans la table des utilisateurs
        ];


        // Custom error messages for staff creation
        $staffCustomMessages = [
            'title.required' => 'Le titre est requis.',
            'title.string' => 'Le titre doit être une chaîne de caractère.',
            'title.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'description.required' => 'La description est requise.',
            'description.string' => 'La description doit être une chaîne de caractère.',
            'image_path.image' => 'Le fichier doit être une image.',
            'image_path.mimes' => 'Le fichier doit être de type :mimes.',
            'image_path.max' => 'Le fichier ne doit pas dépasser :max kilo-octets.',
            'place.required' => 'Le lieu est requis.',
            'place.string' => 'Le lieu doit être une chaîne de caractère.',
            'place.max' => 'Le lieu ne doit pas dépasser :max caractères.',
            'hashtag.string' => 'Le hashtag doit être une chaîne de caractère.',
            'user_id.exists' => 'l\'utilisateur n\'existe pas',
        ];
        
        // Validation of the staff creation form
        $request->validate($staffRules, $staffCustomMessages);

        // Trouver l'instance de l'actualité par ID
        $news = News::findOrFail($id);

        // Si une nouvelle image est téléchargée, supprimer l'ancienne image
        if ($request->hasFile('image_path')) {
            // Supprimer l'ancienne image si elle existe
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }

            // Stocker et mettre à jour la nouvelle image
            $imagePath = $request->file('image_path')->store('actualite_images', 'public');
            $news->image_path = $imagePath;
        }

        // Mise à jour des autres champs
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->place = $request->input('place');
        $news->hashtag = $request->input('hashtag');

        // Sauvegarder les modifications
        $news->save();

        // Rediriger avec un message de succès
        return redirect()
            ->route('admin.news.news')
            ->with('success', 'Actualité modifiée avec succès.');
    }

    public function destroy($id)
    {
        // Trouver l'instance de l'actualité par ID
        $news = News::find($id);

        if ($news) {
            // Supprimer l'image associée à l'actualité si elle existe
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }

            // Supprimer l'actualité de la base de données
            $news->delete();

            return redirect()
                ->route('admin.news.news')
                ->with('success', 'Actualité supprimée avec succès.');
        } else {
            // Gérer le cas où l'actualité n'est pas trouvée.
            return redirect()
                ->route('admin.news.news')
                ->with('error', 'Actualité non trouvée.');
        }
    }
}
