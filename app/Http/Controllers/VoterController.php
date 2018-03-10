<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Voter;
use App\Center;
use App\User;
use Carbon\Carbon;
use Excel;
use App\Http\Requests;

class VoterController extends Controller
{
  // Index
  public function getIndex(Request $req){
    if( $req->user()->hasRole('admin') ){
      $voters = Voter::search($req->dni)->table($req->sort)->get();
    }elseif( $req->user()->hasRole('table_member') ){
      $center_id = $req->user()->centers->first()->id;
      $voters = Voter::search($req->dni)->member($center_id)->table($req->sort)->get();
      return view('members.index')->with('voters', $voters);
    }else{
      $voters = Voter::search($req->dni)->table($req->sort)->get();
    }
    return view('voters.index', ['voters'=>$voters, 'sort'=>$req->sort]);
  }

    // Ve
  public function getView(Request $req){
    $voter = Voter::find($req->id);
    return view('voters.single', ["voter"=>$voter]);
  }

  // Crea
  public function getCreate(Request $req){
    $leaders = $req->user()->leaders();
    $centers = $req->user()->user->centers;
    return view('voters.registrar', ['leaders'=>$leaders, 'centers'=>$centers]);
  }

  public function postCreate(Request $req){
    $voter = new Voter();
    $voter->age = $req->age;
    $voter->name = $req->name;
    $voter->last_name = $req->last_name;
    $voter->dir = $req->dir;
    $voter->dni = $req->dni;
    $voter->tel = $req->tel;
    $voter->email = $req->email;
    $voter->table = $req->table;
    $voter->user_id = $req->user_id;
    $voter->center_id = $req->center_id;
    $voter->leader_id = $req->leader_id;
    $voter->save();

    return redirect('voters/');
  }

  // Edita
  public function getEdit(Request $req){
    $voter = Voter::find($req->id);
    $centers = Center::all();
    return view('voters.editar', ['voter'=>$voter, 'centers'=>$centers]);
  }

  public function putEdit(Request $req){
    $voter = Voter::findOrFail($req->id);
    $voter->name = $req->name;
    $voter->last_name = $req->last_name;
    $voter->dir = $req->dir;
    $voter->dni = $req->dni;
    $voter->tel = $req->tel;
    $voter->email = $req->email;
    $voter->center_id = $req->center_id;
    $voter->save();

    return redirect('voters/');
  }

  public function putCheckin(Request $req){
    $time = Carbon::now();
    $voter = Voter::findOrFail($req->id);
    $voter->checkin = $time->toDateTimeString();
    $voter->save();

    return redirect(url('/'));
  }

  public function putCheckout(Request $req){
    $time = Carbon::now();
    $voter = Voter::findOrFail($req->id);
    $voter->checkout = $time->toDateTimeString();
    $voter->voted = 1;
    $voter->save();

    return redirect(url('/'));
  }

  // Elimina
  public function deleteDelete(Request $req){
    $voter = Voter::find($req->id);
    $voter->delete();
    return redirect('/voters');
  }

  public function getExport(Request $req){

    $this->votantes = Voter::XLS($req->sort)->get();

    if( $this->votantes->count() ){
      Excel::create('reporte'.Carbon::now(), function($excel){
        $excel->setTitle("Todos los votantes");
        $excel->setDescription("Reporte de votantes " . Carbon::now());

        $excel->sheet('Hoja 1', function($sheet){
          $sheet->fromArray( $this->votantes );
        });
      })->download('xls');

    }
  }
}
