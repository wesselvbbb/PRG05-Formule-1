@extends('posts.layout')

@section('content')
    <div class="card">
        <div class="card-header">Posts Page</div>
        <div class="card-body">


            <div class="card-body">
                <h5 class="card-title">Title : {{ $post->title }}</h5>
                <p class="card-text">Content : {{ $post->content }}</p>
                <p class="card-text">Category : {{ $post->category->name }}</p>
                <p class="card-text">Created by : {{ $post->user->name }}</p>
            </div>

            </hr>
            <a href="{{url('/post')}}">Back</a>

        </div>
    </div>
    @endsection
