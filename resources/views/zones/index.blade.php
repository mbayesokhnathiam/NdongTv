@extends('layouts.app', ['activePage' => 'zone-management', 'titlePage' => __('Gestion des secteurs')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Secteur</h4>
                        <p class="card-category"> Ici vous pouvez gérer les secteurs</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                {{-- <a href="#" class="btn btn-sm btn-primary">Nouveau</a> --}}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="table-secteurs">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Identidiant secteur
                                        </th>
                                        <th>
                                            Responsable
                                        </th>
                                        <th>
                                            NB amplies
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($secteurs as $secteur)
                                    <tr>
                                        <td>{{ $secteur->numero }}</td>
                                        <td>{{ $secteur->responsable }}</td>
                                        <td>{{ count($secteur['amplies']) }}</td>
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
