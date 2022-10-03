@extends('posts.layout')
@section('content')

    <div class="card">
        <div class="card-header">Post Page</div>
        <div class="card-body">

            <form action="{{ url('post') }}" method="post">
                {!! csrf_field() !!}
                <label>Title</label></br>
                <input type="text" name="title" id="title" class="form-control"></br>
                <label>Content</label></br>
                <input type="text" name="content" id="content" class="form-control"></br>
                <label>File</label></br>
                <input type="file" name="file" id="file" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
