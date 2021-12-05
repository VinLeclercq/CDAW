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
            <input onclick="hide()" class="btn btn-primary text-uppercase" type="button" value="Ajouter une playlist" id="btn">
            <br>
            <form id="ajout" action="{{ route('playlist.add', [Auth::user()])}}" method="POST" hidden>
                @csrf
                <div class="form-floating">
                    <input class="form-control" id="name" name="name"/>
                    <label for="nom">Nom</label>
                </div>
                <div>
                    <input type="checkbox" name="is_public" class="switch-input"}}/>
                    <label for="is_public">Playlist publique</label>
                </div>
                <input class="btn btn-primary text-uppercase" id="submitButton" type="submit" value="Ajouter">
            </form>
        </div>

        <script>
            function hide(){
                $ajout = document.getElementById("ajout");
                $btn = document.getElementById("btn");
                if ( $ajout.hidden == true ){
                    $ajout.hidden = !ajout.hidden;
                    $btn.value = "Abandonner";
                    }
                else{
                    $ajout.hidden = !ajout.hidden;
                    $btn.value = "Ajouter une playlist";
                }
            }
        </script>

        <br>
        @foreach ($playlists as $playlist)
        <div class="row gx-4 gx-lg-5 justify-content-center h-divider">
            <div class="row container">
                <div class="col-4">
                    <a href="{{ route('playlist.details', [$playlist->id])}}">
                        <h2 Id="Title">{{$playlist->name}}</h2>
                    </a>
                </div>
                <div class=" mx-auto col-2 justify-content-center">
                    @if ($playlist->is_public)
                        <i class="fas fa-unlock"></i>
                    </div>
                    <div class="col-4">
                        <h3 Id="isPublic">Public</h3>
                    @else
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="col-4">
                        <h3 Id="isPublic">Privé</h3>
                    @endif
                </div>
                <div class="col-2">
                    <form action="{{ route('playlist.delete', [$playlist->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-outline-dark btn-sm"  type="submit" style=""><i class="fas fa-trash fa-lg"></i></button>
                        {{-- <input class="btn btn-primary fas fa-trash" id="submitButton" type="submit" > --}}
                    </form>
                </div>
            </div>
            @foreach ($playlist->medias_in_playlist as $media)
            @if ($loop->index == 3)
                <div class="col-3">
                    <a href="{{ route('playlist.details', [$playlist->id])}}">
                        <div class="card" height="100%">
                            <i class="m-auto fas fa-angle-right fa-5x"></i>
                            <p class="text-center">Clique ici pour voir plus de médias.</p>
                        </div>
                    </a>
                </div>
                @break
            @endif
            <div class="col-3">

                <div class="card" height="100%">
                    <a href="{{ route('media.details', [$media->id])}}">
                        <img class="mx-auto d-block" src="{{$media->poster_url}}"  alt="media_poster" height="250px">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('media.details', [$media->id])}}">
                            <h5 class="card-title text-center" >{{$media->name}}</h5>
                        </a>
                        <form class="mx-auto" action="{{route('playlist.removeMedia', [$playlist->id, $media->id])}}" method="POST">
                            @csrf
                            <button  class="btn btn-secondary btn-sm"  type="submit"><i class="fas fa-times fa-2x"></i></button>
                            {{-- <input class="btn btn-primary mx-auto fas fa-times" id="submitButton" type="submit" style="color:#FA5656"> --}}
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        @endforeach
        <br>
    </div>



</main>
@endsection
