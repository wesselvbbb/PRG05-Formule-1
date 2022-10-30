@extends('layouts.web')

@section('content')
    <div>
        @can('is-validated')
            @include('partials._search-form')
        @endcan
        @include('partials._categories-list')
    </div>
    @foreach($posts as $post)

        <div class="card" style="width: 18rem; display: inline-block">
            <img class="card-img-top" src="{{asset("storage/$post->file_path")}}" alt="Card image cap">
            <div class="card-body">
                <h3>{{$post->title}}</h3>
                <p class="card-text">{{$post->content}}</p>
                <p style="font-size: smaller; color: brown">
                    Category: {{ $post->category->name }}
                </p>
                <p class="card-text" style="font-size: smaller; font-style: italic">Posted: {{$post->created_at}}</p>
                <a href="{{ url('/post/' . $post->id) }}">Show</a>
            </div>
        </div>
    @endforeach
@endsection
