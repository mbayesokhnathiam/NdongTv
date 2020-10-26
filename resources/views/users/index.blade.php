@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Gestion des utilisateurs')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Liste utilisateur</h4>
                        <p class="card-category"> Ici vous pouvez gérer les utilisateurs</p>
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
                                            Nom
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Date de création
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Admin Admin
                                        </td>
                                        <td>
                                            admin@material.com
                                        </td>
                                        <td>
                                            2020-02-24
                                        </td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="#"
                                                data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
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
