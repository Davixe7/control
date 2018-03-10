@extends('layouts.master')
@section('main')
<div class="col-sm-12 dotted">
  <h1>Registrar centro</h1>
  @if( Auth::User()->hasRole('campaign') || ( Auth::User()->hasRole('admin') && $cs->count() ) )
  <form method="POST" action="{{ action('CenterController@postCreate') }}">
    {{csrf_field()}}
    @if( count( $cs ) )
    <div class="form-group">
      <label for="user_id">Campaña</label>
      <select class="form-control" name="user_id" required>
        @foreach($cs as $c)
          <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
      </select>
    </div>
    @endif
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
  @else
    <div class="alert alert-info">Por favor registra primero una campaña</div>
  @endif
</div>
@endsection
