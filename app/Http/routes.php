<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware'=>'auth'], function(){

  Route::get('voters/', 'VoterController@getIndex');

  Route::group(['middleware'=>'roles', 'roles'=>['admin']], function(){
    Route::get('voters/export', 'VoterController@getExport')->name('voters.export');
  });
  
  Route::group(['middleware'=>'roles', 'roles'=>['admin', 'leader_master']], function(){
    Route::get('voters/view/{id}', 'VoterController@getView');
    Route::get('voters/create', 'VoterController@getCreate');
    Route::post('voters/create', 'VoterController@postCreate');
    Route::get('voters/edit/{id}', 'VoterController@getEdit');
    Route::put('voters/edit/', 'VoterController@putEdit');
    Route::delete('voters', 'VoterController@deleteDelete');
    Route::get('reports', 'UserController@getExport');
  });

  Route::group(['middleware'=>'roles', 'roles'=>['leader_master']], function(){

    Route::get('leaders', 'LeaderController@getIndex');
    Route::get('leaders/view/{id}', 'LeaderController@getView');
    Route::get('leaders/create', 'LeaderController@getCreate');
    Route::post('leaders/create', 'LeaderController@postCreate');
    Route::get('leaders/edit/{id}', 'LeaderController@getEdit');
    Route::put('leaders/edit/', 'LeaderController@putEdit');
    Route::delete('leaders', 'LeaderController@deleteDelete');

  });

  Route::group(['middleware'=>'roles', 'roles'=>['admin', 'campaign']], function(){

    Route::get('users/', 'UserController@getIndex');
    Route::get('users/view/{id}', 'UserController@getView');
    Route::get('users/create', 'UserController@getCreate');
    Route::post('users/create', 'UserController@postCreate');
    Route::get('users/edit/{id}', 'UserController@getEdit');
    Route::put('users/edit', 'UserController@putEdit');
    Route::delete('users', 'UserController@deleteDelete');

    Route::get('centers/', 'CenterController@getIndex');
    Route::get('centers/view/{id}', 'CenterController@getView');
    Route::get('centers/create', 'CenterController@getCreate');
    Route::post('centers/create', 'CenterController@postCreate');
    Route::get('centers/edit/{id}', 'CenterController@getEdit');
    Route::put('centers/edit', 'CenterController@putEdit');
    Route::delete('centers', 'CenterController@deleteDelete');

  });

  Route::group(['middleware'=>'roles', 'roles'=>['table_member']], function(){
    Route::put('voters/checkin/{id}', 'VoterController@putCheckin');
    Route::put('voters/checkout/{id}', 'VoterController@putCheckout');
  });

});

Auth::routes();
Route::get('/', 'HomeController@index');
