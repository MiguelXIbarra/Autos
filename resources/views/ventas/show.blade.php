@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Comprobante de Operación</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Detalle de <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Venta</span></p>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card card-luxure">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between mb-5">
                        <span class="badge"
                            style="background: #C9A24A; color: #000; font-weight: 900; padding: 10px 20px;">VENTA #{{
                            $venta->id_venta }}</span>
                        <span class="text-muted italic">{{ date('d M, Y', strtotime($venta->fecha_venta)) }}</span>
                    </div>

                    <div class="mb-4">
                        <p class="lux-label">Vehículo Vendido</p>
                        <h3 class="text-white italic">{{ $venta->auto->marca }} {{ $venta->auto->modelo }}</h3>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <p class="lux-label">Cliente</p>
                            <p class="text-white">{{ $venta->cliente->nombre }}</p>
                        </div>
                        <div class="col-6">
                            <p class="lux-label">Vendedor</p>
                            <p class="text-white">{{ $venta->empleado->nombre }}</p>
                        </div>
                    </div>

                    <div class="border-t border-white/5 pt-4 mt-4">
                        <p class="lux-label">Importe Total</p>
                        <h2 style="color: #C9A24A; font-weight: 900;">${{ number_format($venta->total, 2) }}</h2>
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('ventas.index') }}" class="btn-regresar-blanco">Volver al Panel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop