@extends('layouts.app', ['activePage' => 'amplie-management', 'titlePage' => __('Gestion des amplies')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="/amplies/{{$selected->id}}"  id="-abonne-form" class="form-horizontal">
                    @csrf
                    @method('PUT')

                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Modifier amplie') }}</h4>
                            <p class="card-category">{{ __('informations de l\'amplie') }}</p>
                        </div>
                        <div class="card-body ">
                            @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Adresse') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('nom') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}"
                                            name="adresse" id="input-adresse" type="text"
                                            placeholder="{{ __('Nom ex: Yeumbeul chez Lamine NDONG') }}" value="{{$selected->adresse}}" required="true"
                                            aria-required="true" />
                                        @if ($errors->has('nom'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-adresse">{{ $errors->first('adresse') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Secteur') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('secteur_id') ? ' has-danger' : '' }}">
                                        <select id="input-secteur" name="secteur_id" class="form-control" value="{{old('secteur_id')}}" required>
                                            <option selected value="">Choisir secteur</option>
                                            @foreach ($secteurs as $secteur)
                                            <option value="{{ $secteur->id }}" {{ $selected->id == $secteur->id ? "selected" : "" }}>{{ $secteur->nom_secteur }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('secteur'))
                                        <span id="secteur-errorn" class="error text-danger"
                                            for="input-secteur">{{ $errors->first('secteur') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" id="edit-amplie" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
