<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Preregistrations;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\User;
use App\Models\JobOffer;

class TemplateBackController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                case 'manager':
                case 'businessManager':
                    return view('admin.templateBack');
                case 'jeune':
                case 'entreprise':
                default:
                    return redirect()->route('home');
            }
        } else {
            return redirect()->route('home');
        }
    }


    public function logout()
    {
        Auth::logout(); // Déconnecte l'utilisateur
        return redirect()->route('home')->with('success', 'Vous avez été déconnecté avec succès.'); // Redirigez après la déconnexion, vous pouvez personnaliser la redirection
    }

    public function showNotifications()
    {
        // Récupérez l'utilisateur connecté
        $user = Auth::user();
        $notifications = $user->notifications()->paginate(10);
        $notificationDetails = [];
        foreach ($notifications as $notification) {
            $data = json_decode($notification->data);
            $jeune = User::find($data->jeune_id);
            $offre = JobOffer::find($data->offre_id);
            $infoJeune = $jeune ? $jeune->information : null;
    
            $notificationDetails[] = [
                'notification' => $notification,
                'jeune' => $infoJeune,
                'offre' => $offre,
            ];
        }
    
        return view('admin.showNotifications', compact('notificationDetails'));
    }

}
