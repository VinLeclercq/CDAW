@extends('template')
@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                        <h1>Ceci est un média</h1>
                        <span class="subheading">qu'est-ce qu'il est bien codé...
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
                <a href="{{ url('/addFilm')}}">
                    <button type="button" class="btn btn-primary">Nouveau film</button>
                </a>
            </div>
            <br />

            @foreach ($films as $film)

            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col">
                    <h2 Id="Title">{{$film->name}}</p></h2>
                    <hr/>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <label for="Author" class="col"><h4 style="margin: 20px">Réalisateur</h4></label>
                                <span style="margin: 10px" Id="Author" class="col">{{$film->director}}</span>
                            </div>
                            <div class="row">
                                <label for="Genre" class="col"><h4 style="margin: 15px">Genre(s)</h4></label>
                                <span style="margin: 10px" Id="Genre", class="col">{{$film->category->name}}</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <a href="{{ url('/modifyFilm', $film->id)}}">
                                    <button type="button" class="btn btn-primary">Modifier</button>
                                </a>
                            </div>
                            <br />
                            <div class="row">
                                <form action="{{ url('/deleteFilm', $film->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-secondary" id="submitButton" type="submit" value="Supprimer">
                                </form>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

</main>
@endsection
