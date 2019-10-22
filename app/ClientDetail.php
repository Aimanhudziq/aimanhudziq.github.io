<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    function bank()
    {
        return $this->belongsTo('App\Bank','bank_code');
    }
}
