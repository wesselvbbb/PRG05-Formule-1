@extends('categories.layout')
@section('content')

    <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">

            <form action="{{ url('categories/' .$category->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$category->id}}" id="id" />
                <label>Title</label></br>
                <input type="text" name="title" id="title" value="{{$category->title}}" class="form-control"></br>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
            <a href="{{url('/categories')}}">Back</a>
        </div>
    </div>

@stop
