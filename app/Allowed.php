<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowed extends Model
{
    protected $fillable =[
        'fpolicy_no',
        'desc',
        'created_at',
        'updated_at',
    ];
    
    public function policies(){
        return $this->belongsTo('App\User','policy_no');
    }
}
