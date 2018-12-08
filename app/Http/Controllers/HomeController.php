<?php

namespace App\Http\Controllers;

use App\User;
//use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id ;
        $user = User::find($id);
        $userList = $user -> Todolists;

        return view( 'home',['userList'=>$userList]);
    }
}
