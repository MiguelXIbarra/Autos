@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Seguridad</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px; line-height: 1;">
            Registrar <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Usuario</span>
        </p>
    </div>

    <div class="card card-luxure"
        style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px;">
        <div class="card-body p-5">
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Nombre de Usuario / Alias</label>
                        <input type="text" name="name" class="form-control lux-input" placeholder="Ej. Admin_Luxure"
                            required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control lux-input" placeholder="correo@ejemplo.com"
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Contraseña</label>
                        <input type="password" name="password" class="form-control lux-input" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control lux-input" required>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn-lux">Crear Cuenta</button>
                    <a href="{{ route('usuarios.index') }}" class="btn-regresar-blanco ml-3">Cancelar</a>
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
    }

    .btn-lux:hover {
        background: #e0b75a !important;
        transform: translateY(-2px);
    }

    .btn-regresar-blanco {
        padding: 12px 30px;
        border: 1px solid #fff;
        color: #fff !important;
        border-radius: 4px;
        text-transform: uppercase;
        font-weight: 900;
        font-size: 0.7rem;
        transition: 0.3s;
        text-decoration: none !important;
    }
</style>
@stop