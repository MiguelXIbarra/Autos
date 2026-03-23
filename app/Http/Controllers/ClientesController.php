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
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email|unique:clientes,correo',
            'telefono' => 'required',
        ]);

        Cliente::create([
            'nombre'    => $request->nombre,
            'apellido'  => $request->apellido,
            'correo'    => $request->correo,
            'telefono'  => $request->telefono,
            'direccion' => $request->direccion,
            'estatus'   => 1
        ]);

        return redirect()->route('clientes.index');
    }

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
        $cliente = Cliente::findOrFail($id);
        
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email|unique:clientes,correo,'.$id.',id_cliente',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->estatus = 0;
            $cliente->save();
        }
        return redirect()->route('clientes.index');
    }

    private function cargarDT($consulta)
    {
        $datosFilas = [];
        foreach ($consulta as $key => $value) {
            $datosFilas[$key] = [
                'id'       => $value->id_cliente,
                'nombre'   => $value->nombre . ' ' . $value->apellido,
                'email'    => $value->correo, // Aquí extraemos de 'correo' para la vista
                'telefono' => $value->telefono,
            ];
        }
        return $datosFilas;
    }
}