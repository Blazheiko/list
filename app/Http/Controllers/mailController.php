<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail ;
class mailController extends Controller
{
    public function sendCreate ()
    {
        Mail::send (['text' => 'mail'],['name'=> 'list'],function ($message){
            $message -> to('alexmix75@gmail.com','test1')->subject('test mail');
            $message -> from('alexmix75@gmail.com','list');
        });
        return redirect()->route('home');
    }

}
