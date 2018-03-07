@extends('layouts.master')
@section('main')
<div class="row">
<div class="col-sm-12 dotted">
  <h1>Votante {{ $voter->id }}</h1>
  <form class="double-column-form">
    <div class="form-group">
      <label for="id">ID</label>
      <input type="text" class="form-control" name="id" id="id" value="{{ $voter->id }}" disabled>
    </div>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $voter->name . ' ' . $voter->last_name }}" disabled>
    </div>
    <div class="form-group">
      <label for="age">Edad</label>
      <input type="text" class="form-control" name="age" id="age" value="{{ $voter->age }}" disabled>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" value="{{ $voter->email }}" disabled>
    </div>
    <div class="form-group">
      <label for="dni">DNI</label>
      <input type="text" class="form-control" name="dni" id="dni" value="{{ $voter->dni }}" disabled>
    </div>
    <div class="form-group">
      <label for="tel">Teléfono</label>
      <input type="text" class="form-control" name="tel" id="tel" value="{{ $voter->tel }}" disabled>
    </div>
    <div class="form-group">
      <label for="dir">Dirección</label>
      <input type="text" class="form-control" name="dir" id="dir" value="{{ $voter->dir }}" disabled>
    </div>
    <div class="form-group">
      <label for="table">Centro</label>
      <input type="text" class="form-control" name="center" id="center" value="{{ $voter->center->name }}" disabled>
    </div>
    <div class="form-group">
      <label for="center">Mesa</label>
      <input type="text" class="form-control" name="table" id="table" value="{{ $voter->table }}" disabled>
    </div>
    @if( $voter->voter )
      <div class="form-group">
        <label for="dir">Lider</label>
        <input type="text" class="form-control" name="dir" id="dir" value="{{ $voter->voter->getFullName() }}" disabled>
    </div>
    @endif
  </form>
</div>
</div>
@endsection