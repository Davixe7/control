@extends('layouts.master')
@section('main')
<div class="row">
  <div class="col-sm-12 dotted">
    <h1>Campaña {{ $campaign->id }}</h1>
    <form>
      <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" id="id" value="{{ $campaign->id }}" disabled>
      </div>
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $campaign->name }}" disabled>
      </div>
    </form>
  </div>
</div>
@endsection