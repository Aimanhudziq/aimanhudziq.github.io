<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'bank_code', 
        'bank_name',
        'created_at',
        'updated_at',
    ];

    function client_details()
    {
        return $this->hasMany('App\ClientDetail','fbank_code', 'bank_code');
    }

}

