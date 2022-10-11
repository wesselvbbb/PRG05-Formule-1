@extends('categories.layout')
@section('content')

    <div class="card">
        <div class="card-header">Categories Page</div>
        <div class="card-body">

            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <label>Title</label></br>
                <input type="text" name="title" id="title" class="form-control"></br>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
            <a href="{{url('/post')}}">Back</a>

        </div>
    </div>

@stop
