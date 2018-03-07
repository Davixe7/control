@extends('layouts.master')
@section('main')
<div class="col-sm-12 dotted">
  <h1>Editar centro</h1>
  <form method="POST" action="{{ action('CenterController@putEdit') }}">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $center->name }}" required>
    </div>
    <input type="hidden" name="id" value="{{ $center->id }}">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
</div>
@endsection