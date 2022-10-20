@extends('layouts.web')

@section('content')
@include('partials._search-form')

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

@foreach($posts as $post)

    <div class="card" style="width: 18rem; display: inline-block">
        <img class="card-img-top" src="{{asset("storage/$post->file_path")}}" alt="Card image cap">
        <div class="card-body">
            <h1>{{$post->title}}</h1>
            <p class="card-text">{{$post->content}}</p>
            <p style="font-size: smaller; color: brown" >
                Category: {{ $post->category->name }}
            </p>
            <a href="{{ url('/post/' . $post->id) }}">Lees meer</a>
        </div>
    </div>
@endforeach
@endsection
