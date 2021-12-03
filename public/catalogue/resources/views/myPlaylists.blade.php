@extends('template')

@section('header')
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                <h1>Mes playlists</h1>
                <span class="subheading">Tout le monde sur le même bâteau</span>
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
            <script>
                document.getElementById("ajout").hidden;

                function hide(){
                    $ajout = document.getElementById("ajout");
                    $btn = document.getElementById("btn");
                    if ( $ajout.hidden == true ){
                        $ajout.hidden = !ajout.hidden;
                        $btn.value = "Abandonner";
                        }
                    else{
                        $ajout.hidden = !ajout.hidden;
                        $btn.value = "Ajouter une playlist";
                    }
                }
            </script>
            <input onclick="hide()" class="btn btn-primary text-uppercase" type="button" value="Ajouter une playlist" id="btn">
            <br>
            <form id="ajout" action="{{ route('playlist.add', [$userId])}}" method="POST">
                @csrf
                <div class="form-floating">
                    <input class="form-control" id="name" name="name"/>
                    <label for="nom">Nom</label>
                </div>
                <div>
                    <input type="checkbox" name="is_public" class="switch-input"}}/>
                    <label for="is_public">Rendre la playlist public</label>
                </div>
                <input class="btn btn-primary text-uppercase" id="submitButton" type="submit" value="Ajouter">
            </form>
        </div>
        <br>
        @foreach ($playlists as $playlist)
        <div class="row">
            <div class="row">
            <h2 Id="Title">{{$playlist->name}}</h2>
            <form action="{{ route('playlist.delete', [$playlist->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-secondary" id="submitButton" type="submit" value="Supprimer">
            </form>
            </div>
            @foreach ($playlist->medias_in_playlist as $media)
                <div>
                    <a href="{{url('/medias', $media->id)}}">
                        <img src="{{$media->poster_url}}"  alt="media_poster" height="100px">
                        <h5 class="card-title">{{$media->name}}</h5>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col">

                <div class="col-md-4" >
                                <div class="item-box-blog">
                                  <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="{{$media->poster_url}}"> </figure>
                                  </div>
                                  <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                        <h5>{{$media->name}}</h5>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                      <p><i class="fa fa-comments-o"></i> {{$media->type}}</p>
                                    </div>
                                  </div>
                                </div>
                              </div>


                <h2 Id="Title">{{$playlist->name}}</p></h2>
                <hr/>

                @foreach ($playlist->medias_in_playlist as $media)
                <figure>
                <img src="{{$media['poster_link']}}">
                    <figcaption class="text-truncate">{{$media['title']}}</figcaption>
                    </figure>
                @endforeach

                {{-- <div id="playlist" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($playlist->medias_in_playlist as $media)
                            <div class="carousel-item" {{ $loop->first ? 'active' : '' }}>
                                <img class="d-block w-100" src="{{$media->poster_url}}" alt="{{$media->name}}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div> --}}
        @endforeach
    </div>
</main>
@endsection
