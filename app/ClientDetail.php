<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    public function bank()
    {
        return $this->belongsTo('App\Bank','bank_code');
    }

    public function track_record()
    {
        return $this->hasMany('App\TrackRecord','freference_no','reference_no');
    }
}
