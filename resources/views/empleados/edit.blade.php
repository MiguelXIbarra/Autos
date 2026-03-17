@extends('layouts.page')

@section('content_body')
<div class="container">
    <div class="row">
        <h2>Editar Empleado: {{ $empleado->nombre }}</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST" class="col-lg-7">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre }}"
                    required />
            </div>
            <div class="form-group">
                <label for="puesto">Puesto</label>
                <input type="text" class="form-control" id="puesto" name="puesto" value="{{ $empleado->puesto }}"
                    required />
            </div>
            <div class="form-group">
                <label for="salario">Salario Mensual</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="salario" name="salario"
                        value="{{ $empleado->salario }}" required />
                </div>
            </div>
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso"
                    value="{{ $empleado->fecha_ingreso }}" required />
            </div>
            <br>
            <button type="submit" class="btn btn-success">Actualizar Empleado</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-danger">Volver</a>
        </form>
    </div>
</div>
@endsection