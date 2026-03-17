<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::where('estatus', 1)->get();
        return view('clientes.index', ['clientes' => $this->cargarDT($clientes)]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        Cliente::create($validacion + ['estatus' => 1]);

        return redirect()->route('clientes.index')->with('message', 'Cliente registrado con éxito');
    }

    // MÉTODO AGREGADO PARA SOLUCIONAR EL ERROR
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($validacion);

        return redirect()->route('clientes.index')->with('message', 'Cliente actualizado correctamente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->estatus = 0;
            $cliente->update();
            return redirect()->route('clientes.index')->with('message', 'Cliente eliminado correctamente');
        }
        return redirect()->route('clientes.index')->with('message', 'El cliente no existe');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $ver = route('clientes.show', $value['id_cliente']);
            $actualizar = route('clientes.edit', $value['id_cliente']);
            
            $acciones = '
            <div class="btn-acciones">
                <div class="btn-circle">
                    <a href="' . $ver . '" role="button" class="btn btn-primary" title="Ver Detalle">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                        <i class="far fa-edit"></i>
                    </a>
                    <a role="button" class="btn btn-danger" onclick="modal(' . $value['id_cliente'] . ')" data-toggle="modal" data-target="#exampleModal">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
            </div>';

            $datosFilas[$key] = array(
                $acciones,
                $value['id_cliente'],
                $value['nombre'],
                $value['apellido'],
                $value['correo'],
                $value['telefono']
            );
        }
        return $datosFilas;
    }
}