<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap" />
        </svg>
      </a>

      @auth
      <a href="#">{{ auth()->user()->first_name}} {{ auth()->user()->last_name }}</a>
      <div class="text-end">
        <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
      </div>
      @endauth

      @guest
      <div class="text-end">
        <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
        <a href="{{ route('register.perform') }}" class="btn btn-warning">Register</a>
      </div>
      @endguest
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
          <span class="caret"></span></button>
        <ul class="dropdown-menu">
          @foreach($trainings as $training)
            <li><a href="/training/{{ $training->id }}">{{ $training->course_name }}</a></li>
          @endforeach  
        </ul>
      </div>
    </div>

  </div>

  </div>
</header>
</body>
</html>