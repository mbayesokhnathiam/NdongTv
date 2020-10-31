@extends('layouts.app', ['activePage' => 'abonnes-management', 'titlePage' => __('Ajouter Abonné')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="3" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')

                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Ajouter nouveau abonné') }}</h4>
                            <p class="card-category">{{ __('informations abonné') }}</p>
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
                                <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('nom') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}"
                                            name="nom" id="input-nom" type="text"
                                            placeholder="{{ __('Nom ex: NDONG') }}" required="true"
                                            aria-required="true" />
                                        @if ($errors->has('nom'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-nom">{{ $errors->first('nom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('prenom') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}"
                                            name="prenom" id="input-prenom" type="email"
                                            placeholder="{{ __('Prénom ex: Lamine') }}" required />
                                        @if ($errors->has('prenom'))
                                        <span id="prenom-error" class="error text-danger"
                                            for="input-prenom">{{ $errors->first('prenom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Téléphone') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('telephone') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}"
                                            name="prenom" id="input-telephone" type="tel"
                                            placeholder="{{ __('Téléphone ex: 77 000 00 00') }}" required />
                                        @if ($errors->has('telephone'))
                                        <span id="telephone-error" class="error text-danger"
                                            for="input-telephone">{{ $errors->first('telephone') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('NB TV') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('nb_tv') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nb_tv') ? ' is-invalid' : '' }}"
                                            name="nb_tv" id="input-nb-tv" type="number"
                                            placeholder="{{ __('NB TV ex: 10') }}" required />
                                        @if ($errors->has('nb_tv'))
                                        <span id="nb-tv-error" class="error text-danger"
                                            for="input-nb-tv">{{ $errors->first('nb_tv') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Secteur') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('secteur') ? ' has-danger' : '' }}">
                                        <select id="input-secteur" class="form-control">
                                            <option selected value="">Choisir secteur</option>
                                            <option value="">...</option>
                                        </select>
                                        @if ($errors->has('secteur'))
                                        <span id="secteur-errorn" class="error text-danger"
                                            for="input-secteur">{{ $errors->first('secteur') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Amplies') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('amplie_id') ? ' has-danger' : '' }}">
                                        <select name="amplie_id" id="input-amplie" class="form-control">
                                            <option selected value="">Choisir l'amplie</option>
                                            <option value="">...</option>
                                        </select>
                                        @if ($errors->has('amplie_id'))
                                        <span id="amplie-errorn" class="error text-danger"
                                            for="input-amplie">{{ $errors->first('amplie_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Prix unitaire') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('prix_tv') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('prix_tv') ? ' is-invalid' : '' }}"
                                            name="prix_tv" id="input-prix-tv" type="number"
                                            placeholder="{{ __('Prix unitaire ex: 2500') }}" required />
                                        @if ($errors->has('prix_tv'))
                                        <span id="prix-tv-error" class="error text-danger"
                                            for="input-nb-tv">{{ $errors->first('prix_tv') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Montant') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('montant') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nb_tv') ? ' is-invalid' : '' }}"
                                            name="montant" id="input-montant" type="number"
                                            placeholder="{{ __('0') }}" disabled />
                                        @if ($errors->has('montant'))
                                        <span id="montant-error" class="error text-danger"
                                            for="input-montant">{{ $errors->first('montant') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Réduction') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('reduction') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('reduction') ? ' is-invalid' : '' }}"
                                            name="reduction" id="input-reduction" type="number"
                                            placeholder="{{ __('Réduction ex: 1000') }}" required />
                                        @if ($errors->has('nb_tv'))
                                        <span id="reduction-error" class="error text-danger"
                                            for="input-reduction">{{ $errors->first('reduction') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
