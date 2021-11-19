@extends('template');
@section('header');
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                        <h1>Ajouter un film</h1>
                        <span class="subheading">Vous n'avez pas trouver votre film préféré? Ajouté le !</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
@endsection
@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Un poisson en plus dans le banc ! </p>

                <div class="my-5">
                    <form url="addFilm", method="POST">
                        <div class="form-floating">
                            <input class="form-control" id="nom" placeholder="nom du film"/>
                            <label for="nom">Nom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="realisateur" placeholder="réalisateur" />
                            <label for="realisateur">Réalisateur</label>
                        </div>
                        <select class="form-select" aria-label="Default select example" wire:model="account.0">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <br />
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Film ajouté !</div>
                            </div>
                        </div>
                        <button class="btn btn-primary text-uppercase disabled" id="submitButton" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
