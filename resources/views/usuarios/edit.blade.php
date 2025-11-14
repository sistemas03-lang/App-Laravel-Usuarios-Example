@extends('layouts.app')
@section('content')
    <h1 class="mb-3">Modificar Usuario</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('usuarios.update', $usuario->IdUsuario) }}"
          method="POST"
          class="col-md-6">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NombreUsuario" class="form-label">Nombre de Usuario</label>
            <input type="text"
                   name="NombreUsuario"
                   id="NombreUsuario"
                   class="form-control"
                   value="{{ old('NombreUsuario', $usuario->NombreUsuario) }}"
                   required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection