<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

    <div class="position-sticky pt-3 sidebar-sticky">
        {{-- <img class="bd-placeholder-img rounded-circle" src="{{asset('photo_profile/'.Auth::user()->photo)}}" alt="image de profile" width="40" height="40"/> --}}
        <p><strong>{{Auth::user()->name}}</strong></p>
        <div class="container">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saisie</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
          </h6>
        <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{route('liste-depense')}}">
            <span data-feather="file" class="align-text-bottom"></span>
            Dépenses
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('liste-revenu')}}">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
             Revenus
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="users" class="align-text-bottom"></span>
            Etats
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            Reports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers" class="align-text-bottom"></span>
            Integrations
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
        <span>Paramétrage</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle" class="align-text-bottom"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{route('liste-categorie')}}">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Catégories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('liste-budget')}}">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Budget
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Entrées
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('user')}}">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Utilisateurs
          </a>
        </li>
      </ul>
    </div>
  </nav>
