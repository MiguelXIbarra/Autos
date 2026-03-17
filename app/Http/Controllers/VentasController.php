<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Clientes;
use App\Models\Autos;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        // Traemos las ventas con la información del cliente cargada
        $ventas = Venta::with('cliente')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Clientes::all();
        $autos = Autos::where('status', 1)->get(); // Solo autos disponibles
        return view('ventas.create', compact('clientes', 'autos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'auto_id' => 'required',
        ]);

        // Buscamos el auto para obtener su nombre y detalles
        $auto = Autos::find($request->auto_id);

        $venta = new Venta();
        $venta->client_id = $request->client_id;
        $venta->title = "Venta de: " . $auto->name;
        $venta->description = $request->input('comentarios');
        $venta->category = "Venta Automotriz";
        $venta->status = "Vendido";
        $venta->save();

        // Marcamos el auto como vendido (status 0)
        $auto->status = 0;
        $auto->save();

        return redirect()->route('ventas.index')->with('message', 'Venta registrada con éxito');

        // 1. Guardar la venta
       $venta = Venta::create($request->all());

    // 2. Cambiar el estado del Auto para que ya no aparezca disponible
         $auto = Autos::find($request->auto_id);
         $auto->status = 0; // 0 = Vendido / No disponible
         $auto->save();

    return redirect()->route('ventas.index')->with('message', '¡Venta realizada y stock actualizado!');
}
}
