@extends('layouts.app', ['activePage' => 'abonnes-management', 'titlePage' => __('Gestion des abonnés')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Abonnés</h4>
                        <p class="card-category"> Ici vous pouvez gérer les abonnés</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('abonnes.create') }}" class="btn btn-sm btn-primary">Nouveau</a>
                            </div>
                        </div>
                        <div class="table-responsive" style="overflow: initial">
                            <table class="table" id="abonne-datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            #
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
                                            Nb TV
                                        </th>
                                        <th>
                                            Amplie
                                        </th>
                                        <th>
                                            Secteur
                                        </th>
                                        <th>
                                            Montant
                                        </th>
                                        <th style="width: 25%">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            #
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
                                            Nb TV
                                        </th>
                                        <th>
                                            Amplie
                                        </th>
                                        <th>
                                            Secteur
                                        </th>
                                        <th>
                                            Montant
                                        </th>
                                        <th style="width: 25%">
                                            Actions
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
