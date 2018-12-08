<?php

namespace App\Http\Controllers;

use App\Events\onAddTaskEvent;
use App\Mail\MailClass;
use App\Models\Todolist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Todolist $todolist,Request $request)
    {
//        $userName = Auth::user()->name ;
//        $userEmail = Auth::user()->email ;


        $this->validate($request, [
            'title' => 'required|unique:todolists|max:255',
            'content' => 'required',
        ]);
        $task = new Todolist($request->all());

        $user = User::find(Auth::user()->id);
        $user->Todolists()->save($task);

        Event::fire(new onAddTaskEvent($task,$user));

//      отправка почты вариант №1
//        Mail::send (['text' => 'mails.mail'],['name'=> 'list'],function ($message){
//            $message -> to('alexmix75@gmail.com','test1')->subject('test mail');
//            $message -> from('alexmix75@gmail.com','list');
//        });
        //      отправка почты вариант №2
//        Mail::to($userEmail)->send(new MailClass($userName,$userEmail));


        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Todolist::find($id);

        return view('edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $this->validate($request, [
//            'title' => 'required|unique:todolists|max:255',
//            'content' => 'required',
//        ]);
        $user = User::find(Auth::user()->id);
        $user ->Todolists()->where('id',$id)->update(['title'=>$request->title,
                                                             'content'=>$request->get('content')]);
//        $user ->Todolists()->where('id',$id)->update((array) $request->all());
        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(Auth::user()->id);

        $user ->Todolists()->where('id',$id)->delete();
        return redirect()->route('home');
    }
}
