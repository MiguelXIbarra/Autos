@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Detalle del Auto #{{ $auto->id_auto }}</h2>
    </div>
    <hr>
    <div class="row">
        <div class="card col-lg-7">
            <div class="card-header bg-primary">
                <h3 class="card-title">Información del Vehículo</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Marca:</th>
                        <td>{{ $auto->marca }}</td>
                    </tr>
                    <tr>
                        <th>Modelo:</th>
                        <td>{{ $auto->modelo }}</td>
                    </tr>
                    <tr>
                        <th>Año:</th>
                        <td>{{ $auto->anio }}</td>
                    </tr>
                    <tr>
                        <th>Precio:</th>
                        <td>${{ number_format($auto->precio, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Estatus:</th>
                        <td>{{ $auto->estatus == 1 ? 'Activo' : 'Inactivo' }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('autos.index') }}" class="btn btn-primary">Regresar a la lista</a>
                <a href="{{ route('autos.edit', $auto->id_auto) }}" class="btn btn-success">Editar este auto</a>
            </div>
        </div>
    </div>
</div>
@endsection