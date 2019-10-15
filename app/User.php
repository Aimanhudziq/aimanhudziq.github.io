<?php

namespace App;

//use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    public $timestamps = true;
    //public $user_type = null;

    protected $fillable = [
        'user_staff_id',
        'first_name',
        'last_name', 
        'username',
        'email', 
        'password', 
        'user_type', 
        'frole_code',
        'created_at',
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
        return $this->hasMany('App\BankAssignmentList','fuser_staff_id', 'user_staff_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notifications\UserResetPassword($token));
    }

}
