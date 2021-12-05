@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                <h1>Ceci est une liste de médias</h1>
                <span class="subheading">films et séries</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <a href="{{ url('/addMedia')}}">
                    <button type="button" class="btn btn-primary">Nouveau média</button>
                </a>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Trier
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{url()->current() . '?field=name&order=asc'}}">Ordre alphabétique</a></li>
                        <li><a class="dropdown-item" href="{{url()->current() . '?field=name&order=desc'}}">Ordre alphabétique inverse</a></li>
                        <li><a class="dropdown-item" href="{{url()->current() . '?field=release_date&order=desc'}}">Les plus récents</a></li>
                        <li><a class="dropdown-item" href="{{url()->current() . '?field=release_date&order=asc'}}">Les plus anciens</a></li>
                    </ul>
                </div>
            </div>

            <br />

            @foreach ($medias as $media)

            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col">

                    <h2 Id="Title">{{$media->name}}</h2> {{substr($media->release_date, 0, 4)}}</p>
                    <div class="row">
                        <div class="col-md-auto">
                            @guest
                            <a href="{{url('/medias', $media->id)}}">
                                <img src="{{$media->poster_url}}" alt="media_poster" height="150">
                            </a>
                            @else
                            <a href="{{ route('medias.detail', [Auth::user()->id, $media->id])}}">
                                <img src="{{$media->poster_url}}" alt="media_poster" height="150">
                            </a>
                            @endguest
                        </div>
                        @auth
                        <div class="col">
                            <a  data-bs-toggle="dropdown" class="dropdown-toggle">
                                <i class="fas fa-plus"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach ($playlists as $playlist)
                                <form action="{{ route('playlist.addMedia', [$playlist->id, $media->id])}}" method="POST">
                                    @csrf
                                    <li><input class="dropdown-item" type="submit" value="{{$playlist->name}}"></li>
                                </form>
                                @endforeach
                            </ul>
                        </div>
                        @endauth
                        <div class="col">

                            @if($media->type == "Film")
                            <div class="row">
                                <label for="Author" class="col"><h4 style="margin: 20px">Réalisateur</h4></label>
                                    @foreach($media->directors as $director)
                                        <span style="margin: 10px" Id="Author" class="col">
                                            <a href="{{url('/person', $director->id)}}">
                                                {{$director->forename}} {{$director->name}}
                                            </a>
                                        </span>
                                    @endforeach
                            </div>
                            @endif

                            <div class="row">
                                <label for="Genre" class="col"><h4 style="margin: 15px">Genre(s)</h4></label>
                                @foreach($media->categories as $category)
                                    <span style="margin: 10px" Id="Genre", class="col">
                                        {{$category->name}}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @auth
                        <div class="col">
                            <div class="row">
                                <a href="{{ url('/modifyMedia', $media->id)}}">
                                    <button type="button" class="btn btn-primary">Modifier</button>
                                </a>
                            </div>
                            <br />
                            <div class="row">
                                <form action="{{ url('/deleteMedia', $media->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-secondary" id="submitButton" type="submit" value="Supprimer">
                                </form>
                            </div>
                            <br />
                        </div>
                        @endauth
                    </div>
                    <hr/>
                </div>
            </div>
            @endforeach

            {{$medias->links()}}

        </div>

</main>
@endsection
