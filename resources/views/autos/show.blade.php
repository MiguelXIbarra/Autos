@extends('adminlte::page')

@section('title', 'Detalle del Auto')

@section('content_header')
    <h1>Detalle del Auto Deportivo</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('autos.index') }}" class="btn btn-secondary">Volver al listado</a>
        <a href="{{ route('autos.edit', $auto->id) }}" class="btn btn-warning">Editar Auto</a>
    </div>

    <div class="card-body row">
        <div class="col-md-4 text-center">
            @if($auto->image)
                <img src="{{ asset('img/autos/originals/' . $auto->image) }}" class="img-fluid rounded mb-3" alt="Imagen del Auto">
            @else
                <span class="badge badge-secondary">SIN FOTO</span>
            @endif
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nombre del Auto</th>
                        <td>{{ $auto->name }}</td>
                    </tr>
                    <tr>
                        <th>Email del Propietario</th>
                        <td>{{ $auto->email }}</td>
                    </tr>
                    <tr>
                        <th>Cliente Asociado</th>
                        <td>{{ $auto->cliente ? $auto->cliente->nombre : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>
                            @if($auto->status == 1)
                                <span class="badge badge-success">Activo</span>
                            @else
                                <span class="badge badge-danger">Inactivo</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Registrado por Usuario</th>
                        <td>{{ $auto->user ? $auto->user->name : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Creación</th>
                        <td>{{ $auto->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Última Actualización</th>
                        <td>{{ $auto->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
