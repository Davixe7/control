<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Http\Requests;

class CampaignController extends Controller
{
  // Ve
  public function getIndex(){
    $campaigns = Campaign::all();
    return view('campaigns.index', ["campaigns"=>$campaigns]);
  }
  
  // Ve
  public function getView(Request $req){
    $campaign = Campaign::find($req->id);
    return view('campaigns.single', ["campaign"=>$campaign]);
  }
  
  // Crea
  public function getCreate(Request $req){
    return view('campaigns.registrar');
  }
  
  public function postCreate(Request $req){
    $campaign = new Campaign();
    $campaign->name = $req->name;
    $campaign->save();
    
    return redirect('campaigns/');
  }
  
  // Edita
  public function getEdit(Request $req){
    $campaign = Campaign::find($req->id);
    return view('campaigns.editar', ['campaign'=>$campaign]);
  }
  
  public function putEdit(Request $req){
    $campaign = Campaign::findOrFail($req->id);
    $campaign->name = $req->name;
    $campaign->save();
    
    return redirect('campaigns/');
  }
  
  // Elimina
  public function deleteDelete(Request $req){
    $campaign = Campaign::find($req->id);
    $campaign->delete();
    return redirect('/campaigns');
  }
}
