@extends('layouts.web')

@section('content')
@include('partials._search-form')
@include('partials._categories-dropdown')

@foreach($posts as $post)

    <div class="card" style="width: 18rem; display: inline-block">
        <img class="card-img-top" src="{{asset("storage/$post->file_path")}}" alt="Card image cap">
        <div class="card-body">
            <h3>{{$post->title}}</h3>
            <p class="card-text">{{$post->content}}</p>
            <p style="font-size: smaller; color: brown" >
{{--                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>--}}
                Category: {{ $post->category->name }}
            </p>
            <a href="{{ url('/post/' . $post->id) }}">Read more</a>
        </div>
    </div>
@endforeach
@endsection
