<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showJeuneLoginForm()
    {
        return view('auth.jeune_login');
    }

    public function jeuneLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role=Auth::user()->role;
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin.templateBack');
                case 'manager':
                    return redirect()->route('conseiller.jeune');
                case 'businessManager':
                    return redirect()->route('businessManager.entreprise');
                case 'jeune':
                    return redirect()->route('home');
                case 'entreprise':
                    return redirect()->route('home'); 
                default:
                    return redirect()->back()->with('error', 'Identifiants incorrects.');
            }
        }
    }
}