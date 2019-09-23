<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    public $timestamps = true;
    
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name', 
        'username',
        'password', 
        'email', 
        'user_type', 
        'created_at',
        'updated_at',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //1 user has 1 role
    public function role(){
        return $this->belongsTo('App\Role', 'role_code');
    }

    // 1 users hv many banks but 1 bank own by 1 user
    public function bank_assignment_list(){
        return $this->belongsToMany('App\BankAssignmentList');
    }

}
