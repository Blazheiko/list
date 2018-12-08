<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile',            ['as' => 'profile',   'uses' => 'UserController@profile']);
Route::post('profile',            ['as' => 'profile.update',  'uses' =>'UserController@update_avatar']);

Route::get('/task/create',        ['as' => 'task.create',  'uses' => 'TodolistController@create']);
Route::post('/task',              ['as' => 'task.store',   'uses' => 'TodolistController@store']);
Route::get('/task/{task}',        ['as' => 'task.show',    'uses' => 'TodolistController@show']);
Route::get('/task/{task}/edit',   ['as' => 'task.edit',    'uses' => 'TodolistController@edit']);
Route::post('/task/{task}',       ['as' => 'task.update',  'uses' => 'TodolistController@update']);
Route::get('/task/{task}/delete', ['as' => 'task.destroy', 'uses' => 'TodolistController@destroy']);
Route::get('send',                ['as' => 'send',         'uses' => 'mailController@sendCreate']);


Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {
    Route::get('dashboard', function() { echo "HELLO WORLD"; } );
});