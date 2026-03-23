@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Contratación</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Registrar <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Empleado</span></p>
    </div>

    <div class="card" style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px;">
        <div class="card-body p-5">
            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control lux-input" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Puesto / Cargo</label>
                        <input type="text" name="puesto" class="form-control lux-input" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Salario Mensual</label>
                        <input type="number" step="0.01" name="salario" class="form-control lux-input" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Fecha de Ingreso</label>
                        <input type="date" name="fecha_ingreso" class="form-control lux-input"
                            value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn-lux">Guardar Registro</button>
                    <a href="{{ route('empleados.index') }}" class="btn-regresar-blanco ml-3">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .lux-label {
        font-size: 0.6rem;
        color: #C9A24A;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 800;
        margin-bottom: 8px;
        display: block;
    }

    .lux-input {
        background: transparent !important;
        border: none !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: #fff !important;
        border-radius: 0 !important;
        padding: 10px 0 !important;
    }

    .lux-input:focus {
        border-bottom: 1px solid #C9A24A !important;
        box-shadow: none !important;
    }
</style>
@stop