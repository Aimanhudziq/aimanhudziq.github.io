<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAssignmentList extends Model
{
    protected $fillable = [
        'fuser_staff_id', 
        'fbank_code',
        'created_at',
        'updated_at',
    ];

    public function users(){
        return $this->belongsTo('App\User', 'user_staff_id');
    }
}
