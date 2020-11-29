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
              <h3 class="card-title">180
                {{-- <small>GB</small> --}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-success">groupe</i>
                <a href="#pablo">Afficher liste abonnés</a>
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
              <h3 class="card-title">4</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">store</i>
                    <a href="#pablo">Afficher liste secteurs</a>
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
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">dvr</i>
                    <a href="#pablo">Afficher liste amplies</a>
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
              <h3 class="card-title">10</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">attach_money</i>
                    <a href="#pablo">Afficher liste crédits</a>
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
                  <p class="card-category">Liste des secteurs et le nombre d'abonnés par secteur</p>
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
                  <th>ID</th>
                  <th>Amplie</th>
                  <th>Secteur</th>
                  <th>NB Abonnés</th>
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
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
