<?php

namespace App;

use App\Jobs\SendText;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Plivo\RestAPI;

class TextMessage extends Model
{

    

	function __construct()
	{
		
	}

    public function store()
    {
        DB::table('text_messages')->insert([
            'user_id' => $this->user_id,
            'message' => $this->message,
            'to_number' => $this->to_number,
            'from_number' => Auth::user()->cell_number,
        ]);
    	dispatch(new SendText($this));
        Log::info('sending message to number ' . $this->to_number . " with message = " . $this->message);
    }

    public function send(TextMessage $message)
    {
        $auth_token = env('PLIVO_AUTH_TOKEN');
        $auth_id = env('PLIVO_AUTH_ID');
    	//$api = new RestAPI($auth_id, $auth_token);
        $user = $this->user;
        //var_dump($user);
    	// $params = array(
    	// 	'src' => $to_number,
    	// 	'dst' => $message->from_number,

    	// );
    	Log::info('sending message to number ' . $user->cell_number);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
