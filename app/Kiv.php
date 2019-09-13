<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kiv extends Model
{
    protected $fillable = [

        'status_id',
        'approved_by',
        'status_change_datetime',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
