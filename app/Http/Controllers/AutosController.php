<?php

namespace App\Http\Controllers;

use App\Models\Autos;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AutosController extends Controller
{

    // Mostrar todos los autos activos
    public function index()
    {
        $consulta = Autos::where('status', 1)->get();
        return view('autos.index', compact('consulta'));
    }

    // Formulario para crear auto + seleccionar cliente
    public function create()
    {
        $clientes = Cliente::all();   // Clientes disponibles
        return view('autos.create', compact('clientes'));
    }

    // Guardar auto y usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'imagen' => 'nullable|image|max:2048',
        ]);

        // Crear usuario
        $user = new User();
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = Hash::make('12345678'); // Contraseña por defecto
        $user->role = 'AUTOS'; // Asegúrate de que la columna exista
        $user->status = 1;     // Activo
        $user->save();

        // Crear auto
        $auto = new Autos();
        $auto->user_id = $user->id;
        $auto->name = $user->name;
        $auto->email = $user->email;
        $auto->status = 1;

        // Subida de imagen
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_auto_' . $user->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/autos/originals/'), $filename);

            $auto->image = $filename;
            $user->image = $filename;
            $user->save();
        }

        $auto->save();

        return redirect()->route('autos.index')->with('message', 'Auto creado correctamente');
    }

    // Mostrar un auto
    public function show($id)
    {
        $auto = Autos::findOrFail($id);
        return view('autos.show', compact('auto'));
    }

    // Formulario de edición
    public function edit($id)
    {
        $auto = Autos::findOrFail($id);
        return view('autos.edit', compact('auto'));
    }

    // Actualizar auto y usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $auto = Autos::findOrFail($id);
        $auto->name = $request->input('name');
        $auto->email = $request->input('email');

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_auto_' . $id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/autos/originals/'), $filename);
            $auto->image = $filename;
        }

        $auto->save();

        // Actualizar usuario relacionado
        $user = User::find($auto->user_id);
        if ($user) {
            $user->name = $auto->name;
            $user->email = $auto->email;
            $user->image = $auto->image;
            $user->save();
        }

        return redirect()->route('autos.index')->with('message', 'Auto actualizado correctamente');
    }

    // Eliminar (soft delete)
    public function destroy($id)
    {
        $auto = Autos::findOrFail($id);
        $auto->status = 0;
        $auto->save();

        return redirect()->route('autos.index')->with('message', 'Auto eliminado correctamente');
       }

}
