<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            <img src="{{asset('assets/img/deule-prime-logo.png')}}" alt="DeulePrimeLogo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
					 @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
						<button class="border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
							<img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
						</button>
					{{-- @else
						<span class="inline-flex rounded-md">
							<button type="button" class="nav-item">
								{{ Auth::user()->name }}

								<svg class="nav-item" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
								</svg>
							</button>
						</span> --}}
					@endif
                        <a id="navbarDropdown" data-bs-toggle="dropdown" class="nav-link dropdown-toggle" href="#" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"  href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                            <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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
