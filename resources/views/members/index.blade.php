@extends('layouts.master')
@section('main')
  <div class="row">
    <div class="col-sm-6 d-flex align-items-center">
      <div class="">
        <h1>Control de votantes</h1>
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
  <div class="row">
    <div class="col-12">
      @if( count( $voters ) )
        <table class="table table-striped">
          <thead>
            <th><a href="{{ action('VoterController@getIndex', ['sort'=>'leaders.name']) }}">Lider</a></th>
            <th><a href="{{ action('VoterController@getIndex', ['sort'=>'users.name']) }}">Lider master</a></th>
            <th><a href="{{ action('VoterController@getIndex', ['sort'=>'voters.name']) }}">Nombre y Apellido</a></th>
            <th><a href="{{ action('VoterController@getIndex', ['sort'=>'voters.dni']) }}">Cédula</a></th>
            <th><a href="{{ action('VoterController@getIndex', ['sort'=>'centers.name']) }}">Centro de votación</a></th>
            <th><a href="{{ action('VoterController@getIndex', ['sort'=>'voters.table']) }}">Mesa</a></th>
            <th class="text-right">Opciones</th>
          </thead>
          <tbody>
            @foreach($voters as $voter)
              <tr>
                <td>{{ $voter->leader_name }}</td>
                <td>{{ $voter->user_name }}</td>
                <td>{{ $voter->name . ' ' . $voter->last_name }}</td>
                <td>{{ $voter->dni }}</td>
                <td>{{ $voter->center->name }}</td>
                <td>{{ $voter->table }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    @if(!$voter->voted)
                      <form method="POST" action="{{ action('VoterController@putCheckin', ['id'=>$voter->id ]) }}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="id" id="voter_id" value="{{$voter->id}}" >
                        <button type="submit" class="btn btn-link" {{ ( $voter->hasCheckin() ) ? 'disabled' : '' }}>Checkin</button>
                      </form>
                      <form method="POST" action="{{ action('VoterController@putCheckout', ['id'=>$voter->id ]) }}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="id" id="voter_id" value="{{$voter->id}}">
                        <button type="submit" class="btn btn-link" {{ ( $voter->hasCheckin() ) ? '' : 'disabled' }}>Checkout</button>
                      </form>
                    @else
                      <span class="text-success p-2">Votó</span>
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach()
          </tbody>
        </table>
      @else
        <div class="alert alert-info">No hay votantes asociados con el usuario actual o registros que coincidan con la busqueda</div>
      @endif
    </div>
  </div>
@endsection
