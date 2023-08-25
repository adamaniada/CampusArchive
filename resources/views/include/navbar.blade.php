<nav class="navbar navbar-expand-lg shadow" style="background-color:#e3f2fd;" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }} 
            <img class="rounded-circle" width="40px" height="40px" src="{{ asset('fichiers/photos/UNZ_UFR-ST_MPCI_1679651580_w3iLbWKnVX_641d72fc19f9b.jpg') }}" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('ACCEUIL') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('univ') }}">{{ __("UNIVERSITE") }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('examen') }}">{{ __("EXAMENS") }}</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __("AUTRES") }}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user') }}">{{ __("Utilisateurs") }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('role') }}">{{ __("Role") }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __("Autres") }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::check())
                                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                            @else
                                {{ __('CONNEXION') }}
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @if (Auth::check())
                                <li><a class="dropdown-item" href="{{ route('profil') }}">{{ __('Mes informations') }}</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout.perForm') }}">{{ __('Deconnexion') }}</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Se connecter') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">{{ __("S'inscrire") }}</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3 mt-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>
            </div>
        </div>
    </div>
</nav>