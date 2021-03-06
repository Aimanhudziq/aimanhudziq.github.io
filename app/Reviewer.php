<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $fillable = [
        'fuser_staff_id',
        'status_code',
        'approved_by',
        'status_change_datetime',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
