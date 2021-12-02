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
            </div>
            <br />

            @foreach ($medias as $media)

            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col">

                    <h2 Id="Title">{{$media->name}}</p></h2>
                    <div class="row">

                        <div class="col">
                            <a href="{{url('/medias', $media->id)}}">
                                <img src="{{$media->poster_url}}" alt="media_poster" height="150">
                            </a>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="Author" class="col"><h4 style="margin: 20px">Réalisateur</h4></label>
                                @foreach($media->directors as $director)
                                    <span style="margin: 10px" Id="Author" class="col">
                                        {{$director->forename}} {{$director->name}}
                                    </span>
                                @endforeach
                            </div>
                            <div class="row">
                                <label for="Genre" class="col"><h4 style="margin: 15px">Genre(s)</h4></label>
                                @foreach($media->categories as $category)
                                    <span style="margin: 10px" Id="Genre", class="col">
                                        {{$category->name}}
                                    </span>
                                @endforeach
                            </div>
                        </div>
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
                    </div>
                    <hr/>
                </div>
            </div>
            @endforeach

        </div>

</main>
@endsection
