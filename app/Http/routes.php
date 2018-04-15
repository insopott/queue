<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(Auth::guest())
        return redirect()->route('login.index');
    else
        return redirect()->route('counter.index');
});

//Route::auth();

//Route::get('/home', 'HomeController@index');
Route::resource('/login','LoginController');
Route::get('/logout','LoginController@logout');
Route::resource("/register",'RegisterController');
Route::resource("/counter",'CounterController');
Route::resource("/queue",'QueueController');
Route::resource("/display",'DisplayController');
Route::get('/display2',"DisplayController@dis");
Route::post('/reset',array(
         'as'=>'reset',
         'uses'=>"CounterController@reset",

));