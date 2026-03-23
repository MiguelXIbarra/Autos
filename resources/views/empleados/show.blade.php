@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">Ficha de Colaborador</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Perfil de <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Empleado</span></p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-luxure">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <div class="d-inline-block p-3 rounded-circle border border-[#C9A24A] mb-3">
                            <i class="fas fa-user-tie fa-4x" style="color: #C9A24A;"></i>
                        </div>
                        <h3 class="text-white italic font-weight-bold">{{ $empleado->nombre }}</h3>
                        <p style="color: #C9A24A; letter-spacing: 2px; font-size: 0.8rem;" class="text-uppercase">{{ $empleado->puesto }}</p>
                    </div>

                    <div class="border-t border-white/5 pt-4">
                        <div class="row mb-3">
                            <div class="col-4 lux-label">Email</div>
                            <div class="col-8 text-white italic">{{ $empleado->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 lux-label">Teléfono</div>
                            <div class="col-8 text-white italic">{{ $empleado->telefono }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 lux-label">Fecha Ingreso</div>
                            <div class="col-8 text-white italic">{{ date('d M, Y', strtotime($empleado->fecha_ingreso)) }}</div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <a href="{{ route('empleados.index') }}" class="btn-regresar-blanco">Volver al Panel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop