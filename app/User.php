<?php

namespace App;

use App\TextMessage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cell_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user can have many text messages
     * @return void
     */
    public function textMessages()
    {
        return $this->hasMany(TextMessage::class);
    }

    public function cell_number(){
        return $this->cell_number;
    }
}
