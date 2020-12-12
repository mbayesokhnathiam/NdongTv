<?php

namespace App\Http\Controllers;

use App\Models\Amply;
use App\Models\Abonne;
use App\Models\Secteur;
use App\Models\LignePaiement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $secteurs = Secteur::with('amplies')->get();
        $amplies = Amply::with('secteur','abonnements')->get();
        $nbAbonnes = count(Abonne::all());
        $credits = LignePaiement::query()->where('status',false)->count();
        return view('dashboard',['secteurs' => $secteurs,'amplies'=>$amplies,'nbAbonnes'=>$nbAbonnes,'credits' => $credits]);
    }
}
