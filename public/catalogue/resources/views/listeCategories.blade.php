@extends("template")

@section("content")
    <div class="container">
        <p>Test Categories</p>
        @foreach ($categories as $category)
            <b>{{$category->name}}</b><br>
        @endforeach
    </div>
@endsection
