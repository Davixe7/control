<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Voter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
      $usuarios = ( $req->user()->hasRole('admin') ) ? User::all() : $req->user()->users;
      $voters = $req->user()->voters;
      
      if( $req->user()->hasAnyRole(['admin', 'campaign']) ){
        return view('usuarios.index', ["users"=>$usuarios]);
      }
      elseif($req->user()->hasRole('leader_master')){
        return view('voters.index', ["voters"=>$voters]);
      }
      elseif($req->user()->hasRole('table_member')){
        $voters = Voter::whereIn('center_id', $req->user()->centers()->pluck('center_id'))->get();
        return view('members.index', ["voters"=>$voters]);
      }
    }
}
