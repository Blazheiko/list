<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container" xmlns:v-bind="http://www.w3.org/1999/xhtml">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div  ref='messageDisplay' class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div  class="panel-footer" >
                        <chat-form
                                v-on:messagesent="addMessage"
                                {{--v-on:photosend="addPhoto"--}}
                                :user=" {{Auth::user()}} "
                        ></chat-form>

                    </div>

                    <span>Select New Photo</span>
                    <input ref="photo" type="file" class="form-control" name="photo" @change="update">

                    {{--<div class="panel-footer">--}}
                        {{--<new-photo :user=" {{Auth::user()}} "--}}


                        {{--></new-photo>--}}

                    {{--</div>--}}

                </div>
            </div>
        </div>
    </div>
@endsection