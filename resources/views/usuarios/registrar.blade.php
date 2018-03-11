@extends('layouts.master')
@section('main')
  <div class="row">
    <div class="col-sm-12 dotted pt-2">
      <h1>Registrar usuario</h1>
      <form method="POST" class="double-column-form" action="{{ url('users/create') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input type="text" class="form-control" name="last_name" id="last_name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="form-group">
          <label for="dni">Cédula</label>
          <input type="number" class="form-control" name="dni" id="dni" required>
        </div>
        <div class="form-group">
          <label for="tel">Teléfono</label>
          <input type="number" class="form-control" name="tel" id="tel" required>
        </div>
        <div class="form-group">
          <label for="dir">Dirección</label>
          <input type="text" class="form-control" name="dir" id="dir" required>
        </div>
        <div class="form-group">
          <label for="roles">Roles</label><br>
          @foreach($roles as $index=>$role)
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-radio-input {{ ( $role->name == 'leader_master' || $role->name == 'table_member') ? 'cp-child' : 'no-child' }}" type="radio" value="{{ $role->id }}" name="role" {{ ($index == 0) ? 'checked' : ''}}> {{ $role->title }}
            </label>
          </div>
          @endforeach
        </div>
        @if( Auth::User()->hasRole('admin') )
        <div class="form-group cp_field">
          <label for="user_id">Campaña</label>
          <select class="form-control" name="user_id" required>
            @foreach($cs as $c)
              <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
          </select>
        </div>
        @endif
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
