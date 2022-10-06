@extends('posts.layout')
@section('content')

    <div class="card">
        <div class="card-header">Edit Post</div>
        <div class="card-body">

            <form action="{{ url('post/' .$post->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$post->id}}" id="id" />
                <label>Title</label></br>
                <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control"></br>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Content</label></br>
                <input type="text" name="content" id="content" value="{{$post->content}}" class="form-control"></br>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>File</label></br>
                <input type="file" name="file" id="file" value="{{$post->file_path}}" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
            <a href="{{url('/post')}}">Back</a>
        </div>
    </div>

@stop
