<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Control</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="/control/public/css/reset.css">
    <link rel="stylesheet" href="/control/public/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="icon" href="{{url('/favicon.png')}}">
  </head>
  <body>
    <header>
    </header>

    <div class="container-fluid main">
      <div class="row main">

        @if(Auth::check())
          <div class="col-sm-3 dotted text-center sidebar">
            <img src="{{ url('img/placeholder.svg') }}" style="width: 150px; margin-top: .5em;">
            <p><b>{{ Auth::user()->getFullName() }}</b> <br> {{ Auth::user()->roles()->first()->title }}</p>
            <hr>

            <ul class="users-list">
            @if(Auth::user()->hasAnyRole(['admin', 'campaign']))
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggler"><i class="fa fa-building"></i> Centros de votación</a>
                <ul class="dropdown-menu">
                  <li class=""><a href="{{ url('/centers') }}">Ver todos</a></li>
                  <li class=""><a href="{{ url('/centers/create') }}">Agregar</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggler"><i class="fa fa-gamepad"></i> Usuarios</a>
                <ul class="dropdown-menu">
                  <li class=""><a href="{{ url('/users') }}">Ver todos</a></li>
                  <li class=""><a href="{{ url('/users/create') }}">Agregar</a></li>
                </ul>
              </li>
            @endif
            @if(Auth::user()->hasAnyRole(['admin', 'leader_master']))
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggler"><i class="fa fa-star"></i> Lideres</a>
                <ul class="dropdown-menu">
                  <li class=""><a href="{{ url('/leaders') }}">Ver todos</a></li>
                  <li class=""><a href="{{ url('/leaders/create') }}">Agregar</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggler"><i class="fa fa-group"></i> Votantes</a>
                <ul class="dropdown-menu">
                  <li class=""><a href="{{ url('/voters') }}">Ver todos</a></li>
                  <li class=""><a href="{{ url('/voters/create') }}">Agregar</a></li>
                </ul>
              </li>
            @endif
            @if(Auth::user()->hasRole('admin'))
              <li>
                <a><i class="fa fa-paste"></i> Reportes</a>
              </li>
            @endif
              <li>
                <form action="{{ route('logout') }}" method="POST">
                    {{ CSRF_FIELD() }}
                    <button type="submit" class="btn btn-link"><i class="fa fa-sign-out"></i> Salir</button>
                </form>
              </li>
            </ul>
          </div>
        @endif

        <div class="col dotted main">
          @section('main')
          @show
        </div>
      </div>
    </div>

    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script>
      $('.cp-child').click(function(){
        if( $(this).is(':checked') ){
          $('.cp_field').addClass('active');
          $(this).attr('required', 'required');
        }
      });
      $('.no-child').click(function(){
        if( $(this).is(':checked') ){
          $('.cp_field').removeClass('active');
          $('.cp_field .form-control').removeAttr('required');
        }
      });
    </script>
  </body>
</html>
