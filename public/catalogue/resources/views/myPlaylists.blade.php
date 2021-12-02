@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                <h1>Mes playlists</h1>
                <span class="subheading">Tout le monde sur le même bâteau</span>
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
            {{-- <a href="{{ url('/addMedia')}}"> --}}
                <button type="button" class="btn btn-primary">Nouvelle playlist</button>
            {{-- </a> --}}
        </div>

        @foreach ($playlists as $playlist)

        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col">

                <h2 Id="Title">{{$playlist->name}}</p></h2>

                @foreach ($playlist->medias_in_playlist as $media)
                <figure>
                <img src="{{$media->poster_url}}">
                    <figcaption class="text-truncate">{{$media->title}}</figcaption>
                    </figure>
                @endforeach

                <hr/>

                {{-- <div id="playlist" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($playlist->medias_in_playlist as $media)
                            <div class="carousel-item" {{ $loop->first ? 'active' : '' }}>
                                <img class="d-block w-100" src="{{$media->poster_url}}" alt="{{$media->name}}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div> --}}
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
