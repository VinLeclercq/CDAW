@extends("template")

@section("content")
    <div class="container">
        <p>Liste des categories</p>
        @foreach ($categories as $category)
            <b>{{$category->name}}</b><br>
        @endforeach
    </div>
@endsection
