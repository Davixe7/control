@extends('layouts.master')
@section('main')
<div class="row">
<div class="col-sm-12 dotted">
  <h1>Centro {{ $center->name }}</h1>
  <form>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $center->name }}" disabled>
    </div>
  </form>
</div>
</div>
@endsection