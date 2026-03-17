@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Venta Folio #{{ $venta->id_venta }}</h2>
    </div>
    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('ventas.update', $venta->id_venta) }}" method="POST" class="row">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <div class="form-group">
                <label>Vehículo</label>
                <select name="id_auto" class="form-control">
                    @foreach($autos as $auto)
                    <option value="{{ $auto->id_auto }}" {{ $venta->id_auto == $auto->id_auto ? 'selected' : '' }}>
                        {{ $auto->marca }} {{ $auto->modelo }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Cliente</label>
                <select name="id_cliente" class="form-control">
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ $venta->id_cliente == $cliente->id_cliente ?
                        'selected' : '' }}>
                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Vendedor</label>
                <select name="id_empleado" class="form-control">
                    @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id_empleado }}" {{ $venta->id_empleado == $empleado->id_empleado ?
                        'selected' : '' }}>
                        {{ $empleado->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Fecha de Venta</label>
                <input type="date" name="fecha_venta" class="form-control" value="{{ $venta->fecha_venta }}">
            </div>
            <div class="form-group">
                <label>Monto</label>
                <input type="number" step="0.01" name="total" class="form-control" value="{{ $venta->total }}">
            </div>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Actualizar Venta</button>
            <a href="{{ route('ventas.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection