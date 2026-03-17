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
        $ventas = Venta::with(['auto', 'cliente', 'empleado'])->where('estatus', 1)->get();
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
            'id_auto' => 'required',
            'id_cliente' => 'required',
            'id_empleado' => 'required',
            'fecha_venta' => 'required|date',
            'total' => 'required|numeric'
        ]);

        Venta::create($validacion + ['estatus' => 1]);
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
        $validacion = $request->validate([
            'id_auto' => 'required',
            'id_cliente' => 'required',
            'id_empleado' => 'required',
            'fecha_venta' => 'required|date',
            'total' => 'required|numeric'
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($validacion);

        return redirect()->route('ventas.index');
    }

    public function destroy($id)
    {
        $venta = Venta::find($id);
        if ($venta) {
            $venta->estatus = 0;
            $venta->update();
        }
        return redirect()->route('ventas.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $ver = route('ventas.show', $value['id_venta']);
            $actualizar = route('ventas.edit', $value['id_venta']);
            
            $acciones = '
            <div class="btn-acciones">
                <div class="btn-circle">
                    <a href="' . $ver . '" role="button" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="' . $actualizar . '" role="button" class="btn btn-success">
                        <i class="far fa-edit"></i>
                    </a>
                    <a role="button" class="btn btn-danger" onclick="modal(' . $value['id_venta'] . ')" data-toggle="modal" data-target="#exampleModal">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
            </div>';

            $datosFilas[$key] = array(
                $acciones,
                $value['id_venta'],
                $value->cliente->nombre . ' ' . $value->cliente->apellido,
                $value->auto->marca . ' ' . $value->auto->modelo,
                $value->fecha_venta,
                '$' . number_format($value['total'], 2)
            );
        }
        return $datosFilas;
    }
}