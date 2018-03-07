<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function center(){
    return $this->belongsTo('App\Center');
  }

  public function leader(){
    return $this->belongsTo('App\Leader');
  }

  public function scopeSearch($query, $dni){
    return $query->where('voters.dni', 'like', "%$dni%");
  }

  public function scopeOrdered($query, $sort = 'id'){
    $order = ( !$order ) ? 'id' : $order;
    return $query->orderBy($sort, 'ASC');
  }

  public function scopeTable($query, $sort){

    $sort = (!$sort) ? 'voters.id' : $sort;

    return $query
    ->join('leaders', 'voters.leader_id', '=', 'leaders.id')
    ->join('users', 'voters.user_id', '=', 'users.id')
    ->orderBy($sort)
    ->select('voters.*', 'leaders.name as leader_name', 'users.name as user_name');
  }
  
  public function scopeXLS($query, $sort){

    $sort = (!$sort) ? 'voters.id' : $sort;

    return $query
    ->join('leaders', 'voters.leader_id', '=', 'leaders.id')
    ->join('users', 'voters.user_id', '=', 'users.id')
    ->join('centers', 'voters.center_id', '=', 'centers.id')
    ->orderBy($sort)
    ->select('users.name as LiderMaster', 'leaders.name as Lider', 'voters.name as nombre', 'voters.last_name as apellido', 'voters.dni as cedula', 'voters.dir as direccion', 'voters.tel as telefono', 'voters.email as email', 'centers.name as centro', 'voters.table as mesa');
  }

  public function scopeMember($query, $center_id){
    return $query->where('voters.center_id', $center_id);
  }

  public function getFullName(){
    return ($this->name . ' ' . $this->last_name);
  }

  public function hasCheckin(){
    return ( strtotime($this->checkin) > 0 );
  }

  public function hasCheckout(){
    return (strtotime($this->checkout) < 0 );
  }
}
