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
        $request->validate([
            'marca'  => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'anio'   => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        Autos::create([
            'marca'   => $request->marca,
            'modelo'  => $request->modelo,
            'anio'    => $request->anio,
            'precio'  => $request->precio,
            'estatus' => 1
        ]);

        return redirect()->route('autos.index');
    }

    public function show($id)
    {
        $auto = Autos::findOrFail($id);
        return view('autos.show', compact('auto'));
    }

    public function edit($id)
    {
        $auto = Autos::findOrFail($id);
        return view('autos.edit', compact('auto'));
    }

    public function update(Request $request, $id)
    {
        $auto = Autos::findOrFail($id);
        
        $request->validate([
            'marca'  => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'anio'   => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $auto->update($request->all());

        return redirect()->route('autos.index');
    }

    public function destroy($id)
    {
        $auto = Autos::find($id);
        if ($auto) {
            $auto->estatus = 0;
            $auto->save();
        }
        return redirect()->route('autos.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'     => $value->id_auto,
                'unidad' => $value->marca . ' ' . $value->modelo,
                'anio'   => $value->anio,
                'precio' => '$' . number_format($value->precio, 2),
            ];
        }
        return $datosFilas;
    }
}