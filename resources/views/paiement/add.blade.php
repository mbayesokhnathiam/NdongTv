@extends('layouts.app', ['activePage' => 'abonnes-management', 'titlePage' => __('Nouveau mois de paiement')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('save-paiement') }}"  id="add-paymens-form" class="form-horizontal">
                    @csrf
                    @method('post')

                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Créer un mois de paiement') }}</h4>
                            <p class="card-category">{{ __('informations mois de paiement') }}</p>
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
                                <label class="col-sm-2 col-form-label">{{ __('Mois') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control"
                                            name="mois" id="mois" type="text" value="{{ $month}}"
                                            readonly />
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Annee') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                            <input class="form-control"
                                                name="annee" id="annee" type="text" value="{{ $year}}"
                                                readonly />
                                            
                                        </div>
                                </div>
                                </div>
                        </div>

                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" id="save-mois-pay" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
