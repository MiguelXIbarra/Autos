<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    $nombreArchivo = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
    
    $folder = $this->getFolder($request->tipo);
    $file->storeAs($folder, $nombreArchivo, 'public');

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
            Storage::delete('public/' . $asset->ruta);

            $file = $request->file('archivo');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $nombreArchivo = time() . '_' . Str::slug($originalName) . '.' . $extension;
            
            $newFolder = $this->getFolder($request->tipo);
            $file->storeAs('public/' . $newFolder, $nombreArchivo);
            
            $data['ruta'] = $newFolder . '/' . $nombreArchivo;
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

    public function getImage($filename)
    {
        $path = storage_path('app/public/images/' . rawurldecode($filename));

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function getVideo($filename)
    {
        $path = storage_path('app/public/videos/' . rawurldecode($filename));

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, ['Content-Type' => 'video/mp4']);
    }

    public function getDocument($filename)
    {
        $path = storage_path('app/public/documents/' . rawurldecode($filename));

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
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