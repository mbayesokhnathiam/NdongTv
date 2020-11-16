<?php

namespace App\Http\Controllers;

use App\Models\Secteur;

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
        return view('dashboard',['secteurs' => $secteurs]);
    }
}
