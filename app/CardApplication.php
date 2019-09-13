<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardApplication extends Model
{
    protected $fillable =[
        'fuser_id',
        'card_id',
        'approved_by',
        'status_id',
        'reference',
        'email',
        'phone_number',
        'ic_no',
        'adress',
        'image_url',
        'status_change_datetime',
        'created_at',
        'updated_at',
    ];
}
