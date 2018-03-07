<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Center;
use App\Http\Requests;
use Excel;

class UserController extends Controller
{
  // Ve
  public function getIndex(Request $req){
    $users = ( $req->user()->hasRole('admin') ) ? User::all() : $req->user()->users;
    return view('usuarios.index', ["users"=>$users]);
  }

  // Ve
  public function getView(Request $req){
    $user = User::find($req->id);
    return view('usuarios.single', ["user"=>$user]);
  }

  // Crea
  public function getCreate(Request $req){
    $centers = ( $req->user()->hasRole('admin') ) ? Center::all() : $req->user()->centers;
    $roles = ( $req->user()->hasRole('admin') ) ? Role::all() : Role::whereIn('name', ['leader_master', 'table_member'])->get();
    return view('usuarios.registrar', ['centers'=>$centers, 'roles'=>$roles]);
  }

  public function postCreate(Request $req){
    $user = new User();
    $user->name = $req->name;
    $user->last_name = $req->last_name;
    $user->dir = $req->dir;
    $user->dni = $req->dni;
    $user->tel = $req->tel;
    $user->email = $req->email;
    $user->password = bcrypt( $req->password );
    $user->user_id = $req->user()->id;
    $user->save();
    $user->roles()->attach(Role::find($req->role));
    $user->centers()->attach( Center::find( $req->center_id ) );

    return redirect('users/');
  }

  // Edita
  public function getEdit(Request $req){
    $user = User::find($req->id);
    $centers = ( $req->user()->hasRole('admin') ) ? Center::all() : $req->user()->centers;
    $roles = ( $req->user()->hasRole('admin') ) ? Role::all() : Role::whereIn('name', ['leader_master', 'table_member'])->get();
    return view('usuarios.editar', ['user'=>$user, 'centers'=>$centers, 'roles'=>$roles]);
  }

  public function putEdit(Request $req){
    $user = User::findOrFail($req->id);
    $user->name = $req->name;
    $user->last_name = $req->last_name;
    $user->dir = $req->dir;
    $user->dni = $req->dni;
    $user->tel = $req->tel;
    $user->email = $req->email;
    $user->roles()->detach();
    $user->centers()->detach();
    $user->save();
    $user->roles()->attach(Role::find($req->role));
    $user->centers()->attach(Center::find($req->center_id));

    return redirect('users/');
  }

  // Elimina
  public function deleteDelete(Request $req){
    $user = User::find($req->id);
    $user->delete();
    return redirect('/users');
  }
  
  public function getExport(){
    $file = Excel::create('reporte', function($excel){
      $excel->setTitle('REPORTE');
      $excel->setDescription('Primer reporte. Reporte de prueba para el control de votantes a ser exportado a XLS');
      $excel->sheet('Hoja 1', function($sheet){
        $sheet->fromArray( User::all()->toArray() );
      });
    });
    
    $file->download('xls');
  }
}
