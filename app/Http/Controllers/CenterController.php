<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use App\User;

use App\Http\Requests;

class CenterController extends Controller
{
  // Ve
  public function getIndex(){
    $centers = Center::all();
    return view('centers.index', ["centers"=>$centers]);
  }

  public function getView(Request $req){
    $center = Center::find($req->id);
    return view('centers.single', ['center'=>$center]);
  }

  // Crea
  public function getCreate(Request $req){
    $cs = ( $req->user()->hasRole('admin') ) ? User::campaigns()->get() : [];
    return view('centers.registrar', ['cs'=>$cs]);
  }

  public function postCreate(Request $req){
    $center = new Center();
    $center->name = $req->name;
    $center->save();

    $user_id = ( $req->user_id ) ? $req->user_id : $req->user()->id;

    $center->users()->attach( $user_id );

    return redirect('centers/');
  }

  // Edita
  public function getEdit(Request $req){
    $center = Center::find($req->id);
    return view('centers.editar', ['center'=>$center]);
  }

  public function putEdit(Request $req){
    $center = Center::find($req->id);
    $center->name = $req->name;
    $center->save();

    return redirect('centers/');
  }

  // Elimina
  public function deleteDelete(Request $req){
    $center = Center::find($req->id);
    $center->delete();
    return redirect('/centers');
  }
}
