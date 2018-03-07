@extends('layouts.master')
@section('main')
  <h1>Reportes</h1>
  <h4>Configura los parametros para el reporte</h4>
  <form action="" method="">
    <div class="form-group">
      <label for="">Lider máster</label>
      <select class="form-group" name="" id="" value="">
        @foreach( $users as $user )
          <option value="">{{ $user->getFullName() }}</option>
        @endforeach
      </select>
    </div>
  </form>
@endsection