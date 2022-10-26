@extends('layouts.web')

@section('content')
    <section>
        <div class="card">
            <div class="card-header">Edit Profile</div>
            <div class="card-body">
                <form action="{{ route('user.update', $user) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}">
                    <span style="">@error('name'){{ $message }} @enderror</span>
                    <label>E-mail</label>
                    <input type="text" class="form-control" name="email" value="{{old('email', $user->email)}}">
                    <span style="">@error('email'){{ $message }} @enderror</span>
                    <a href="{{url('password.reset')}}">Reset password</a><br>
                    <button type="submit" name="update" value="Update" class="btn btn-primary btn-sm">Update</button>
                    </a>
                </form>
            </div>
        </div>
        </div>
    </section>

@endsection
