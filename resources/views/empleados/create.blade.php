@extends('layouts.page')

@section('content_body')
<div class="container">
    <div class="row">
        <h2>Registrar Nuevo Empleado</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('empleados.store') }}" method="POST" class="col-lg-7">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" required />
            </div>
            <div class="form-group">
                <label for="puesto">Puesto</label>
                <input type="text" class="form-control" id="puesto" name="puesto" value="{{old('puesto')}}" required />
            </div>
            <div class="form-group">
                <label for="salario">Salario Mensual</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="salario" name="salario"
                        value="{{old('salario')}}" required />
                </div>
            </div>
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso"
                    value="{{old('fecha_ingreso')}}" required />
            </div>
            <br>
            <button type="submit" class="btn btn-success">Guardar Empleado</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>
@endsection