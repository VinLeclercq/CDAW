@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                <h1>Toutes les playlists</h1>
                <span class="subheading">A l'abordage !</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        @foreach ($playlists as $playlist)
        <div class="row gx-4 gx-lg-5 justify-content-center h-divider">
            <div class="row container">
                <a href="{{ route('playlist.details', [$playlist->id])}}">
                    <div class="col-4">
                        <h2 Id="Title">{{$playlist->name}}</h2>
                    </div>
                </a>
                <div>
                @auth
                    @if($playlist->users_subscribed()->where('ID_user', Auth::user()->id)->exists())
                    <form action="{{ route('playlist.unsubscribe', [$playlist->id])}}" method="POST">
                        @csrf
                        <input class="btn btn-primary" id="submitButton" type="submit" value="Se désabonner">
                    </form>
                    @else
                    <form action="{{ route('playlist.subscribe', [$playlist->id])}}" method="POST">
                        @csrf
                        <input class="btn btn-primary" id="submitButton" type="submit" value="S'abonner">
                    </form>
                    @endif                    
                @endauth
                </div>
                {{-- <h3 id="creator">{{$playlist->users_owning()->name}}</h3> --}}
            </div>
            @foreach ($playlist->medias_in_playlist as $media)
            @if ($loop->index == 3)
                <div class="col-3">
                    <a href="{{ route('playlist.details', [$playlist->id])}}">
                        <div class="card">
                            <i class="m-auto fas fa-angle-right fa-5x"></i>
                            <p class="text-center">Clique ici pour voir plus de médias.</p>
                        </div>
                    </a>
                </div>
                @break
            @endif
            <div class="col-3">
                <a href="{{ route('media.details', [$media->id])}}">
                    <div class="card">
                            <img class="mx-auto d-block" src="{{$media->poster_url}}"  alt="media_poster" height="250px">
                        <div class="card-body">
                            <h5 class="card-title text-center" >{{$media->name}}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <hr>
        @endforeach
        <br>
    </div>
</main>
@endsection
