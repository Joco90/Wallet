<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

    <div class="position-sticky pt-3 sidebar-sticky">
        {{-- <img class="bd-placeholder-img rounded-circle" src="{{asset('photo_profile/'.Auth::user()->photo)}}" alt="image de profile" width="40" height="40"/> --}}
        <p><strong>{{Auth::user()->name}}</strong></p>

        <div class="flex-shrink-0 p-3" style="width: 280px;">
            <a href="{{route('dashboard')}}" class="d-flex align-items-center pb-3 mb-2 link-dark text-decoration-none border-bottom">

               <i class="fa fa-home"></i> <span class="fs-5 fw-semibold">Tableau de bord</span>
            </a>
            <ul class="list-unstyled ps-0">
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                  Saisie
                </button>
                <div class="collapse show" id="home-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('liste-depense')}}" class="link-dark d-inline-flex text-decoration-none rounded">Dépenses</a></li>
                    <li><a href="{{route('liste-revenu')}}" class="link-dark d-inline-flex text-decoration-none rounded">Revenus</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reports</a></li>
                  </ul>
                </div>
              </li>

              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                  Prévision
                </button>
                <div class="collapse" id="orders-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Processed</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Shipped</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Returned</a></li>
                  </ul>
                </div>
              </li>
              <li class="border-top my-3"></li>
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                  Account
                </button>
                <div class="collapse" id="account-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Profile</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Settings</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sign out</a></li>
                  </ul>
                </div>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                  Paramétrage
                </button>
                <div class="collapse" id="dashboard-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('liste-budget')}}" class="link-dark d-inline-flex text-decoration-none rounded">Budgets</a></li>
                    <li><a href="{{route('liste-categorie')}}" class="link-dark d-inline-flex text-decoration-none rounded">Catégories</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Monthly</a></li>
                    <li><a href="{{route('user')}}" class="link-dark d-inline-flex text-decoration-none rounded">Utilisateurs</a></li>
                  </ul>
                </div>
              </li>
            </ul>
        </div>
    </div>


  </nav>
