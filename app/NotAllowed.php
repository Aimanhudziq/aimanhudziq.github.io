<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotAllowed extends Model
{
    public function policy(){
        return $this->belongsTo('App\Policy','policy_no');
    }
}
