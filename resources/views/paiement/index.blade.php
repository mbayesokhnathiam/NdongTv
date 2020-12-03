@inject('paycontroller', 'App\Http\Controllers\PaiementController')
@extends('layouts.app', ['activePage' => 'pay-management', 'titlePage' => __('Gestion des paiements')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Paiements mensuels</h4>
                        <p class="card-category"> Ici vous pouvez gérer les mois de paiement</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                            @if($paycontroller->getVerifMonthPay() != 1)
                                <a href="{{ route('add-paiement') }}"  class="btn btn-sm">Nouveau</a>
                            @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table paiements">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Code
                                        </th>
                                        <th>
                                            Mois
                                        </th>
                                        <th>
                                            Annee
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- popup --}}
<div class="modal fade bd-example-modal-sm" id="payMensModal"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="card card-signup card-plain">

            <div class="modal-body">
                <form class="form" method="" action="">
                    <p class="description text-center">Ajouter mois de paiement</p>
                    <div class="card-body">

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input type="text" name="mois" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input type="text" placeholder="0" class="form-control" name="annee">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Valider</a>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
