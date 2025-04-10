<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: black; color: white;">
    <style>
        .custom-navbar {
  border-bottom: 3px solid white;
  padding-top: 1rem;
  padding-bottom: 1rem;
  }

    </style>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar"  >
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Mi Tienda</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto color-white">
                    <li class="nav-item"><a class="nav-link {{ request()->is('icicio*') ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('productos*') ? 'active' : '' }}" href="{{ route('productos.index') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}" href="{{ route('categorias.index') }}">Categorías</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>