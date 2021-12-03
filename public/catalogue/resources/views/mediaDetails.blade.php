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
                        @foreach($media->directors as $director)
                            {{$director->forename}} {{$director->name}}
                            @if(!$loop->last)
                                &
                            @endif
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    <h2>Acteur(s)</h2>
    @foreach($media->actors as $actor)
        <a href="{{url('/person', $actor->id)}}">
            <p>{{$actor->forename}} {{$actor->name}}</p>
        </a>
    @endforeach
    
    @if($media->type == 'Film')
        <h2>Réalisateur(s)</h2>
        @foreach($media->directors as $director)
            <a href="{{url('/person', $director->id)}}">
                <p>{{$director->forename}} {{$director->name}}</p>
            </a>
        @endforeach        
    @endif

    @if ($media->type == "Série")
        <h2>Nombre d'épisodes</h2>
        <p>{{$media->episode_nb}}</p>
        <h2>Nombre de saisons</h2>
        <p>{{$media->season_nb}}</p>
    @endif

    <h2>Genre(s)</h2>
    @foreach($media->categories as $category)
        <p>{{$category->name}}</p>
    @endforeach

    <a href="{{url()->current().'/comments'}}">
        <button class="btn btn-primary">Commentaires</button>
    </a>

@endsection