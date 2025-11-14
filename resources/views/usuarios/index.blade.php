@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Listado de Usuarios</h1>

    {{-- Formulario de búsqueda --}}
    <form method="GET" action="{{ route('usuarios.index') }}" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text"
                   name="busqueda"
                   class="form-control"
                   placeholder="Buscar por nombre..."
                   value="{{ $busqueda }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>

    @if($usuarios->count() === 0)
        <div class="alert alert-info">
            No hay usuarios registrados.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th id="modificar">Modificar</th>
                <th id="eliminar">Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->IdUsuario }}</td>
                    <td>{{ $usuario->NombreUsuario }}</td>

                    {{-- Modificar --}}
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->IdUsuario) }}"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>
                    </td>

                    {{-- Eliminar --}}
                    <td>
                        <form action="{{ route('usuarios.destroy', $usuario->IdUsuario) }}"
                              method="POST"
                              onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
