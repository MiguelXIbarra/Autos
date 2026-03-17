@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Registrar Transacción de Venta</h2>
    </div>
    <hr>
    <form action="{{ route('ventas.store') }}" method="POST" class="row">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label>Seleccionar Vehículo</label>
                <select name="id_auto" class="form-control" required>
                    <option value="">-- Seleccione un Auto --</option>
                    @foreach($autos as $auto)
                    <option value="{{ $auto->id_auto }}">{{ $auto->marca }} {{ $auto->modelo }} (${{ $auto->precio }})
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Cliente</label>
                <select name="id_cliente" class="form-control" required>
                    <option value="">-- Seleccione el Cliente --</option>
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Vendedor (Empleado)</label>
                <select name="id_empleado" class="form-control" required>
                    <option value="">-- Seleccione el Vendedor --</option>
                    @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre }} ({{ $empleado->puesto }})
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Fecha y Monto Final</label>
                <div class="row">
                    <div class="col-6">
                        <input type="date" name="fecha_venta" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-6">
                        <input type="number" step="0.01" name="total" class="form-control" placeholder="Precio Final"
                            required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-success">Finalizar Venta</button>
            <a href="{{ route('ventas.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection