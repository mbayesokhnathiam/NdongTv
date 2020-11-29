@extends('layouts.app', ['activePage' => 'amplie-management', 'titlePage' => __('Gestion des amplies')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Amplies</h4>
                        <p class="card-category"> Ici vous pouvez gérer les amplies</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="#" class="btn btn-sm btn-primary">Nouveau</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Numero
                                        </th>
                                        <th>
                                            Adresse
                                        </th>
                                        <th>
                                            Secteur
                                        </th>
                                        <th>
                                            Nb Clients
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                    <td>1</td>
                    <td>Yeumbeul nord chez Fatou DIA</td>
                    <td>L</td>
                    <td>230</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Yeumbeul sur chez Mme FALL</td>
                    <td>Z</td>
                    <td>30</td>
                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
