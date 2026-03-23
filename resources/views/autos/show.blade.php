@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Expediente de Unidad</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Detalle del
            <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Vehículo</span></p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-luxure">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <div class="d-inline-block p-4 rounded-circle border border-[#C9A24A] mb-3">
                            <i class="fas fa-car-side fa-3x" style="color: #C9A24A;"></i>
                        </div>
                        <h3 class="text-white italic font-weight-bold mb-0">{{ $auto->marca }} {{ $auto->modelo }}</h3>
                        <p class="text-muted uppercase" style="letter-spacing: 3px; font-size: 0.7rem;">ID de Registro:
                            #{{ $auto->id_auto }}</p>
                    </div>

                    <div class="border-t border-white/5 pt-4">
                        <div class="row mb-3">
                            <div class="col-6 lux-label">Año de Fabricación</div>
                            <div class="col-6 text-white text-right italic font-weight-bold">{{ $auto->anio }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 lux-label">Precio de Venta</div>
                            <div class="col-6 text-right font-weight-bold" style="color: #C9A24A; font-size: 1.2rem;">
                                ${{ number_format($auto->precio, 2) }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 lux-label">Estado en Sistema</div>
                            <div class="col-6 text-right">
                                <span class="badge"
                                    style="background: rgba(201, 162, 74, 0.2); color: #C9A24A; border: 1px solid #C9A24A;">ACTIVO</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center d-flex justify-content-center gap-3">
                        <a href="{{ route('autos.index') }}" class="btn-regresar-blanco">Volver al Panel</a>
                        <a href="{{ route('autos.edit', $auto->id_auto) }}" class="btn-lux">Editar Unidad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop