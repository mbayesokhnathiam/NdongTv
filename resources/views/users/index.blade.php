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
                                <!-- <a href="#" class="btn btn-sm btn-primary">Nouveau</a> -->
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
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($users as $user)
                                   <tr>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$user->created_at}}
                                        </td>
                                        
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
