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
  </link>

</head>

<body>
  <div id="app" class="container">
    <div class="row" style="height: 100vh;">
      <div class="col-md-12 align-self-center">
        <Menues></Menues>
      </div>
    </div>
  </div>


  <script src="{{asset('libs/jquery/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('libs/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>

</html>