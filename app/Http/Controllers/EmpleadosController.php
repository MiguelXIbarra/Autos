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
            'nombre' => 'required',
            'puesto' => 'required',
            'salario' => 'required|numeric',
            'fecha_ingreso' => 'required|date'
        ]);

        Empleado::create($validacion + ['estatus' => 1]);

        return redirect()->route('empleados.index')->with('message', 'Empleado registrado con éxito');
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
        $validacion = $request->validate([
            'nombre' => 'required',
            'puesto' => 'required',
            'salario' => 'required|numeric',
            'fecha_ingreso' => 'required|date'
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($validacion);

        return redirect()->route('empleados.index')->with('message', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if ($empleado) {
            $empleado->estatus = 0;
            $empleado->update();
            return redirect()->route('empleados.index')->with('message', 'Empleado eliminado correctamente');
        }
        return redirect()->route('empleados.index')->with('message', 'El empleado no existe');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $ver = route('empleados.show', $value['id_empleado']);
            $actualizar = route('empleados.edit', $value['id_empleado']);
            
            $acciones = '
            <div class="btn-acciones">
                <div class="btn-circle">
                    <a href="' . $ver . '" role="button" class="btn btn-primary" title="Ver Detalle">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                        <i class="far fa-edit"></i>
                    </a>
                    <a role="button" class="btn btn-danger" onclick="modal(' . $value['id_empleado'] . ')" data-toggle="modal" data-target="#exampleModal">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
            </div>';

            $datosFilas[$key] = array(
                $acciones,
                $value['id_empleado'],
                $value['nombre'],
                $value['puesto'],
                $value['salario'],
                $value['fecha_ingreso']
            );
        }
        return $datosFilas;
    }
}