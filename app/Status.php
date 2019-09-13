<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'status_id',
        'status_name',
        'created_at',
        'updated_at',
    ];
}
