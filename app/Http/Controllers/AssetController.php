<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::where('estatus', 1)->get();
        return view('asset.index', ['assets' => $this->cargarDT($assets)]);
    }

    public function create()
    {
        return view('asset.create');
    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
            'titulo' => 'required',
            'tipo'   => 'required',
            'ruta'   => 'required'
        ]);

        // Guardamos con estatus activo por defecto
        Asset::create($validacion + ['estatus' => 1]);

        return redirect()->route('asset.index');
    }

    public function show($id)
    {
        $asset = Asset::findOrFail($id);
        return view('asset.show', compact('asset'));
    }

    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        return view('asset.edit', compact('asset'));
    }

    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
            'titulo' => 'required',
            'tipo'   => 'required',
            'ruta'   => 'required'
        ]);

        $asset = Asset::findOrFail($id);
        $asset->update($validacion);

        return redirect()->route('asset.index');
    }

    public function destroy($id)
    {
        $asset = Asset::find($id);
        if ($asset) {
            $asset->estatus = 0;
            $asset->update();
        }
        return redirect()->route('asset.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $idActual = $value['id_asset'];

            $acciones = '
            <div class="btn-acciones text-center">
                <div class="btn-circle">
                    <a href="' . route('asset.show', $idActual) . '" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="' . route('asset.edit', $idActual) . '" class="btn btn-success"><i class="far fa-edit"></i></a>
                    <a role="button" class="btn btn-danger" onclick="modal(' . $idActual . ')" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></a>
                </div>
            </div>';

            $datosFilas[$key] = array($acciones, $idActual, $value['titulo'], $value['tipo'], $value['ruta']);
        }
        return $datosFilas;
    }
}