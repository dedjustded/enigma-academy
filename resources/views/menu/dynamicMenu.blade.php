<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://bootstrapthemes.co/demo/resource/bootstrap-4-multi-dropdown-hover-navbar/css/bootstrap-4-hover-navbar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-md navbar-light bg-light btco-hover-menu">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @foreach($menus as $menu)
            <li class="nav-item dropdown">
                <a href="{{ $menu->url }}" class="nav-link {{ count($menu->childs) ? 'dropdown-toggle' :'' }}"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ $menu->title }}
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                  @if(count($menu->childs))
                    @include('menu.menusub',['childs' => $menu->childs])
                  @endif
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</nav>
</body>
</html>