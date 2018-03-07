@extends('layouts.master')

@section('main')
<div class="row">
  <div class="col-sm-6 d-flex align-items-center">
    <div class="">
      <h1>Todos los votantes</h1>
      <p>Ingresa un numero de cédula</p>
    </div>
  </div>
  <div class="col-sm-6 d-flex align-items-center">
    <form method="GET" action="{{action('VoterController@getIndex')}}" style="width: 100%;">
      <div class="form-group mt-2 mb-2">
        <label class="mb-0" for="dni">Cédula</label>
        <div class="input-group input-group-search">
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
@if( count( $voters ) )
<table class="table table-striped">
  <thead>
    <th><a href="{{ action('VoterController@getIndex', ['sort'=>'leaders.name']) }}">Lider</a></th>
    <th><a href="{{ action('VoterController@getIndex', ['sort'=>'name']) }}">Nombre</a></th>
    <th><a href="{{ action('VoterController@getIndex', ['sort'=>'dni']) }}">Cédula</a></th>
    <th><a href="{{ action('VoterController@getIndex', ['sort'=>'center_id']) }}">Centro</a></th>
    <th><a href="{{ action('VoterController@getIndex', ['sort'=>'table']) }}">Mesa</a></th>
    <th>Opciones</th>
  </thead>
  @foreach($voters as $voter)
    <tr class="{{ ($voter->isleader) ? 'leader-row' : '' }}">
      <td>{{ $voter->leader->name }}</td>
      <td>{{ $voter->name . ' ' . $voter->last_name }}</td>
      <td>{{ $voter->dni }}</td>
      <td>{{ $voter->center->name }}</td>
      <td>{{ $voter->table }}</td>
      <td>
        <div class="btn-group">
          <a href="{{ url('voters/view/' . $voter->id) }}" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
          <form method="POST" action="{{ action('VoterController@deleteDelete', ['id'=>$voter->id]) }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i></button>
          </form>
          <a href="{{ url('voters/edit/' . $voter->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
        </div>
      </td>
    </tr>
  @endforeach
</table>
@else
  <div class="alert alert-info">No hay votantes asociados con el usuario actual</div>
@endif
@if( Auth::user()->hasRole('admin') && $sort )
  <div class="alert alert-success">
    <a class="text-success d-flex flex-row align-items-center" href="{{ route('voters.export') }}?sort={{ $sort }}">
      <i class="fa fa-file-excel-o fa-2x"></i> 
      <span class="ml-3">Exportar esta consulta</span>
      <i class="fa fa-download fa-2x ml-auto"></i>
    </a>
  </div>
@endif
@endsection
