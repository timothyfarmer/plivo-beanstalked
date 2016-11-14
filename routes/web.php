<?php

use App\TextMessage;
use Illuminate\Support\Facades\Log;
use Pheanstalk\Pheanstalk;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/messages', 'TextMessageController@index');
//Route::get('/message/{message}', 'TextMessageController@show')->middleware('auth:web');
Route::post('/messages/{user}/create', 'TextMessageController@store');
Route::get('/users/{user}', 'HomeController@show');