@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Crear Usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST" class="col-md-6">
        @csrf

        <div class="mb-3">
            <label for="NombreUsuario" class="form-label">Nombre de Usuario</label>
            <input type="text"
                   name="NombreUsuario"
                   id="NombreUsuario"
                   class="form-control"
                   value="{{ old('NombreUsuario') }}"
                   required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection
