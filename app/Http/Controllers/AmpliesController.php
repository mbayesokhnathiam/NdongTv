<?php

namespace App\Http\Controllers;

use App\Models\Amply;
use App\Models\Secteur;
use Illuminate\Http\Request;

class AmpliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amplies = Amply::with('secteur','abonnements')->get();

        return view('amplies.index',['amplies' => $amplies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurs = Secteur::all();
        return view('amplies.add',['secteurs' => $secteurs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = Amply::create($request->all());
        if($new){
            return redirect()->route('amplies.index')->withStatus(__('Amplie crée avec succès.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selected = Amply::find($id);
        $secteurs = Secteur::all();
        return view('amplies.edit',['secteurs' => $secteurs,'selected' => $selected]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Amply::where('id', $id)->update([
            'adresse' => request('adresse') ,
            'secteur_id' => request('secteur_id')
        ]);
        return redirect()->route('amplies.index')->withStatus(__('Amplie modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
