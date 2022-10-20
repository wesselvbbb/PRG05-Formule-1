@extends('categories.layout')
@section('content')

    <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">

            <form action="{{ url('categories/' .$category->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$category->id}}" id="id" />
                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control"></br>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
            <a href="{{url('/categories')}}">Back</a>
        </div>
    </div>

@stop
