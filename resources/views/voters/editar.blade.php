@extends('layouts.master')

@section('main')
  <div class="row">
    <div class="col-sm-12 dotted pt-2">
      <h1>Editar votante</h1>
      <form method="POST" class="double-column-form" action=" {{ action('VoterController@putEdit', ['id'=>$voter->id]) }} ">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
          <label for="age">Edad</label>
          <input type="number" min="18" class="form-control" name="age" id="age" value="{{ $voter->age }}">
        </div>
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ $voter->name }}">
        </div>
        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $voter->last_name }}">
        </div>
        <div class="form-group">
          <label for="dni">Cédula</label>
          <input type="number" class="form-control" name="dni" id="dni" value="{{ $voter->dni }}">
        </div>
        <div class="form-group">
          <label for="tel">Teléfono</label>
          <input type="number" class="form-control" name="tel" id="tel" value="{{ $voter->tel }}">
        </div>
        <div class="form-group">
          <label for="dir">Dirección</label>
          <input type="text" class="form-control" name="dir" id="dir" value="{{ $voter->dir }}">
        </div>
        <div class="form-group">
          <label for="center_id">Centro de Votación</label>
          <select class="form-control" name="center_id" id="center_id">
            @foreach($centers as $center)
              <option value="{{ $center->id }}">{{$center->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="table">Mesa</label>
          <input type="number" max="10" min="1" class="form-control" name="table" id="table" value="{{ $voter->table }}">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
