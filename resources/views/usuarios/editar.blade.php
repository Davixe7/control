@extends('layouts.master')
@section('main')
  <div class="row">
    <div class="col-sm-12 dotted pt-2">
      <h1>Editar usuario</h1>
      <form method="POST" class="double-column-form" action="{{ action('UserController@putEdit', ['id'=>$user->id]) }}">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
          <label for="dni">Cédula</label>
          <input type="number" class="form-control" name="dni" id="dni" value="{{ $user->dni }}" required>
        </div>
        <div class="form-group">
          <label for="tel">Teléfono</label>
          <input type="number" class="form-control" name="tel" id="tel" value="{{ $user->tel }}" required>
        </div>
        <div class="form-group">
          <label for="dir">Dirección</label>
          <input type="text" class="form-control" name="dir" id="dir" value="{{ $user->dir }}" required>
        </div>
        <div class="form-group">
          <label for="roles">Roles</label><br>
          @foreach($roles as $role)
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-radio-input" type="radio" id="inlineCheckbox1" value="{{ $role->id }}" name="role" {{ ($user->hasRole($role->name)) ? 'checked' : '' }}> {{ $role->title }}
              </label>
            </div>
          @endforeach
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
