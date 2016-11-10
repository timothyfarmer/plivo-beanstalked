<?php

namespace App;

use App\Jobs\SendText;
use Illuminate\Database\Eloquent\Model;
use Plivo\RestAPI;

class TextMessage extends Model
{
	private $auth_id;
	private $auth_token;
	private $from_number;
	private $to_number;
	protected $user;

	function __construct(User $user)
	{
		$this->user = $user;
		$this->auth_id = env('PLIVO_AUTH_ID');
		$this->auth_token = env('PLIVO_AUTH_TOKEN');
		$this->to_number = $user->cell_number;
	}

    public function store(TextMessage $message)
    {

    	dispatch(new SendText($message));
    }

    public function send(TextMessage $message)
    {
    	// $api = new RestAPI($auth_id, $auth_token);

    	// $params = array(
    	// 	'src' => $message->to_number,
    	// 	'dst' => $message->from_number,

    	// );
    	Log::info('sending message to number ' . $message->to_number);
    }
}
