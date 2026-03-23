<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Añadido para limpiar nombres

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
            'titulo' => 'required|string|max:255',
            'archivo' => 'required|file|max:102400',
            'tipo' => 'required|string',
        ]);

        $file = $request->file('archivo');
        
        // Limpiamos el nombre del archivo: quitamos espacios y caracteres especiales
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $nombreArchivo = time() . '_' . Str::slug($originalName) . '.' . $extension;
        
        $folder = $this->getFolder($request->tipo);
        $file->storeAs('public/' . $folder, $nombreArchivo);

        Asset::create([
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'ruta' => $nombreArchivo,
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
        $data = $request->only(['titulo', 'tipo']);

        if ($request->hasFile('archivo')) {
            $oldFolder = $this->getFolder($asset->tipo);
            Storage::delete('public/' . $oldFolder . '/' . $asset->ruta);

            $file = $request->file('archivo');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $nombreArchivo = time() . '_' . Str::slug($originalName) . '.' . $extension;
            
            $newFolder = $this->getFolder($request->tipo);
            $file->storeAs('public/' . $newFolder, $nombreArchivo);
            $data['ruta'] = $nombreArchivo;
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

    public function getVideo($filename)
    {
        // Usamos rawurldecode por si el nombre en la BD aún tiene espacios
        $path = storage_path('app/public/videos/' . rawurldecode($filename));
        if (!file_exists($path)) abort(404);
        return response()->file($path, ['Content-Type' => 'video/mp4']);
    }

    public function getImage($filename)
    {
        $path = storage_path('app/public/images/' . rawurldecode($filename));
        if (!file_exists($path)) abort(404);
        return response()->file($path);
    }

    public function getDocument($filename)
    {
        $path = storage_path('app/public/documents/' . rawurldecode($filename));
        if (!file_exists($path)) abort(404);
        return response()->file($path);
    }

    private function getFolder($tipo)
    {
        return match ($tipo) {
            'Imagen' => 'images',
            'Video' => 'videos',
            default => 'documents',
        };
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'      => (int) $value->id_asset,
                'nombre'  => $value->titulo,
                'tipo'    => $value->tipo,
                'archivo' => $value->ruta,
                'fecha'   => $value->created_at->format('d/m/Y H:i'),
            ];
        }
        return $datosFilas;
    }
}