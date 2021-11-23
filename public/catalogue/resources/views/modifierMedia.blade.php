@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                        <h1>Modifier un film</h1>
                        <span class="subheading">Votre film est mal catégorisé ? Contribuez !</span>
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
                <p>Voilà, c'est bien mieux !</p>
                <div class="my-5">
                    <form action="{{ url('/modifyFilm', $film->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" value="{{$film->name}}"/>
                            <label for="nom">Nom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="director" name="director" value="{{$film->director}}"/>
                            <label for="realisateur">Réalisateur</label>
                        </div>
                        <select class="form-select" aria-label="Default select example" id="category" name="category">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <br />
                        <input class="btn btn-primary text-uppercase" id="submitButton" type="submit" value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
