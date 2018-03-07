@extends('layouts.master')

@section('main')
<div class="row">
  <div class="col-sm-6">
    <h1>Listado de lideres</h1>
  </div>
  <div class="col-sm-6 d-flex" style="flex-flow: column; justify-content: center;">
    <form method="GET" action="{{action('LeaderController@getIndex')}}">
      <div class="form-group mb-0">
        <div class="input-group">
          <input type="text" class="form-control" name="dni" id="search" placeholder="Ej: 22653158">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@if( count( $leaders ) )
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Opciones</th>
  </thead>
  @foreach($leaders as $leader)
    <tr>
      <td>{{ $leader->id }}</td>
      <td>{{ $leader->name }}</td>
      <td>{{ $leader->email }}</td>
      <td>
        <div class="btn-group">
          <a href="{{ url('leaders/view/' . $leader->id) }}" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
          <form method="POST" action="{{ action('LeaderController@deleteDelete', ['id'=>$leader->id]) }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i></button>
          </form>
          <a href="{{ url('leaders/edit/' . $leader->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
        </div>
      </td>
    </tr>
  @endforeach
</table>
@else
  <div class="alert alert-info">No hay lideres asociados con el usuario actual</div>
@endif
@endsection
