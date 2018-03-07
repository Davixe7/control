@extends('layouts.master')
@section('main')
  <div class="row">
    <div class="col-sm-12 dotted">
      <h1>Registrar campaña</h1>
      <form method="POST" action="{{ action('CampaignController@postCreate') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </form>
    </div>
  </div>
@endsection