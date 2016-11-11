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
Route::get('/message', function () {
	//$message = new TextMessage;
	$message = App\TextMessage::find(1);
	$message->store();
	session()->flash('notif','Message sent');
	return redirect('/home');
})->middleware('auth:web');