@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Mantenimiento de Unidad</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Editar <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Vehículo</span></p>
    </div>

    <div class="card card-luxure">
        <div class="card-body p-5">
            <form action="{{ route('autos.update', $auto->id_auto) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Marca</label>
                        <input type="text" name="marca" class="form-control lux-input" value="{{ $auto->marca }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control lux-input" value="{{ $auto->modelo }}"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Año</label>
                        <input type="number" name="anio" class="form-control lux-input" value="{{ $auto->anio }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control lux-input"
                            value="{{ $auto->precio }}" required>
                    </div>
                </div>
                <div class="mt-5 d-flex gap-3">
                    <button type="submit" class="btn-lux">Guardar Cambios</button>
                    <a href="{{ route('autos.index') }}" class="btn-regresar-blanco ml-3">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .card-luxure {
        background: #0D0D0D !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 20px !important;
    }

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
        font-style: italic;
    }

    .lux-input:focus {
        border-bottom: 1px solid #C9A24A !important;
        box-shadow: none !important;
    }

    .btn-lux {
        background: #C9A24A !important;
        color: #000 !important;
        font-weight: 900;
        text-transform: uppercase;
        border: none;
        padding: 12px 30px;
        border-radius: 4px;
        font-size: 0.7rem;
        letter-spacing: 1px;
        transition: 0.3s;
        text-decoration: none !important;
    }

    .btn-regresar-blanco {
        padding: 12px 30px;
        border: 1px solid #fff;
        color: #fff !important;
        border-radius: 4px;
        text-transform: uppercase;
        font-weight: 900;
        font-size: 0.7rem;
        text-decoration: none !important;
    }
</style>
@stop