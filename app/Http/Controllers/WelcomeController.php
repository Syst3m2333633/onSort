<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Models\Lieu;
use App\Models\User;
use App\Models\Ville;
use App\Models\Campus;
use App\Models\Participant;
use App\Models\Sortie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{

    /**
     * Display a listing of the ressource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Etat::all());
        $sorties = Sortie::all();
        $villes = Ville::all();
        $campuses = Campus::all();
        $lieux = Lieu::all();
        $users = User::all();
        $etats = Etat::all();
        $participants = Participant::all();
        $countParticipants['count'] = Participant::count();
        return view('dashboard', compact('sorties', 'villes', 'campuses', 'lieux', 'users', 'etats', 'participants', 'countParticipants'));
        // return view('dashboard', ['sorties' => $sorties]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
