@extends('layouts.master')
@section('main')
  <h1>Todos los centros</h1>
  @if( count( $centers ) )
  <table class="table table-striped table-campaigns">
    <thead>
      <th>ID</th>
      <th>Nombre</th>
      <th>Campaña</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      @foreach($centers as $center)
      
        <tr>
          <td>{{ $center->id }}</td>
          <td>{{ $center->name }}</td>
          <td>{{ $center->users()->first()->name }}</td>
          <td>
            <div class="btn-group">
              <a href="{{ url('centers/view/' . $center->id) }}" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <form method="POST" action="{{ action('CenterController@deleteDelete', ['id'=>$center->id]) }}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i></button>
              </form>
              <a href="{{ url('centers/edit/' . $center->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
            </div>
          </td>
        </tr>
      
      @endforeach
    </tbody>
  </table>
  @else
    <div class="alert alert-info">No hay centros asociadas con el usuario actual</div>
  @endif
@endsection