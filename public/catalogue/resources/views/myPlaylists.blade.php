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
            <script>
                document.getElementById("ajout").hidden;

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
            <input onclick="hide()" class="btn btn-primary text-uppercase" type="button" value="Ajouter une playlist" id="btn">
            <br>
            <form id="ajout" action="{{ route('playlist.add', [$userId])}}" method="POST">
                @csrf
                <div class="form-floating">
                    <input class="form-control" id="name" name="name"/>
                    <label for="nom">Nom</label>
                </div>
                <div>
                    <input type="checkbox" name="is_public" class="switch-input"}}/>
                    <label for="is_public">Rendre la playlist public</label>
                </div>
                <input class="btn btn-primary text-uppercase" id="submitButton" type="submit" value="Ajouter">
            </form>
        </div>
        <br>
        @foreach ($playlists as $playlist)
        <div class="row">
            <div class="row">
                <div class="col">
                    <h2 Id="Title">{{$playlist->name}}</h2>
                </div>
                <div class="col">
                    <form action="{{ route('playlist.delete', [$playlist->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="fas fa-trash" id="submitButton" type="submit" >
                    </form>
                </div>
            </div>
            @foreach ($playlist->medias_in_playlist as $media)
                <div class="row">
                    <div class="col">
                        <a href="{{url('/medias', $media->id)}}">
                            <img src="{{$media->poster_url}}"  alt="media_poster" height="100px">
                            <h5 class="card-title">{{$media->name}}</h5>
                        </a>
                    </div>
                    <div class="col">
                        <form action="{{route('playlist.removeMedia', [$playlist->id, $media->id])}}" method="POST">
                            @csrf
                            <input class="fas fa-times" id="submitButton" type="submit" style="color:#FA5656">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
</main>
@endsection
