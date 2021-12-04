@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                <h1>Ceci est une liste de personnes</h1>
                <span class="subheading">des gens</span>
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
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Trier
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="">Ordre alphabétique</a></li>
                        <li><a class="dropdown-item" href="">Ordre alphabétique inversé</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <a href="{{ url('')}}">
                    <button type="button" class="btn btn-primary">Nouvelle entrée</button>
                </a>
            </div>

            <br />

            @foreach ($people as $person)

            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="row">
                    <div class="col">
                        <a href="{{url('/person', $person->id)}}">
                            <h2 Id="Nom">{{$person->name}}</p></h2>
                        <a> 
                    </div>
                    <div class="col">
                        <div class="row">
                            <a href="{{ url('/modifyPerson', $person->id)}}">
                                <button type="button" class="btn btn-primary">Modifier</button>
                            </a>
                        </div>
                        <br />
                        <div class="row">
                            <form action="{{ url('/deletePerson', $person->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-secondary" id="submitButton" type="submit" value="Supprimer">
                            </form>
                        </div>
                        <br />
                    </div>
                    <hr/>
                </div>
            </div>
            @endforeach

            {{$people->links()}}

        </div>

</main>
@endsection
