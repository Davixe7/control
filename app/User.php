<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
      return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    public function voters(){
      return $this->hasMany('App\Voter');
    }

    public function leaders(){
      return $this->hasMany('App\Leader');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function users(){
      return $this->hasMany('App\User');
    }

    public function centers(){
      return $this->belongsToMany('App\Center', 'user_center', 'user_id', 'center_id');
    }

    public function hasAnyRole($roles){
      if( is_array($roles) ){
        foreach($roles as $role){
          if( $this->hasRole($role) ) return true;
        }
        return false;
      }
      elseif( $this->hasRole($role) ){
        return true;
      }
      return false;
    }

    public function hasRole( $role ){
      if( !empty( $role ) ){
        foreach( $this->roles as $rol ){
          if( $rol->name == $role ){
            return true;
          }
        }
        return false;
      }
      return false;
    }

    public function getFullName(){
      return $this->name . ' ' . $this->last_name;
    }
}
