@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Detalle del Cliente #{{ $cliente->id_cliente }}</h2>
    </div>
    <hr>
    <div class="row">
        <div class="card col-lg-8">
            <div class="card-header bg-primary">
                <h3 class="card-title">Información Personal</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th style="width: 200px;">Nombre:</th>
                        <td>{{ $cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <th>Apellido:</th>
                        <td>{{ $cliente->apellido }}</td>
                    </tr>
                    <tr>
                        <th>Correo:</th>
                        <td>{{ $cliente->correo }}</td>
                    </tr>
                    <tr>
                        <th>Teléfono:</th>
                        <td>{{ $cliente->telefono }}</td>
                    </tr>
                    <tr>
                        <th>Dirección:</th>
                        <td>{{ $cliente->direccion }}</td>
                    </tr>
                    <tr>
                        <th>Estatus:</th>
                        <td>
                            <span class="badge badge-{{ $cliente->estatus == 1 ? 'success' : 'danger' }}">
                                {{ $cliente->estatus == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Regresar</a>
                <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-success">Editar Datos</a>
            </div>
        </div>
    </div>
</div>
@endsection