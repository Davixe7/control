@extends('layouts.master')
@section('main')
<div class="col-sm-12 dotted">
  <h1>Registrar centro</h1>
  <form method="POST" action="{{ action('CenterController@postCreate') }}">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
</div>
@endsection