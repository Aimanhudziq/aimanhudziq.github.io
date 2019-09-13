<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
  protected $fillable= [
    'policy_no',
    'policy_name',
    'policy_source',
    'policy_regulation',
    'policy_allowed',
    'policy_not_allowed',
    'created_at',
    'updated_at',
  ]; 


}
