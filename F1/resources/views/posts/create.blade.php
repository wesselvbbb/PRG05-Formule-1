@extends('posts.layout')
@section('content')

    <div class="card">
        <div class="card-header">Post Page</div>
        <div class="card-body">

            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <label>Title</label></br>
                <input type="text" name="title" id="title" class="form-control"></br>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>Content</label></br>
                <input type="text" name="content" id="content" class="form-control"></br>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>File</label></br>
                <input type="file" name="file" id="file" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
            <a href="{{url('/post')}}">Back</a>

        </div>
    </div>

@stop
