<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Models\LignePaiement;
use App\Models\PaiementMensuel;
use Illuminate\Support\Facades\DB;
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

    public function testDate(){
        setlocale(LC_TIME, 'fr_FR');
        $month_name = date('F', mktime(0, 0, 0, 11));

        return $month_name;
    }


    public function getVerifMonthPay(){
        $now = Carbon::now(); 
        $currentpay = $now->year.$now->month;
        return PaiementMensuel::query()->where('numero',$currentpay)->first() != null ?  true : false;
    }

    public function savePayMens(Request $request){
        try{
            $now = Carbon::now(); 
            $currentpay = $now->year.$now->month;
            DB::beginTransaction();
            $paiement = PaiementMensuel::create([
                'numero' => $currentpay,
                'mois' => request('mois'),
                'annee' => request('annee')
            ]);

            if($paiement){
                $abonnements = Abonnement::query()->where('status',true)->get();

                foreach ($abonnements as $abonnement) {
                    LignePaiement::create([
                        'abonnement_id' => $abonnement->id,
		                'paiement_mensuel_id' => $paiement->id,
                    ]);
                }
            }
            DB::commit();
            return back()->withStatus(__('Paiement crée avec succès.'));

        }catch(Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }

    }

    
}
