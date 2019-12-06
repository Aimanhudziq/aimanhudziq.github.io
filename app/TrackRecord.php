<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackRecord extends Model
{
    public $timestamps = true;
    
    public function client_detail()
    {
        return $this->belongsTo('App\ClientDetail', 'reference_no');
    }
}
