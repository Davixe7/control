<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
  public function users(){
    return $this->belongsToMany('App\User', 'user_center', 'center_id', 'user_id');
  }
}