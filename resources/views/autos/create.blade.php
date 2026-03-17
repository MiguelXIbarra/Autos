@extends('adminlte::page')

@section('title', 'Crear Auto Deportivo')

@section('content')
<div class="container">
    <h2>Crear Nuevo Auto Deportivo</h2>

    <!-- Alertas flash -->
    @include('partials.alerts')

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('autos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nombre del Auto</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label>Email del Propietario</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Cliente Asociado</label>
            <select name="cliente_id" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Imagen del Auto</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-2">Guardar Auto</button>
    </form>
</div>
@endsection
