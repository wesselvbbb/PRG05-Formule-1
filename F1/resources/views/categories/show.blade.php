@extends('categories.layout')
@section('content')
    <div class="card">
        <div class="card-header">Categories Page</div>
        <div class="card-body">


            <div class="card-body">
                <h5 class="card-title">Title : {{ $category->title }}</h5>
            </div>

            </hr>
            <a href="{{url('/categories')}}">Back</a>

        </div>
    </div>
    @endsection
