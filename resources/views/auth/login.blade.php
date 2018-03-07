@extends('layouts.master')
@section('main')
<div class="row main">
  <div class="col-sm-4 offset-sm-4 dotted form-wrap">
    <h1>Ingresa ahora</h1>
    <form method="POST" action="{{ url('/login') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>
        </div>
        <div class="col-sm-6">
          <a href="{{ url('password/reset') }}">¿Olvidaste tu contraseña?</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection