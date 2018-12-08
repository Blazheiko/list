@extends('layouts.app')

@section('content')

    @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    @else

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <img src="/uploads/avatars/{{ $user->photo }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>{{ $user->name }}'s Profile</h2>
                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="photo">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    @endif



@endsection