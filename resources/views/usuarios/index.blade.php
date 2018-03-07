@extends('layouts.master')
@section('main')
  <h1>Todos los usuarios</h1>
  @if( count($users) )
    <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Centro</th>
        <th>Opciones</th>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->getFullName() }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->first()->title }}</td>
            <td>{{ ( $user->centers->first() ) ? $user->centers->first()->name : 'Ninguno' }}</td>
            <td>
              <div class="btn-group">
                <a href="{{ url('users/view/' . $user->id) }}" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                <form method="POST" action="{{ action('UserController@deleteDelete', ['id'=>$user->id]) }}">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i></button>
                </form>
                <a href="{{ url('users/edit/' . $user->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="alert alert-info"><i class="fa fa-warning" style="margin-right: 2em;"></i> No hay usuarios asignados al usuario actual</div>
  @endif
@endsection