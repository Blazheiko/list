@extends('layouts.app')

@section('content')

    @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    @else
        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>


            </div>

        @endif

        <h1>Create</h1>
        {{ Form::open (['route'=> 'task.store']) }}
        @include('_form')
        {{ Form::close() }}

    @endif


@stop
