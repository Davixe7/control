@extends('layouts.master')

@section('main')
  <div class="row">
    <div class="col-sm-12 dotted pt-2">
      <h1>Registrar lider</h1>
      <form method="POST" class="double-column-form" action="{{ action('LeaderController@postCreate') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
          <label for="tel">Teléfono</label>
          <input type="number" class="form-control" name="tel" id="tel" required>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary mt-4">Guardar</button>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      </form>
    </div>
  </div>
@endsection
