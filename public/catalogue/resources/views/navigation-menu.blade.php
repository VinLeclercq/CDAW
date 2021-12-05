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
                    <select class="form-select" id="type" name="type">
                        <option value="Films">Films</option>
                        <option value="Séries">Séries</option>
                        <option value="Personnes">Personnes</option>
                        <option value="Playlist">Playlist</option>
                    </select>

                    <input class="form-control" id="nameSearch" name="nameSearch"/>
                </form>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                @guest
                    <li><a class="nav-link" href="{{ url('medias') }}">{{ __('Accueil') }}</a></li>
                    <li><a class="nav-link" href="{{ url('films') }}">{{ __('Films') }}</a></li>
                    <li><a class="nav-link" href="{{ url('series') }}">{{ __('Séries') }}</a></li>
                    <li><a class="nav-link" href="{{ url('playlistsPublic') }}">{{ __('Playlist') }}</a></li>
                @else
                    <li><a class="nav-link" href="{{ url(Auth::user()->id,'medias')}}">{{ __('Accueil') }}</a></li>
                    <li><a class="nav-link" href="{{ url(Auth::user()->id,'films')}}">{{ __('Films') }}</a></li>
                    <li><a class="nav-link" href="{{ url(Auth::user()->id,'series')}}">{{ __('Séries') }}</a></li>
                    <li><a class="nav-link" href="{{ url('playlistsPublic') }}">{{ __('Playlists') }}</a></li>
                @endguest

                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a></li>
                @else
                    <li class="nav-item dropdown">
					 @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
						<button class="img-circular" style="border-radius: 50%">
                            {{-- <img class="profil-pic" src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->forename }}" width="40px" height="30" /> --}}
                            <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->forename }}" style="border-radius: 50%" width="125px" height="100"/>
						</button>
					 @else
						<span class="inline-flex rounded-md">
							<button type="button" class="nav-item">
								{{ Auth::user()->name }}

								<svg class="nav-item" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
								</svg>
							</button>
						</span>
					@endif
                        <a id="navbarDropdown" data-bs-toggle="dropdown" class="nav-link dropdown-toggle" href="#" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->forename }} <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item"  href="{{url('/myPlaylists', Auth::user()->id)}}" >
                                    {{ __('Mes playlists') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"  href="{{url(Auth::user()->id, 'susbscribed')}}" >
                                    {{ __('Mes abonnements') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"  href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                    {{ __('Mon profile') }}
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
