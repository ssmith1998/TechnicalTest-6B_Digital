<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" type="text/css">
</head>
<body>
<nav class="navbar navbar-light bg-light d-flex justify-content-between shadow-sm px-3 py-2">
  <span class="navbar-brand mb-0 h1">DJ Valeting</span>
  <div class="wrapper d-flex align-items-center justify-content-around">
  <p class="m-0 mr-2 p-2">{{ Auth::user()->email }}</p>
  <a href="/admin/logout"><button class="btn btn-danger pl-4">Logout</button></a>
  </div>
</nav>
<div class="adminWrapper d-flex flex-column justify-content-center align-items-center vh-100">
@yield('content')
</div>
</body>
</html>