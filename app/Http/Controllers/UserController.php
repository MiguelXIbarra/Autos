<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::where('estatus', 1)->get();
        return view('usuarios.index', ['usuarios' => $this->cargarDT($usuarios)]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validacion['name'],
            'email' => $validacion['email'],
            'password' => Hash::make($validacion['password']),
            'estatus' => 1
        ]);

        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        
        $validacion = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $usuario->update($validacion);

        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed|min:8']);
            $usuario->password = Hash::make($request->password);
            $usuario->save();
        }

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        if ($usuario && $usuario->id != Auth::id()) {
            $usuario->estatus = 0;
            $usuario->save();
        }
        return redirect()->route('usuarios.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'    => $value->id,
                'name'  => $value->name,
                'email' => $value->email,
            ];
        }
        return $datosFilas;
    }
}