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
@endsection
