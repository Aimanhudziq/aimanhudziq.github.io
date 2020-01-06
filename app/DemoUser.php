<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DemoUser extends Authenticatable
{
    protected $table="demo_users";
    protected $fillable=[
        'username',
        'email', 
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}