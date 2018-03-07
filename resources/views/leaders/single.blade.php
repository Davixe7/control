@extends('layouts.master')
@section('main')
<div class="row">
<div class="col-sm-12 dotted">
  <h1>Lider {{ $leader->id }}</h1>
  <form class="double-column-form">
    <div class="form-group">
      <label for="id">ID</label>
      <input type="text" class="form-control" name="id" id="id" value="{{ $leader->id }}" disabled>
    </div>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $leader->name . ' ' . $leader->last_name }}" disabled>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" value="{{ $leader->email }}" disabled>
    </div>
    <div class="form-group">
      <label for="tel">Teléfono</label>
      <input type="text" class="form-control" name="tel" id="tel" value="{{ $leader->tel }}" disabled>
    </div>
    @if( $leader->voter )
      <div class="form-group">
        <label for="dir">Lider</label>
        <input type="text" class="form-control" name="dir" id="dir" value="{{ $leader->voter->getFullName() }}" disabled>
    </div>
    @endif
  </form>
</div>
</div>
@endsection
