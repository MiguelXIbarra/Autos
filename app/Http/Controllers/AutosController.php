<?php

namespace App\Http\Controllers;

use App\Models\Autos;
use Illuminate\Http\Request;

class AutosController extends Controller
{
    public function index()
    {
        $autos = Autos::where('estatus', 1)->get();
        return view('autos.index', ['autos' => $this->cargarDT($autos)]);
    }

    public function create()
    {
        return view('autos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|integer',
            'precio' => 'required|numeric'
        ]);

        $auto = new Autos();
        $auto->marca = $request->input('marca');
        $auto->modelo = $request->input('modelo');
        $auto->anio = $request->input('anio');
        $auto->precio = $request->input('precio');
        $auto->estatus = 1;
        $auto->save();

        return redirect()->route('autos.index')->with('message', 'Auto guardado correctamente');
    }

    public function show(string $id)
    {
        $auto = Autos::findOrFail($id);
        return view('autos.show', compact('auto'));
    }

    public function edit(string $id)
    {
        $auto = Autos::findOrFail($id);
        return view('autos.edit', compact('auto'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|integer',
            'precio' => 'required|numeric'
        ]);

        $auto = Autos::findOrFail($id);
        $auto->marca = $request->input('marca');
        $auto->modelo = $request->input('modelo');
        $auto->anio = $request->input('anio');
        $auto->precio = $request->input('precio');
        $auto->save();

        return redirect()->route('autos.index')->with('message', 'Auto actualizado correctamente');
    }

    public function destroy($id)
    {
        $auto = Autos::find($id);
        if ($auto) {
            $auto->estatus = 0;
            $auto->update();
            return redirect()->route('autos.index')->with('message', 'Auto eliminado correctamente');
        }
        return redirect()->route('autos.index')->with('message', 'El auto no existe');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $actualizar = route('autos.edit', $value['id_auto']);
            $ver = route('autos.show', $value['id_auto']);
            
            $acciones = '
            <div class="btn-acciones">
                <div class="btn-circle">
                    <a href="' . $ver . '" role="button" class="btn btn-primary" title="Ver">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                        <i class="far fa-edit"></i>
                    </a>
                    <a role="button" class="btn btn-danger" onclick="modal(' . $value['id_auto'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
            </div>';

            $datosFilas[$key] = array(
                $acciones,
                $value['id_auto'],
                $value['marca'],
                $value['modelo'],
                $value['anio'],
                $value['precio']
            );
        }
        return $datosFilas;
    }
}