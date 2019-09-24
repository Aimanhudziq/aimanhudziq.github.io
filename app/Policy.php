<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
  public $timestamps = true;
  
  protected $fillable= [
    'policy_name',
    'policy_source',
    'policy_regulation',
    'created_at',
    'updated_at',
  ]; 

  public function not_allowed()
  {
    return $this->hasMany('App\NotAllowed','fpolicy_no');
  }

  public function allowed()
  {
    return $this->hasMany('App\Allowed','fpolicy_no');
  }

}
