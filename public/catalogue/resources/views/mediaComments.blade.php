@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{$media->backdrop_url}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Commentaires</h1>
                    <span class="subheading">
                        {{$media->name}} 
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    @foreach ($comments as $comment)
        <h5>{{$comment->user->forename}} {{$comment->user->name}}</h5>
        <h2>{{$comment->title}}</h2>
        <p>{{$comment->content}}</p>
    @endforeach
@endsection