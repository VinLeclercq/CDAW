@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/the_finest_hour.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                        <h1>Ajouter un média</h1>
                        <span class="subheading">Un nouveau poisson tout frias</span>
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
                    <form url="addMedia" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name"/>
                            <label for="nom">Titre</label>
                        </div>

                        <div>
                            <input onclick="swap(this)" type="radio" id="film" name="type" value="Film" checked>
                            <label for="film">Film</label>
                            <input onclick="swap(this)" type="radio" id="serie" name="type" value="Série">
                            <label for="serie">Série</label>
                        </div>

                        <div>
                            <label for="release">Date de sortie</label>
                            <input type="date" id="release" name="release"/>
                        </div>

                        <div class="form-floating">
                            <input class="form-control" id="duration" name="duration"/>
                            <label for="duration">Durée (minutes)</label>
                        </div>

                        <div id="serie_specific" hidden>
                            <div class="form-floating">
                                <input class="form-control" id="episode_nb" name="episode_nb"/>
                                <label for="episode_nb">Nombre d'épisodes</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="season_nb" name="season_nb"/>
                                <label for="season_nb">Nombre de saisons</label>
                            </div>
                            <div>
                                <label for="last">Dernière date de diffusion</label>
                                <input type="date" id="last" name="last"/>
                            </div>
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

                        <div class="form-floating">
                            <input class="form-control" id="poster_url" name="poster_url"/>
                            <label for="poster_url">Lien affiche</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control" id="backdrop_url" name="backdrop_url"/>
                            <label for="backdrop_url">Lien fond</label>
                        </div>

                        <br>
                        <input class="btn btn-primary text-uppercase" id="submitButton" type="submit" value="Ajouter">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

<script>
    function swap(myRadio){
        serie = document.getElementById("serie_specific");

        if(myRadio.value == "Film"){
            serie.hidden = true;
        }else if(myRadio.value == "Série"){
            serie.hidden = false;
        }
    }
</script>