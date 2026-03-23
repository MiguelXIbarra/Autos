@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">Alta de
            Cliente</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Nuevo <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Prospecto</span></p>
    </div>

    <div class="card card-luxure">
        <div class="card-body p-5">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Nombre(s)</label>
                        <input type="text" name="nombre" class="form-control lux-input" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Apellido(s)</label>
                        <input type="text" name="apellido" class="form-control lux-input" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Correo Electrónico</label>
                        <input type="email" name="correo" class="form-control lux-input" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control lux-input" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="lux-label">Dirección Particular</label>
                    <textarea name="direccion" class="form-control lux-input" rows="2" required></textarea>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn-lux">Registrar Cliente</button>
                    <a href="{{ route('clientes.index') }}" class="btn-regresar-blanco ml-3">Cancelar</a>
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
        font-style: italic;
    }

    .lux-input:focus {
        border-bottom: 1px solid #C9A24A !important;
        box-shadow: none !important;
    }
</style>
@stop