<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function voters(){
    return $this->hasMany('App\Voter');
  }
}
