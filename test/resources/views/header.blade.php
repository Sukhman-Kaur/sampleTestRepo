<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Countries</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
</head>
<body>
     <header>
  <h2>COUNTRIES</h2>
</header>
  <div class="container">

    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
<style>
    header {  padding: 7px;
  text-align: center;
  background: #414444;
  color: white;
}
body{
    margin:0px;
    padding: 0px;
    background:  #6f7070;
}
</style>
