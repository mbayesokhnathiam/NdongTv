<?php

namespace App\Http\Controllers;

use App\Models\Amply;
use App\Models\Abonne;
use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbonnesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('abonnes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurs = Secteur::all();
        return view('abonnes.add')->with('secteurs',$secteurs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
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
        return view('abonnes.edit');
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
        //
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


    public function getAmpliesBySecteur($id){
        $data = Amply::query()->where('secteur_id',$id)->get();

        if($data == null){
            return response()->json([
                'status' => true,
                'data' => null
            ], 404);
        }else{
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        }
    }

    public function generateCode($formerReference)
    {
        $parts = explode("-", $formerReference);
        $numbers = $parts[1];
        $letters = $parts[0];
        if ($numbers == "999") {
            $nextLetters = ++$letters;
            $nextNumbers = 1;
        } else {
            $nextLetters = $letters;
            $nextNumbers = ++$numbers;
        }
        $nextReference = $nextLetters . "-" . sprintf('%03d', $nextNumbers);
        return $nextReference;
    }
}
