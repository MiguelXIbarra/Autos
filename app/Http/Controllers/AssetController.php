<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'archivo' => 'required|file|max:50000',
            'tipo' => 'required|string',
        ]);

        $nombreArchivo = time() . '_' . $request->file('archivo')->getClientOriginalName();
        $request->file('archivo')->storeAs('public/assets', $nombreArchivo);

        Asset::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'archivo' => $nombreArchivo,
            'descripcion' => $request->descripcion,
            'estatus' => 1,
        ]);

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
        $asset = Asset::findOrFail($id);
        $data = $request->only(['nombre', 'tipo', 'descripcion']);

        if ($request->hasFile('archivo')) {
            Storage::delete('public/assets/' . $asset->archivo);
            $nombreArchivo = time() . '_' . $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('public/assets', $nombreArchivo);
            $data['archivo'] = $nombreArchivo;
        }

        $asset->update($data);
        return redirect()->route('asset.index');
    }

    public function destroy($id)
    {
        $asset = Asset::find($id);
        if ($asset) {
            $asset->estatus = 0;
            $asset->save();
        }
        return redirect()->route('asset.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'      => (int) $value->id,
                'nombre'  => $value->nombre,
                'tipo'    => $value->tipo,
                'archivo' => $value->archivo,
                'fecha'   => $value->created_at->format('d/m/Y'),
            ];
        }
        return $datosFilas;
    }
}