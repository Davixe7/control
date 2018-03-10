@extends('layouts.master')

@section('main')
  <div class="row">
    <div class="col-sm-12 dotted pt-2">
      <h1>Registrar lider</h1>
      @if( Auth::User()->hasRole('leader_master') || ( Auth::User()->hasRole('admin') && count( $lds ) ) )
      <form method="POST" class="double-column-form" action="{{ action('LeaderController@postCreate') }}">
        {{ csrf_field() }}
        @if( count( $lds ) )
        <div class="form-group">
          <label for="user_id">Lider máster</label>
          <select class="form-control" name="user_id" required>
            @foreach($lds as $l)
              <option value="{{ $l->id }}">{{ $l->name }}</option>
            @endforeach
          </select>
        </div>
        @endif
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
      @endif
    </div>
  </div>
@endsection
