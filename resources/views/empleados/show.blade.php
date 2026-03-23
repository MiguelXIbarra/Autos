@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Expediente</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px; line-height: 1;">
            Perfil del <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Empleado</span>
        </p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card"
                style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px;">
                <div class="card-body p-5 text-center">
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center"
                        style="width: 100px; height: 100px; background: rgba(201, 162, 74, 0.1); border-radius: 50%; border: 1px solid rgba(201, 162, 74, 0.3);">
                        <i class="fas fa-user-tie fa-3x" style="color: #C9A24A;"></i>
                    </div>
                    <h4 class="text-white font-weight-bold mb-1">{{ $empleado->nombre }}</h4>
                    <p class="text-muted italic mb-4">{{ $empleado->puesto }}</p>

                    <div class="pt-4" style="border-top: 1px solid rgba(255,255,255,0.05);">
                        <span class="badge px-3 py-2"
                            style="background: rgba(40, 167, 69, 0.1); color: #28a745; border: 1px solid #28a745; font-size: 0.6rem; letter-spacing: 1px;">
                            ACTIVO
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card"
                style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px;">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <label
                                style="font-size: 0.65rem; color: #C9A24A; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: block; margin-bottom: 10px;">ID
                                de Registro</label>
                            <p class="text-white font-weight-light" style="font-size: 1.2rem;">#EMP-{{
                                str_pad($empleado->id_empleado, 4, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <div class="col-md-6 mb-5">
                            <label
                                style="font-size: 0.65rem; color: #C9A24A; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: block; margin-bottom: 10px;">Salario
                                Mensual</label>
                            <p class="text-white font-weight-light"
                                style="font-size: 1.2rem; color: #C9A24A !important;">$ {{
                                number_format($empleado->salario, 2) }} MXN</p>
                        </div>
                        <div class="col-md-6 mb-5">
                            <label
                                style="font-size: 0.65rem; color: #C9A24A; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: block; margin-bottom: 10px;">Fecha
                                de Ingreso</label>
                            <p class="text-white font-weight-light" style="font-size: 1.2rem;">{{ date('d \d\e F, Y',
                                strtotime($empleado->fecha_ingreso)) }}</p>
                        </div>
                        <div class="col-md-6 mb-5">
                            <label
                                style="font-size: 0.65rem; color: #C9A24A; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: block; margin-bottom: 10px;">Antigüedad</label>
                            <p class="text-white font-weight-light" style="font-size: 1.2rem;">
                                {{ \Carbon\Carbon::parse($empleado->fecha_ingreso)->diffForHumans(null, true) }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 d-flex gap-3" style="border-top: 1px solid rgba(255,255,255,0.05);">
                        <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="btn"
                            style="background: #C9A24A; color: #000; font-weight: 900; text-transform: uppercase; font-size: 0.7rem; padding: 12px 25px; border-radius: 4px; letter-spacing: 1px; text-decoration: none;">
                            <i class="fas fa-edit mr-2"></i> Editar Perfil
                        </a>
                        <a href="{{ route('empleados.index') }}" class="btn"
                            style="border: 1px solid #fff; color: #fff; font-weight: 900; text-transform: uppercase; font-size: 0.7rem; padding: 12px 25px; border-radius: 4px; letter-spacing: 1px; text-decoration: none;">
                            Volver al Listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop