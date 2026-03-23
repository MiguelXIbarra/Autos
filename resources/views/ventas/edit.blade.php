@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">Ajuste
            de Registro</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Editar <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Venta</span></p>
    </div>

    <div class="card card-luxure">
        <div class="card-body p-5">
            {{-- SE PASA EL ID EXPLÍCITO PARA EVITAR EL URLGENERATIONEXCEPTION --}}
            <form action="{{ route('ventas.update', $venta->id_venta) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Monto Total</label>
                        <input type="number" step="0.01" name="total" class="form-control lux-input"
                            value="{{ $venta->total }}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Fecha de Venta</label>
                        <input type="date" name="fecha_venta" class="form-control lux-input"
                            value="{{ $venta->fecha_venta }}">
                    </div>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn-lux">Actualizar Datos</button>
                    <a href="{{ route('ventas.index') }}" class="btn-regresar-blanco ml-3">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop