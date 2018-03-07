@extends('layouts.master')
@section('main')
<div class="row">
<div class="col-sm-12 dotted">
  <h1>Usuario {{ $user->id }}</h1>
  <form>
    <div class="form-group">
      <label for="id">ID</label>
      <input type="text" class="form-control" name="id" id="id" value="{{ $user->id }}" disabled>
    </div>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $user->getFullName() }}" disabled>
    </div>
    <div class="form-group">
      <label for="dni">DNI</label>
      <input type="text" class="form-control" name="dni" id="dni" value="{{ $user->dni }}" disabled>
    </div>
    <div class="form-group">
      <label for="tel">Teléfono</label>
      <input type="text" class="form-control" name="tel" id="tel" value="{{ $user->tel }}" disabled>
    </div>
    <div class="form-group">
      <label for="dir">Dirección</label>
      <input type="text" class="form-control" name="dir" id="dir" value="{{ $user->dir }}" disabled>
    </div>
  </form>
</div>
</div>
@endsection