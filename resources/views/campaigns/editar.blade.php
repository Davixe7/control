@extends('layouts.master')

@section('main')
  <div class="row">
    <div class="col-sm-12 dotted">
      <h1>Editar campaña</h1>
      <form method="POST" action="{{ action('CampaignController@putEdit', ['id'=>$campaign->id]) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ $campaign->name }}" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
@endsection