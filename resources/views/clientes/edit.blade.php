@extends('layouts.page')

@section('content_body')
<div class="container">
    <div class="row">
        <h2>Editar Cliente: {{ $cliente->nombre }} {{ $cliente->apellido }}</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="post" class="col-lg-7">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}"
                    required />
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $cliente->apellido }}"
                    required />
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" value="{{ $cliente->correo }}"
                    required />
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}"
                    required />
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion"
                    value="{{ $cliente->direccion }}" required />
            </div>
            <br>
            <button type="submit" class="btn btn-success">Actualizar Datos</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-danger">Volver</a>
        </form>
    </div>
</div>
@endsection