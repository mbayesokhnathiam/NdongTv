<?php

namespace App\Http\Controllers;

use App\Models\LignePaiement;
use App\Models\PaiementMensuel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaiementController extends Controller
{
    public function getListPaiementMensuel(Request $request)
    {
        $data = PaiementMensuel::all();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '"  data-original-title="status-abonnement" class="info btn btn-primary btn-sm show-pay"><span class="material-icons">
                        source
                        </span></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('paiement.index');
    }


    public function getIDPaiement(Request $request)
    {

        return response()->json(request('id'));
    }


    public function showPay($id){
        $data = LignePaiement::query()->with('abonnement.abonne','abonnement.amply.secteur')->where('paiement_mensuel_id',$id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function getListPaiementAbonnes(Request $request,$id){

         $data = LignePaiement::query()->with('abonnement.abonne','abonnement.amply.secteur')->where('paiement_mensuel_id',$id)->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)"  data-id="' . $row->id . '"  data-original-title="status-abonnement"  class="info btn btn-primary btn-sm show-list-abon"><span class="material-icons">
                        credit_card
                        </span></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('paiement.abonnement');
    }


    public function getLinePaiement($id){
       $data =  LignePaiement::query()->with('abonnement')->where('id',$id)->first();
        return response()->json($data);
    }
}
