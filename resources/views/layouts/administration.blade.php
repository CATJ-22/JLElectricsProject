<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{env('APP_NAME')}}</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('libs/bootstrap/bootstrap.min.css')}}">

  <!-- Styles -->
  <link href="{{asset('css/administracion.css')}}" rel="stylesheet">
  </link>

  @yield('styles')
</head>

<body>
  <!-- Barra de Navegación -->
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('AdministracionHome')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('Inventario')}}">Inventario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div id="app" class="container" style="height: 88vh;">
    <div class="row mt-5">
      <div class="col-md-12 align-self-center">
        @yield('content')
      </div>
    </div>
  </div>


  <script src="{{asset('libs/jquery/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('libs/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
  @yield('scripts')
</body>

</html>