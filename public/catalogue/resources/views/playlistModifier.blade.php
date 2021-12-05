@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/narnia.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                <h1>Edition de playlist</h1>
                <span class="subheading">A ton tour moussaillon</span>
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
                    <form action="{{ route('playlist.modify', $playlist->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name"/>
                            <label for="nom">Nom</label>
                        </div>
                        <div>
                            <input type="checkbox" name="is_public" class="switch-input"}}/>
                            <label for="is_public">Playlist publique</label>
                        </div>

                        <br/>
                        <input class="btn btn-primary text-uppercase" id="submitButton" type="submit" value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection