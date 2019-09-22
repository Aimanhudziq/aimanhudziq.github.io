<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $fillable = [
        'fuser_id',
        'status_id',
        'approved_by',
        'status_change_datetime',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
