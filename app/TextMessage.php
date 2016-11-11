<?php

namespace App;

use App\Jobs\SendText;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Plivo\RestAPI;

class TextMessage extends Model
{
	protected $user;

	function __construct()
	{
		$this->auth_id = env('PLIVO_AUTH_ID');
		$this->auth_token = env('PLIVO_AUTH_TOKEN');
	}

    public function store()
    {
    	dispatch(new SendText($this));
    }

    public function send()
    {
        $auth_token = env('PLIVO_AUTH_TOKEN');
        $auth_id = env('PLIVO_AUTH_ID');
    	$api = new RestAPI($auth_id, $auth_token);
        $user = User::get($this->user)->first();
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
