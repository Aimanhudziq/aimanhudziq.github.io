<?php

namespace App;
use App\NotAllowed;
use App\Policy;
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

  public function not_alloweds()
  {
    return $this->hasMany('App\NotAllowed','fpolicy_no','policy_no');
  }

  public function alloweds()
  {
    return $this->hasMany('App\Allowed','fpolicy_no', 'policy_no');
  }

}
