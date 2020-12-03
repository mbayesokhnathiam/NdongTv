@extends('layouts.app', ['activePage' => 'pay-management', 'titlePage' => __('Gestion des paiements')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Liste des abonnés qui doivent payer</h4>
                        <p class="card-category"> Ici vous pouvez gérer le paiement de chaque abonnés pour ce mois</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-12 text-right">
                                <a href="#" class="btn btn-sm btn-primary">Nouveau</a>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table abonnement-pay">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Secteur
                                        </th>
                                        <th>
                                            Amplie
                                        </th>

                                        <th>
                                            Prénom
                                        </th>
                                        <th>
                                            Nom
                                        </th>
                                        <th>
                                            Téléphone
                                        </th>
                                        <th>
                                            A payer
                                        </th>
                                        <th>
                                            Versé
                                        </th>
                                        <th>
                                            Crédit
                                        </th>
                                        <th style="width: 15px">
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
<div class="modal fade bd-example-modal-sm" id="payModal"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="card card-signup card-plain">

            <div class="modal-body">
                <form class="form" method="" action="">
                    <p class="description text-center">Paiement du mois</p>
                    <div class="card-body">

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="margin-right:10px">
                                Montant à payer
                                </span>
                                <input type="text" name="montant" class="form-control" readonly="true">
                            </div>
                        </div>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="margin-right:10px">
                                Montant versé
                                </span>
                                <input type="text" name="montant_verse" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="margin-right:10px">
                                Montant restant
                                </span>
                                <input type="text" placeholder="0" class="form-control" name="montant_restant">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Enregistrer</a>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
