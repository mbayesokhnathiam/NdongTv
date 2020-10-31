<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Banlieu cable NDONG TV') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Tableau de bord') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'abonnes-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('abonnes.index') }}">
          <i class="material-icons">people</i>
            <p>{{ __('Abonnés') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">attach_money</i>
            <p>{{ __('Paiement') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">attach_money</i>
          <p>{{ __('Crédit') }}</p>
        </a>
      </li>

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
            <i class="material-icons">settings</i>
          <p>{{ __('Paramétrage') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> GU </span>
                <span class="sidebar-normal"> {{ __('Gestion Utilisateurs') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'zone-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('zones.index') }}">
                  <span class="sidebar-mini"> GZ </span>
                  <span class="sidebar-normal"> {{ __('Gestion Zones') }} </span>
                </a>
              </li>

              <li class="nav-item{{ $activePage == 'amplie-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('amplies.index') }}">
                  <span class="sidebar-mini"> AM </span>
                  <span class="sidebar-normal"> {{ __('Gestion Amplies') }} </span>
                </a>
              </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
