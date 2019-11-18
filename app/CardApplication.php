<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardApplication extends Model
{
    protected $fillable =[
        'checked_by',
        'fstatus_code',
        'fuser_staff_id',
        'status_change_datetime',
        'created_at',
        'updated_at',
    ];
}
