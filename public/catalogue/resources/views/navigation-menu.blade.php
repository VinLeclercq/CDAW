<nav class="navbar navbar-expand-md navbar-light navbar-fixed-top navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/medias') }}">
            <img src="{{asset('assets/img/deule-prime-logo.png')}}" alt="DeulePrimeLogo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <form action="{{ url('/search')}}" method="GET">
                    <div class="col">
                        <select class="form-select" id="type" name="type">
                            <option value="Films">Films</option>
                            <option value="Séries">Séries</option>
                            <option value="Personnes">Personnes</option>
                            <option value="Playlist">Playlist</option>
                        </select>
                    </div>
                    <div class="col">
                        <input class="form-control" id="nameSearch" name="nameSearch"/>
                    </div>
                </form>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">

                <li><a class="nav-link" href="{{ url('medias') }}">{{ __('Accueil') }}</a></li>
                <li><a class="nav-link" href="{{ url('films') }}">{{ __('Films') }}</a></li>
                <li><a class="nav-link" href="{{ url('series') }}">{{ __('Séries') }}</a></li>
                <li><a class="nav-link" href="{{ url('playlistsPublic') }}">{{ __('Playlist') }}</a></li>

                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" data-bs-toggle="dropdown" class="nav-link dropdown-toggle" href="#" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->forename }} <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu mx-auto">
                            <li class="mx-auto">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="img-circular" style="border-radius: 50%; background-color: transparent; border-color: transparent">
                                    <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->forename }}" class="img-circular m-auto"/>
                                </button>
                                @endif
                                <p class="text-center">{{Auth::user()->forename}} {{Auth::user()->name}}</p>
                            </li>
                            <li>
                                <a class="dropdown-item"  href="{{url('/myPlaylists', Auth::user()->id)}}" >
                                    {{ __('Mes playlists') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"  href="{{route('subscribed')}}" >
                                    {{ __('Mes abonnements') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"  href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                    {{ __('Mon profil') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Déconnexion') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

</nav>

@yield('page')
