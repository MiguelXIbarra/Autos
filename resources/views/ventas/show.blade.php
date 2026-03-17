@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="card card-outline card-success mt-4">
        <div class="card-header">
            <h3 class="card-title">Comprobante de Venta #{{ $venta->id_venta }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <strong>Cliente:</strong><br>
                    {{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}<br>
                    {{ $venta->cliente->correo }}
                </div>
                <div class="col-sm-4">
                    <strong>Vehículo:</strong><br>
                    {{ $venta->auto->marca }} {{ $venta->auto->modelo }} ({{ $venta->auto->anio }})
                </div>
                <div class="col-sm-4 text-right">
                    <strong>Fecha:</strong> {{ $venta->fecha_venta }}<br>
                    <strong>Vendedor:</strong> {{ $venta->empleado->nombre }}
                </div>
            </div>
            <hr>
            <div class="text-right">
                <h3>Total Pagado: <span class="text-success">${{ number_format($venta->total, 2) }}</span></h3>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('ventas.index') }}" class="btn btn-default">Regresar</a>
            <button onclick="window.print()" class="btn btn-info"><i class="fas fa-print"></i> Imprimir</button>
        </div>
    </div>
</div>
@endsection