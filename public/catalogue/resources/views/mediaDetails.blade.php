@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{$media->backdrop_url}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{$media->name}}</h1>
                    <span class="subheading">
                        {{substr($media->release_date, 0, 4)}}
                        ·

                        @if($media->type == 'Film')
                            @foreach($media->directors as $director)
                                {{$director->forename}} {{$director->name}}
                                @if(!$loop->last)
                                    &
                                @endif
                            @endforeach
                        @endif

                        @if($media->type == 'Série')
                            {{substr($media->last_date, 0, 4)}}
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    @auth
    <div class="col offset-md-3">
        <div class="col align-self-center">
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
            <a href="{{ url('/modifyMedia', $media->id)}}">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    </div>
    @endauth
    <div class="row justify-content-around">
        <div class="col-md-auto">
            <img src="{{$media->poster_url}}" alt="media_poster" width="500">
        </div>
        <div class="col align-self-center">
            <div class="row-auto align-items-center">
                <div class="container">
                    @if($media->type == 'Film')
                        <h2>Réalisateur(s)</h2>
                        @foreach($media->directors ?? '' as $director)
                            <a href="{{url('/person', $director->id)}}">
                                <i class="fas fa-film"></i> {{$director->forename}} {{$director->name}}
                            </a>
                        @endforeach
                        <br><br>
                    @endif
                </div>
            </div>
            <div class="row-auto align-items-center">
                <div class="container">
                    <h2>Acteur(s)</h2>
                    @foreach($media->actors ?? '' as $actor)
                        <a  href="{{url('/person', $actor->id)}}">
                            <i class="far fa-star"></i> {{$actor->forename}} {{$actor->name}}
                        </a>
                    @endforeach
                </div>
            </div>
            <br><br>
            <div class="container row-auto align-items-center">
                @if($media->type == 'Série')
                    <h2>Nombre d'épisodes</h2>
                    <p>{{$media->episode_nb ?? ''}}</p>
                    <h2>Nombre de saisons</h2>
                    <p>{{$media->season_nb ?? ''}}</p>
                    <br><br>
                @endif
            </div>
            <div class="row">
                <div class="container">
                    <h2>Genre(s)</h2>
                    @foreach($media->categories ?? '' as $category)
                        <p>{{$category->name}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
    <div>
        <h2>Synopsis</h2>
        <p>{{$media->description}}</p>
    </div>

    <a href="{{url()->current().'/comments'}}">
        <button class="btn btn-primary">Commentaires</button>
    </a>

@endsection
