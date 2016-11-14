<?php

namespace App\Http\Controllers;

use App\TextMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TextMessageController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index(){
		$user = Auth::user();
		$messages = TextMessage::where('user_id',$user->id)->get();
		return view('messages.index', compact('messages'));
	}

	public function store(Request $request){
		$user = Auth::user();
		$message = new TextMessage;
		$message->user_id = $user->id;
		$message->message = $request->message;
		$message->to_number = $user->cell_number;
		$message->store();
		session()->flash('notif', 'Message Sent!');
		return redirect()->back();

	}
}
