<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Staff;

class StaffGestion extends Controller
{
    public function index()
  {
    //Récupérer tous les membres du personnel depuis la base de données
    $staffMembers = Staff::all();

    // Organiser les membres du personnel par groupe
    $staffGroups = $staffMembers->groupBy('group');
    //------------------

    return view('admin.staff.staff',compact('staffGroups'));
  }
  public function create()
  {
    return view('admin.staff.create_staff');
  }

  public function store(Request $request)
  {
   
      // Validation des données du formulaire
      $staffRules = [
        'first_name' => 'required|max:255|regex:/^[a-zA-ZÀ-ÿ -]+$/',
        'last_name' => 'required|max:255|regex:/^[a-zA-ZÀ-ÿ -]+$/',
        'job' => 'required|max:255|regex:/^[a-zA-ZÀ-ÿ -]+$/',
        'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for the image (optional)
        'group' => 'required|string|max:255',
    ];
    
    // Custom error messages for staff creation
    $staffCustomMessages = [
        'first_name.required' => 'Le champ Prénom est requis.',
        'first_name.regex' => 'Le Prénom doit contenir  des lettres, les espaces et les tirets sont acceptés.',
        'first_name.max' => 'Le champ Prénom ne doit pas dépasser :max caractères.',

        'last_name.required' => 'Le champ Nom est requis.',
        'last_name.regex' => 'Le Prénom doit contenir  des lettres, les espaces et les tirets sont acceptés.',
        'last_name.max' => 'Le champ Nom ne doit pas dépasser :max caractères.',

        'job.required' => 'Le champ Fonction est requis.',
        'job.regex' => 'Le Prénom doit contenir  des lettres, les espaces et les tirets sont acceptés.',
        'job.max' => 'Le champ Fonction ne doit pas dépasser :max caractères.',

        'picture.image' => 'Le fichier doit être une image.',
        'picture.mimes' => 'Le fichier doit être de type :mimes.',
        'picture.max' => 'Le fichier ne doit pas dépasser :max kilo-octets.',
        
        'group.required' => 'Le champ Groupe est requis.',
        'group.string' => 'Le champ Groupe doit être une chaîne de caractères.',
        'group.max' => 'Le champ Groupe ne doit pas dépasser :max caractères.',
    ];
    
    // Validation of the staff creation form
    $request->validate($staffRules, $staffCustomMessages);
  
      // Traitement de la photo
      if ($request->hasFile('picture')) {
          // Stockez l'image dans le dossier 'staff_public'
          $imagePath = $request->file('picture')->store('staff_public', 'public');
  
          // Le chemin du fichier sera stocké dans la base de données
      } else {
          $imagePath = null; // Si aucune photo n'est téléchargée, définissez le chemin de l'image sur null
      }
  
      // Création du membre du staff avec les données du formulaire
      Staff::create([
          'first_name' => $request->input('first_name'),
          'last_name' => $request->input('last_name'),
          'job' => $request->input('job'),
          'picture' => $imagePath, // Chemin de l'image enregistré dans la base de données
          'group' => $request->input('group'),
      ]);
  
      return redirect()->route('admin.staff.staff')->with('success', 'Membre du staff créé avec succès.');
  }


  public function edit($id)
  {
      $staff = Staff::find($id);
      if (!$staff) {
          // Gérez le cas où le membre du personnel n'est pas trouvé, redirigez ou affichez un message d'erreur.
      }
  
      return view('admin.staff.edit_staff', ['staff' => $staff]);
  }
  public function update(Request $request, $id)
{
    
    $staff = Staff::find($id);

    $staffRules = [
        'first_name' => 'required|max:255|regex:/^[a-zA-ZÀ-ÿ -]+$/',
        'last_name' => 'required|max:255|regex:/^[a-zA-ZÀ-ÿ -]+$/',
        'job' => 'required|max:255|regex:/^[a-zA-ZÀ-ÿ -]+$/',
        'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for the image (optional)
        'group' => 'required|string|max:255',
    ];
    
    // Custom error messages for staff creation
    $staffCustomMessages = [
        'first_name.required' => 'Le champ Prénom est requis.',
        'first_name.regex' => 'Le Prénom doit contenir  des lettres, les espaces et les tirets sont acceptés.',
        'first_name.max' => 'Le champ Prénom ne doit pas dépasser :max caractères.',

        'last_name.required' => 'Le champ Nom est requis.',
        'last_name.regex' => 'Le Prénom doit contenir  des lettres, les espaces et les tirets sont acceptés.',
        'last_name.max' => 'Le champ Nom ne doit pas dépasser :max caractères.',

        'job.required' => 'Le champ Fonction est requis.',
        'job.regex' => 'Le Prénom doit contenir  des lettres, les espaces et les tirets sont acceptés.',
        'job.max' => 'Le champ Fonction ne doit pas dépasser :max caractères.',

        'picture.image' => 'Le fichier doit être une image.',
        'picture.mimes' => 'Le fichier doit être de type jpeg ou png ou jpg ou gif.',
        'picture.max' => 'Le fichier ne doit pas dépasser :max kilo-octets.',
        
        'group.required' => 'Le champ Groupe est requis.',
        'group.string' => 'Le champ Groupe doit être une chaîne de caractères.',
        'group.max' => 'Le champ Groupe ne doit pas dépasser :max caractères.',
    ];
    
    // Validation of the staff creation form
    $request->validate($staffRules, $staffCustomMessages);

    if ($request->hasFile('picture')) {
        // Supprimer l'ancienne image si elle existe
        if ($staff->picture) {
            Storage::disk('public')->delete($staff->picture);
        }

        // Stocker et mettre à jour la nouvelle image
        $imagePath = $request->file('picture')->store('staff_public', 'public');
        $staff->picture = $imagePath;
    }

    // Mettez à jour les champs du personnel
    $staff->first_name = $request->input('first_name');
    $staff->last_name = $request->input('last_name');
    $staff->job = $request->input('job');

    $staff->save();

    // Redirigez l'utilisateur vers la liste du personnel ou affichez un message de succès.
    return redirect()->route('admin.staff.staff')->with('success', 'Membre du personnel Modifié avec succès.');
}

    public function staffdelete($id)
    {
        $staff = Staff::find($id);

        if ($staff->image_path) {
            Storage::disk('public')->delete($staff->picture);
        }

        $staff->delete();

        return redirect()->route('admin.staff.staff')->with('success', 'Membre du personnel supprimé avec succès.');
    }
  
}
