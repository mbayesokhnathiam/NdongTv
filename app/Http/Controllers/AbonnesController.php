<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Amply;
use App\Models\Abonne;
use App\Models\Secteur;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AbonnementRequest;
use Yajra\DataTables\Facades\DataTables;

class AbonnesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Abonnement::with('abonne','amply.secteur')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    if($row->status){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '"  data-original-title="status-abonnement" class="info btn btn-primary btn-sm disable-abon"><span class="material-icons">
                        highlight_off
                        </span></a>';
                    }else{
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '"  data-original-title="status-abonnement" class="info btn btn-primary btn-sm enable-abon"><span class="material-icons">
                        power_settings_new
                        </span></a>';
                    }
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="editer-abonnement" class="disable btn btn-success btn-sm update-abon"><span class="material-icons">
                    edit
                    </span></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
    public function store(AbonnementRequest $request)
    {
        try{
            DB::beginTransaction();
            if(request('abonnement_id')){
               // return $request->all();
                $abonne = Abonne::where('id',request('abonnes_id'))->update([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'telephone' => $request->telephone
                ]);
                $abonnement = Abonnement::where('id',request('abonnement_id'))->update([
                    'nb_tv' => $request->nb_tv,
                    'montant' => $request->montant,
                    'reduction' => $request->reduction,
                    'prix_tv' => $request->prix_tv,
                    'amplie_id' => $request->amplie_id,
                    'secteur_id' => $request->secteur_id,

                ]);
                DB::commit();
                return back()->withStatus(__('Abonné modifié avec succès.'));
            }else{
                $abonne = Abonne::create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'telephone' => $request->telephone
                ]);
                $secteur = Secteur::find(request('secteur_id'));
                if(Abonnement::all()->count()==0){
                    $code = $secteur->numero."-000";
                }else{
                    $code = Abonnement::orderBy('created_at', 'desc')->first()->numero;
                }
                $abonnement = Abonnement::create([
                    'numero' => $this->generateCode($code),
                    'nb_tv' => $request->nb_tv,
                    'montant' => $request->montant,
                    'reduction' => $request->reduction,
                    'prix_tv' => $request->prix_tv,
                    'amplie_id' => $request->amplie_id,
                    'secteur_id' => $request->secteur_id,
                    'abonnes_id' => $abonne->id
                ]);

            }
            DB::commit();
            return back()->withStatus(__('Abonné enregistré avec succès.'));

        }catch(Exception $e){
            DB::rollBack();
            return $e->getMessage();
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
        return response()->json([
            'status' => 'success',
            'data' => Abonnement::with('abonne','amply.secteur')->where('id',$id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abonnement = Abonnement::with('abonne','amply.secteur')->where('id',$id)->first();
        $secteurs = Secteur::with('amplies')->get();
        $amplies = Amply::all();
        return view('abonnes.edit',['abonnement'=> $abonnement,'secteurs' => $secteurs,'amplies' => $amplies]);
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
        return $request->all();


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
            $nextLetters = $letters;
            $nextNumbers = 1;
        } else {
            $nextLetters = $letters;
            $nextNumbers = ++$numbers;
        }
        $nextReference = $nextLetters . "-" . sprintf('%03d', $nextNumbers);
        return $nextReference;
    }
}
