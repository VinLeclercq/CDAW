@extends("template")

@section("contentBody")
    <div class="container">
        <p>Test Categories</p>
        @foreach ($categories as $category)
            <b>{{$category->name}}</b><br>
        @endforeach
    </div>