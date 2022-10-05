@extends('layouts.web')

@section('content')
@foreach($posts as $post)

    <div class="card" style="width: 18rem; display: inline-block">
{{--        <img class="card-img-top" src="{{$post->file_path}}" alt="Card image cap">--}}
        <div class="card-body">
            <h1>{{$post->title}}</h1>
            <p class="card-text">{{$post->content}}</p>
{{--            <p>--}}
{{--                <a href="/categories{{$post->category->id}}">{{ $post->category->name }}</a>--}}
{{--            </p>--}}
            <a href="{{ url('/post/' . $post->id) }}">Lees meer</a>
        </div>
    </div>
@endforeach
@endsection
