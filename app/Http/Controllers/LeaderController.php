<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leader;
use App\User;
use App\Http\Requests;

class LeaderController extends Controller
{
    // Ve
  public function getIndex(Request $req){
    $leaders = Leader::where('user_id', $req->user()->id)->get();
    return view('leaders.index', ['leaders'=>$leaders]);
  }

    // Ve
  public function getView(Request $req){
    $leader = Leader::find($req->id);
    return view('leaders.single', ["leader"=>$leader]);
  }

  // Crea
  public function getCreate(Request $req){
    $lds = ( $req->user()->hasRole('admin') ) ? User::leadermasters()->get() : [];
    return view('leaders.registrar', ['lds'=>$lds]);
  }

  public function postCreate(Request $req){
    $leader = new Leader();
    $leader->name = $req->name;
    $leader->tel = $req->tel;
    $leader->email = $req->email;
    $leader->user_id = $req->user_id;
    $leader->save();

    return redirect('leaders/');
  }

  // Edita
  public function getEdit(Request $req){
    $leader = Leader::find($req->id);
    return view('leaders.editar', ["leader"=>$leader]);
  }

  public function putEdit(Request $req){
    $leader = Leader::findOrFail($req->id);
    $leader->name = $req->name;
    $leader->tel = $req->tel;
    $leader->email = $req->email;
    $leader->user_id = $req->user_id;
    $leader->save();

    return redirect('leaders/');
  }

  // Elimina
  public function deleteDelete(Request $req){
    $leader = Leader::find($req->id);
    $leader->delete();
    return redirect('/leaders');
  }
}
