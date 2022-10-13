@extends('layouts.web')

@section('content')
    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
        <form method="GET" action="#">
            <label>
                <input type="text" name="search" placeholder="Search..." class="bg-transparent placeholder-black font-semibold text-sm" value="{{ request('search') }}">
            </label>
        </form>
    </div>

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
