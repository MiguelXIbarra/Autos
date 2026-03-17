@extends('layouts.page')

@section('content_body')
<div class="container">
    <div class="row">
        <h2>Expediente del Empleado</h2>
    </div>
    <hr>
    <div class="row">
        <div class="card col-lg-8 border-primary">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Información del Empleado #{{ $empleado->id_empleado }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <tr>
                                <th style="width: 30%">Nombre Completo:</th>
                                <td>{{ $empleado->nombre }}</td>
                            </tr>
                            <tr>
                                <th>Puesto Actual:</th>
                                <td>{{ $empleado->puesto }}</td>
                            </tr>
                            <tr>
                                <th>Salario:</th>
                                <td><span class="text-success font-weight-bold">${{ number_format($empleado->salario, 2)
                                        }}</span></td>
                            </tr>
                            <tr>
                                <th>Fecha de Ingreso:</th>
                                <td>{{ \Carbon\Carbon::parse($empleado->fecha_ingreso)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Estatus:</th>
                                <td>
                                    <span class="badge badge-success">Activo</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Regresar a la lista</a>
                <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="btn btn-success">Editar
                    Expediente</a>
            </div>
        </div>
    </div>
</div>
@endsection