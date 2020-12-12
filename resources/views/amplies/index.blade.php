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
                                <a href="{{ route('amplies.create') }}" class="btn btn-sm btn-primary">Nouveau</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
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
                                @foreach($amplies as $amplie)
                                    <tr>
                                        <td>{{ $amplie->adresse }}</td>
                                        <td>{{ $amplie->secteur->nom_secteur }}</td>
                                        <td>{{ count($amplie->abonnements)}}</td>
                                        <td class="text-right"><a href="/amplies/{{$amplie->id}}/edit" class="btn btn-success"><span class="material-icons">
                                        create
                                        </span></a></td>
                                    </tr>
                                @endforeach

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
