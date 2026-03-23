<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Solo obtener usuarios activos (estatus = 1)
        $users = User::where('estatus', 1)->get();
        return view('usuarios.index', ['users' => $this->cargarDT($users)]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estatus' => 1, // Por defecto activo
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = $request->only(['name', 'email']);
        
        // Solo actualizar contraseña si se proporcionó una nueva
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Método Destroy implementado para baja lógica
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->estatus = 0; // Baja lógica
            $user->save();
        }
        return redirect()->route('usuarios.index')->with('success', 'Usuario dado de baja exitosamente.');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'      => (int) $value->id,
                'nombre'  => $value->name,
                'email'   => $value->email,
                'fecha'   => $value->created_at->format('d/m/Y H:i'),
            ];
        }
        return $datosFilas;
    }
}