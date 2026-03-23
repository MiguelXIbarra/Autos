<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleado::where('estatus', 1)->get();
        return view('empleados.index', ['empleados' => $this->cargarDT($empleados)]);
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre'   => 'required|string|max:255',
            'puesto'   => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'email'    => 'required|email|unique:empleados,email',
            'fecha_ingreso' => 'required|date',
        ]);

        Empleado::create([
            'nombre'   => $validacion['nombre'],
            'puesto'   => $validacion['puesto'],
            'telefono' => $validacion['telefono'],
            'email'    => $validacion['email'],
            'fecha_ingreso' => $validacion['fecha_ingreso'],
            'estatus'  => 1
        ]);

        return redirect()->route('empleados.index');
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        
        $validacion = $request->validate([
            'nombre'   => 'required|string|max:255',
            'puesto'   => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'email'    => 'required|email|unique:empleados,email,'.$id.',id_empleado',
            'fecha_ingreso' => 'required|date',
        ]);

        $empleado->update($validacion);

        return redirect()->route('empleados.index');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->estatus = 0;
        $empleado->save();

        return redirect()->route('empleados.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'       => $value->id_empleado,
                'nombre'   => $value->nombre,
                'puesto'   => $value->puesto,
                'contacto' => $value->email,
                'telefono' => $value->telefono,
                'ingreso'  => date('d/m/Y', strtotime($value->fecha_ingreso)),
            ];
        }
        return $datosFilas;
    }
}