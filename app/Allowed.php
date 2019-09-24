<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowed extends Model
{
    public function policy(){
        return $this->belongsTo('App\User','policy_no');
    }
}
