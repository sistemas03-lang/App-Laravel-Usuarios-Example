<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>App Laravel Usuarios Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('usuarios.index') }}">Usuarios CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- READ / BUSCAR --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">Buscar / Listar</a>
                </li>
                {{-- CREATE --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.create') }}">Crear usuario</a>
                </li>
                {{-- UPDATE (te manda a la lista para editar) --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}#modificar">
                        Modificar usuario
                    </a>
                </li>
                {{-- DELETE (también desde la lista) --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}#eliminar">
                        Eliminar usuario
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>