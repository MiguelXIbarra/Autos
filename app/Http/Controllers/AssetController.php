<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $assets = Asset::all();
    return view('asset.index', compact('assets'));

    $assets = Asset::all();
    dd($assets); // Esto debería mostrar un dump con todos los assets
    return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('asset.create');
    }


    public function store(Request $request)
{
// ... tu código de subida y guardado

    return redirect()->route('asset.index')->with('success', 'Asset creado correctamente');

   }

     public function show(string $id)
   {
       $asset = Asset::find($id);
       return view('asset.show')->with('asset', $asset);
   }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
     public function getImage($filename)
   {
       $file = Storage::disk('images')->get($filename);
       return new Response($file, 200);
   }
   public function getVideo($filename)
   {
       $file = Storage::disk('videos')->get($filename);
       return new Response($file, 200);
   }

}
