@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/australia.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{$person->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <h2>Acteur(ice)</h2>
        @foreach($person->act as $media)
            <a href="{{url('/medias', $media->id)}}">
                <p>{{$media->name}}</p>
            </a>
        @endforeach

        <h2>Réalisateur(ice)</h2>
        @foreach($person->direct as $media)
            <a href="{{url('/medias', $media->id)}}">
                <p>{{$media->name}}</p>
            </a>
        @endforeach
    </div>
</main>
@endsection