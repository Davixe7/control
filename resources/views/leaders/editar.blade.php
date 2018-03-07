@extends('layouts.master')

@section('main')
  <div class="row">
    <div class="col-sm-12 dotted pt-2">
      <h1>Editar lider</h1>
      <form method="POST" class="double-column-form" action=" {{ action('LeaderController@putEdit', ['id'=>$leader->id]) }} ">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ $leader->name }}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" value="{{ $leader->email }}">
        </div>
        <div class="form-group">
          <label for="tel">Teléfono</label>
          <input type="number" class="form-control" name="tel" id="tel" value="{{ $leader->tel }}">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
