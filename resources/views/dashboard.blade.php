@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Banlieu cable NDONG TV')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">people_outline</i>
              </div>
              <p class="card-category">Abonnés</p>
              <h3 class="card-title">{{ $nbAbonnes }}
                {{-- <small>GB</small> --}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-success">groupe</i>
                <a href="{{ route('abonnes.index') }}">Afficher liste abonnés</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Secteurs</p>
              <h3 class="card-title">{{ count($secteurs) }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">store</i>
                    <a href="{{ route('zones.index') }}">Afficher liste secteurs</a>
                  </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">dvr</i>
              </div>
              <p class="card-category">Amplies</p>
              <h3 class="card-title">{{ $amplies ? count($amplies) : 0 }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">dvr</i>
                    <a href="{{ route('amplies.index') }}">Afficher liste amplies</a>
                  </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">attach_money</i>
              </div>
              <p class="card-category">Crédits</p>
              <h3 class="card-title">{{ $credits ?? 0 }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <!-- <i class="material-icons text-success">attach_money</i> -->
                    <!-- <a href="#pablo">Afficher liste crédits</a> -->
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Secteurs</h4>
                  <p class="card-category">Liste des secteurs et le nombre d'amplies par secteur</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>Nom</th>
                      <th>Responsable</th>
                      <th>NB Amplies</th>
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
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Amplies</h4>
              <p class="card-category">Affiche les amplies et le nombre d'abonnés par amplie</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Amplie</th>
                  <th>Secteur</th>
                  <th>NB Abonnés</th>
                </thead>
                <tbody>
                @foreach($amplies ?? '' as $amplie)
                    <tr>
                        <td>{{ $amplie->adresse }}</td>
                        <td>{{ $amplie->secteur->nom_secteur }}</td>
                        <td>{{ count($amplie->abonnements)}}</td>
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
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
