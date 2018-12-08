@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> List Task </div>


                    {{--<form action="/post/{{ $list->id}}/create"><button>Create</button> </form>--}}



                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{--{{ session('status') }}--}}

                        </div>
                    @endif

                    {{--You are logged in!--}}
                        {{--{{'К этому пользователю относятся  '. count($userList) '  записи'}}--}}
                        @foreach($userList as $list)
                            <article>
                                <h2> {{'ID - '. $list->id}}</h2>
                                <p>
                                    {{'title - '.$list->title}}
                                </p>
                                <p>
                                    {{'content - '.$list->content}}
                                </p>
                                <p>
                                    {{'Создан' }}
                                    {{$list->created_at}}
                                </p>
                                <p>
                                    {{'Обновлен'}}
                                    {{$list->updated_at}}
                                </p>

                            </article>

                            <div style="float: left; margin-right: 3px">
                                <form action="/task/{{ $list->id}}/edit"><button>Edit</button> </form>

                            </div>

                            <form action="/task/{{ $list->id}}/delete"><button>Delete</button></form>

                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{

@endsection
