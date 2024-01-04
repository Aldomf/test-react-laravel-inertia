<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ConseillerController;

class SendDocController extends Controller
{
    public function index(){
        return view('conseiller.sendDoc');
    }
    

    public function send($jeuneId){
        $jeune = User::findOrFail($jeuneId);
        return view('conseiller.sendDoc.send', compact('jeune'));
    }

    public function store(Request $request, $jeuneId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'document' => 'required|mimes:pdf|max:4096', // Taille maximale de 4 Mo
        ]);

        $jeune = User::findOrFail($jeuneId);

        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('documents_jeunes', 'public');
            $title = $request->input('title');
            // Créez un nouveau document associé à l'utilisateur
            $document = new Document(['document_path' => $path, 'title' => $title]);
            $jeune->document()->save($document);
        }

        return redirect()->route('conseiller.jeune')->with('success', 'Document envoyé avec succès.');
    }
}
