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
    <div class="col-md-auto">
        <div class="mx-auto card">
            <h5 class="card-title text-center" >{{$playlist->name}}</h5>
            @if ($playlist->is_public)
            <i class="mx-auto fas fa-unlock"></i>
            <h3 class="mx-auto" Id="isPublic">Public</h3>
            @else
            <i class="mx-auto fas fa-lock"></i>
            <h3 class="mx-auto" Id="isPublic">Privé</h3>
            @endif
            <a href="{{route('playlist.modify.get', $playlist->id)}}">
                <i class="m-auto fas fa-edit"></i>
            </a>
        </div>
    </div>

    <div class="container px px-lg">
        <div class="col">
            @foreach ($playlist->medias_in_playlist as $media)
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col">
                        <h2 Id="Title">{{$media->name}}</h2> {{substr($media->release_date, 0, 4)}}</p>
                        <div class="row">
                            <div class="col-md-auto">
                                <a href="{{ route('media.details', [$media->id])}}">
                                    <img src="{{$media->poster_url}}" alt="media_poster" height="150">
                                </a>
                            </div>
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
                        </div>
                        <hr/>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</main>
@endsection
