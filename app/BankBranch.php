<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankBranch extends Model
{
    function bank(){
        return $this->belongsTo('App\Bank', 'bank_code');
    }
}
