<?php

use App\TextMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
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

Route::get('/message', function () {
	//$message = new TextMessage;
	$message = App\TextMessage::find(1);
	$message->store();
	Session::flash('notif','Message sent');
	return redirect('/');
});

Route::get('/', function () {
	return view('welcome');
});
