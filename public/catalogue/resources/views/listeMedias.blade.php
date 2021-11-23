@extends('template');
@section('header');
<header class="masthead" style="background-image: url({{asset('assets/img/pirate_des_caraibes.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                        <h1>Films</h1>
                        <span class="subheading">La liste de tout les films possibles et immaginables !</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
@endsection
@section('content');
<div class="container px-4 px-lg-5">
    <h1 style="color:#4C96D7">Les films</h1>

    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        <div class="col mb-5">
            <a class="card h-100" href="details.html">
                <!-- Film/Serie poster-->
                <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BMTExZmVjY2ItYTAzYi00MDdlLWFlOWItNTJhMDRjMzQ5ZGY0XkEyXkFqcGdeQXVyODIyOTEyMzY@._V1_.jpg" alt="..." />

                <!-- Film/Series details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!--Film/Series name-->
                        <h5 class="fw-bolder">Les Eternels</h5>
                        <!--Crew infos-->
                        Chloé Zhao
                    </div>
                </div>

            </a>
        </div>

        <div class="col mb-5">
            <a class="card h-100" href="details.html">
                <!-- Film/Serie poster-->
                <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BN2FjNmEyNWMtYzM0ZS00NjIyLTg5YzYtYThlMGVjNzE1OGViXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg" alt="..." />

                <!-- Film/Series details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!--Film/Series name-->
                        <h5 class="fw-bolder">Dune</h5>
                        <!--Crew infos-->
                        Denis Villeneuve
                    </div>
                </div>

            </a>
        </div>

        <div class="col mb-5">
            <a class="card h-100" href="details.html">
                <!-- Film/Serie poster-->
                <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BZjYwMDBmYmItNDRiYy00ZTkwLWIwZGQtOTMwNzk2ZGJiNGI2XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg" alt="..." />

                <!-- Film/Series details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!--Film/Series name-->
                        <h5 class="fw-bolder">Army of Thieves</h5>
                        <!--Crew infos-->
                        Matthias Schweighöfer
                    </div>
                </div>

            </a>
        </div>

        <div class="col mb-5">
            <a class="card h-100" href="details.html">
                <!-- Film/Serie poster-->
                <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BYjg4NGExN2EtZmMxYy00ZDEwLWJiZGEtOWRiN2RlMGE0OWE0XkEyXkFqcGdeQXVyNjY1MTg4Mzc@._V1_.jpg" alt="..." />

                <!-- Film/Series details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!--Film/Series name-->
                        <h5 class="fw-bolder">The Harder They Fall</h5>
                        <!--Crew infos-->
                        Jeymes Samuel
                    </div>
                </div>

            </a>
        </div>

        <div class="col mb-5">
            <a class="card h-100" href="details.html">
                <!-- Film/Serie poster-->
                <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BZjgwZDIwY2MtNGZlNy00NGRlLWFmNTgtOTBkZThjMDUwMGJhXkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_.jpg" alt="..." />

                <!-- Film/Series details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!--Film/Series name-->
                        <h5 class="fw-bolder">Last Night in Soho</h5>
                        <!--Crew infos-->
                        Edgar Wright
                    </div>
                </div>

            </a>
        </div>

        <div class="col mb-5">
            <a class="card h-100" href="details.html">
                <!-- Film/Serie poster-->
                <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BYTAzYzNlMDMtMGRjYS00M2UxLTk0MmEtYmE4YWZiYmEwOTIwL2ltYWdlL2ltYWdlXkEyXkFqcGdeQXVyNzc5MjA3OA@@._V1_.jpg" alt="..." />

                <!-- Film/Series details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!--Film/Series name-->
                        <h5 class="fw-bolder">Dune</h5>
                        <!--Crew infos-->
                        David Lynch
                    </div>
                </div>

            </a>
        </div>

        <div class="col mb-5">
            <a class="card h-100" href="details.html">
                <!-- Film/Serie poster-->
                <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BYWQ2NzQ1NjktMzNkNS00MGY1LTgwMmMtYTllYTI5YzNmMmE0XkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_.jpg" alt="..." />

                <!-- Film/Series details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!--Film/Series name-->
                        <h5 class="fw-bolder">No Time to Die</h5>
                        <!--Crew infos-->
                        Cary Joji Fukunaga
                    </div>
                </div>

            </a>
        </div>

        <div class="col mb-5">
            <a class="card h-100" href="details.html">
                <!-- Film/Serie poster-->
                <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BZTMxYjk3MmItMzk1OC00NmRhLThlMjYtNmQyNzA0MzgxMWI2XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg" alt="..." />

                <!-- Film/Series details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!--Film/Series name-->
                        <h5 class="fw-bolder">Finch</h5>
                        <!--Crew infos-->
                        Miguel Sapochnik
                    </div>
                </div>

            </a>
        </div>

    </div>

</div>
@endsection
