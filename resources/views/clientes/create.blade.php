@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Registrar Nuevo Cliente</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('clientes.store') }}" method="POST" class="col-lg-7">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" required />
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}"
                    required />
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" required />
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}"
                    required />
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}"
                    required />
            </div>
            <br>
            <button type="submit" class="btn btn-success">Guardar Cliente</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>
@endsection