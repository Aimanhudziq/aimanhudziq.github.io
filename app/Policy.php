<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
  public $timestamps = true;
  
  protected $fillable= [
    'policy_no',
    'policy_name',
    'policy_source',
    'policy_regulation',
    'created_at',
    'updated_at',
  ]; 


}
