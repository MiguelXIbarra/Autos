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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
        ]);

        Empleado::create([
            'nombre' => $request->nombre,
            'puesto' => $request->puesto,
            'salario' => $request->salario,
            'fecha_ingreso' => $request->fecha_ingreso,
            'estatus' => 1,
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());

        return redirect()->route('empleados.index');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if ($empleado) {
            $empleado->estatus = 0;
            $empleado->save();
        }
        return redirect()->route('empleados.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'      => (int) $value->id_empleado,
                'nombre'  => $value->nombre,
                'puesto'  => $value->puesto,
                'salario' => $value->salario,
                'ingreso' => $value->fecha_ingreso,
            ];
        }
        return $datosFilas;
    }
}