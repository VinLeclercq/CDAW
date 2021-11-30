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

    <h2>Ajouter un commentaire</h2>    

    <form action= " {{ url()->current() }} " method="POST">
        @csrf
        <label for="title">Titre</label>
        <input type="text" name="title" id="title">
        
        <label for="content">Contenu</label>
        <input type="text" name="content" id="content">

        @auth
            <input name="userID" id="userID" type="hidden" value={{Auth::user()->id}}>
        @endauth
        <input name="mediaID" id="mediaID" type="hidden" value={{$media->id}}>

        <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>

    <br/>

    @foreach ($comments as $comment)
        <h5>{{$comment->user->forename}} {{$comment->user->name}}</h5>
        <h2>{{$comment->title}}</h2>
        <p>{{$comment->content}}</p>
        @auth
            @if(Auth::user() == $comment->user)
                <form action=" {{ url()->current() }} " method="POST">
                    @csrf
                    @method('DELETE')
                    <input name="commentID" id="commentID" type="hidden" value={{$comment->id}}>
                    <input class="btn btn-secondary" id="submitButton" type="submit" value="Supprimer">
                </form>
            @endif
        @endauth
    @endforeach
@endsection