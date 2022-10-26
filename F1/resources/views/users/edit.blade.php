@extends('layouts.web')
@section('content')
    <div class="card">
        <div class="card-header">Edit Profile</div>
        <div class="card-body">
            <form action="{{route('users.update', $user)}}" method="post">
                @csrf
                @method("PATCH")
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}"/><br>
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}"/><br>
                <labeL>Password</labeL>
                <input type="password" name="password"/><br>
                <label>Password confirmation</label>
                <input type="password" name="password_confirmation"/><br>

                <button type="submit" value="Update" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
    </div>
@stop
