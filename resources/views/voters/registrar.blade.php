@extends('layouts.master')

@section('main')
  <div class="row">
    <div class="col-sm-12 dotted pt-2">
      <h1>Registrar votante</h1>
      <form action="" method="POST" class="double-column-form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="age">Edad</label>
          <input type="number" min="18" class="form-control" name="age" id="age" required>
        </div>
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
          <label for="center">Centro</label>
          <select class="form-control" name="center_id" id="center_id" required>
            @foreach($centers as $center)
              <option value="{{$center->id}}">{{ $center->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="table">Mesa</label>
          <input type="number" max="10" min="1" class="form-control" name="table" id="table" required>
        </div>
        <div class="form-group">
          <label for="leader">Lider</label>
          <select class="form-control" name="leader_id" id="leader_id" required>
            @foreach($leaders as $leader)
              <option value="{{$leader->id}}">{{ $leader->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary mt-4">Guardar</button>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      </form>
    </div>
  </div>
@endsection
