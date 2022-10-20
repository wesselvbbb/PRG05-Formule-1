@extends('posts.layout')

@section('content')
    <div class="card">
        <div class="card-header">Posts Page</div>
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>
                <img class="card-img-top" src="{{asset("storage/$post->file_path")}}" alt="Card image cap" style="max-width: 50vw; max-height: 50vh;"><br>
                <br>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text" style="color: brown">Category : {{ $post->category->name }}</p>
                <p class="card-text" style="font-style: italic">Created by : {{ $post->user->name }}</p>
            </div>
         <a href="{{url('/')}}">Back</a>

        </div>
@endsection
