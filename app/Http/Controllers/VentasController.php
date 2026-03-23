<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Autos;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['auto', 'cliente', 'empleado'])
                       ->where('estatus', 1)
                       ->get();

        return view('ventas.index', ['ventas' => $this->cargarDT($ventas)]);
    }

    public function create()
    {
        $autos = Autos::where('estatus', 1)->get();
        $clientes = Cliente::where('estatus', 1)->get();
        $empleados = Empleado::where('estatus', 1)->get();
        
        return view('ventas.create', compact('autos', 'clientes', 'empleados'));
    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
            'id_auto'     => 'required|exists:autos,id_auto',
            'id_cliente'  => 'required|exists:clientes,id_cliente',
            'id_empleado' => 'required|exists:empleados,id_empleado',
            'total'       => 'required|numeric',
            'fecha_venta' => 'required|date',
        ]);

        Venta::create([
            'id_auto'     => $validacion['id_auto'],
            'id_cliente'  => $validacion['id_cliente'],
            'id_empleado' => $validacion['id_empleado'],
            'total'       => $validacion['total'],
            'fecha_venta' => $validacion['fecha_venta'],
            'estatus'     => 1
        ]);

        return redirect()->route('ventas.index');
    }

    public function show($id)
    {
        $venta = Venta::with(['auto', 'cliente', 'empleado'])->findOrFail($id);
        return view('ventas.show', compact('venta'));
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $autos = Autos::where('estatus', 1)->get();
        $clientes = Cliente::where('estatus', 1)->get();
        $empleados = Empleado::where('estatus', 1)->get();

        return view('ventas.edit', compact('venta', 'autos', 'clientes', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        
        $validacion = $request->validate([
            'id_auto'     => 'required',
            'id_cliente'  => 'required',
            'id_empleado' => 'required',
            'total'       => 'required|numeric',
            'fecha_venta' => 'required|date',
        ]);

        $venta->update($validacion);

        return redirect()->route('ventas.index');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->estatus = 0;
        $venta->save();

        return redirect()->route('ventas.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'       => $value->id_venta,
                'auto'     => $value->auto->marca . ' ' . $value->auto->modelo,
                'cliente'  => $value->cliente->nombre,
                'empleado' => $value->empleado->nombre,
                'total'    => '$' . number_format($value->total, 2),
                'fecha'    => date('d/m/Y', strtotime($value->fecha_venta)),
            ];
        }
        return $datosFilas;
    }
}