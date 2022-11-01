@extends('layouts.web')
@section('content')
    <div class="card">
        <div class="card-header">Profile</div>
        <div class="card-body">
            <h3 class="card-title">Hey, {{ $user->name }}</h3>
            <p class="card-text">Name: {{ $user->name }}</p>
            <p class="card-text">Email: {{ $user->email }}</p>
            <a href="{{ route('user.edit', $user) }}">
                <button class="btn btn-primary btn-sm">Edit</button>
            </a>
        </div>
    </div>

    <h2>My posts</h2>
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
                <a href="{{ url('/post/' . $post->id . '/edit') }}" title="Edit Post">
                    <button class="btn btn-primary btn-sm"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </button>
                </a>


                <form method="POST" action="{{ url('/post' . '/' . $post->id) }}"
                      accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                            title="Delete Post"
                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                            class="fa fa-trash-o" aria-hidden="true"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
