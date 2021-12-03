@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                        <h1>Modifier un media</h1>
                        <span class="subheading">Votre media est mal catégorisé ? Contribuez !</span>
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
                    <form action="{{ url('/modifyMedia', $media->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name"/>
                            <label for="nom">Titre</label>
                        </div>
                        <div>
                            <input type="radio" id="film" name="type" value="film">
                            <label for="film">Film</label>
                            <input type="radio" id="série" name="type" value="série">
                            <label for="série">Série</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="duration" name="duration"/>
                            <label for="duration">Durée</label>
                        </div>
                        <div>
                            <label for="nom">Date de sortie</label>
                            <input type="date" id="release" name="release"/>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="synopsis" name="synopsis"/>
                            <label for="synopsis">Synopsis</label>
                        </div>
                        <p>Status</p>
                        <select class="form-select" id="status" name="status">
                            <option value="En cours">En cours</option>
                            <option value="Fini">Fini</option>
                            <option value="Abandonné">Abandonné</option>
                        </select>
                        <p>Genres</p>
                        @foreach ($categories as $category)
                            <input type="checkbox" id="category_{{$category->id}}" name="categories[]" value="{{$category->id}}">
                            <label for="{{$category->name}}"> {{$category->name}}</label><br>
                        @endforeach
                        <br/>
                        <input class="btn btn-primary text-uppercase" id="submitButton" type="submit" value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
