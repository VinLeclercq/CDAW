@extends('template');
@section('header');
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                        <h1>Ceci est un média</h1>
                        <span class="subheading">qu'est-ce qu'il est bien codé.../span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
@endsection
@section('content')
<main class="mb-4">
    @foreach ($films as $film)
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col">
                    <h1 Id="Title">{{$film->name}}</p></h1>
                    <hr/>
                    <div class="row">
                        <label for="Author" class="col"><h3>Réalisateur</h3></label>
                        <div class="col">
                            <p Id="Author" class="p-justified">{{$film->director}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <label for="Genre" class="col"><h3>Genre(s)</h3></label>
                        <div class="col">
                            <p Id="Genre" class="p-justified">{{$film->category->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <a data-bs-toggle="modal" data-bs-target="#modifyFilm">
                            <button type="button" class="btn btn-primary">Modifier</button>
                        </a>
                    </div>
                    <br />
                    <div class="row">
                        <a data-bs-toggle="modal" data-bs-target="#deleteFilm">
                            <button type="button" class="btn btn-secondary">Supprimer</button>
                        </a>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    @endforeach
</main>
@endsection
