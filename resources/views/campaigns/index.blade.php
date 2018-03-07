@extends('layouts.master')
@section('main')
  <h1>Todas las campañas</h1>
  @if( count( $campaigns ) )
  <table class="table table-striped table-campaigns">
    <thead>
      <th>ID</th>
      <th>Nombre</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      @foreach($campaigns as $campaign)
        <tr>
          <td>{{ $campaign->id }}</td>
          <td>{{ $campaign->name }}</td>
          <td>
            <div class="btn-group">
              <a href="{{ url('campaigns/view/' . $campaign->id) }}" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <form method="POST" action="{{ action('CampaignController@deleteDelete', ['id'=>$campaign->id]) }}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i></button>
              </form>
              <a href="{{ url('campaigns/edit/' . $campaign->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
            </div>
          </td>
        </tr>
      
      @endforeach
    </tbody>
  </table>
  @else
    <div class="alert alert-info">No hay campañas asociadas con el usuario actual</div>
  @endif
@endsection