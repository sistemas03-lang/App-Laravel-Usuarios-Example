<?php
namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
class UsuarioController extends Controller
{
    // READ: Listar / Buscar usuarios
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');
        $usuarios = Usuario::when($busqueda, function ($query, $busqueda) {
    return $query->where('NombreUsuario', 'like', "%{$busqueda}%");
})->get();
        return view('usuarios.index', compact('usuarios', 'busqueda'));
    }
    // CREATE: Mostrar formulario
    public function create()
    {
        return view('usuarios.create');
    }
    // CREATE: Guardar en BD
    public function store(Request $request)
    {
        $request->validate([
            'NombreUsuario' => 'required|string|max:100',
        ]);
        Usuario::create([
            'NombreUsuario' => $request->NombreUsuario,
        ]);
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }
    // UPDATE: Mostrar formulario de edición
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }
    // UPDATE: Guardar cambios
    public function update(Request $request, $id)
    {
        $request->validate([
            'NombreUsuario' => 'required|string|max:100',
        ]);
        $usuario = Usuario::findOrFail($id);
        $usuario->NombreUsuario = $request->NombreUsuario;
        $usuario->save();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }
    // DELETE: Eliminar usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}