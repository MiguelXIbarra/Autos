@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Expediente de Seguridad</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Perfil de <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Usuario</span></p>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card card-luxure">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <div class="avatar-display mx-auto mb-4">
                            {{ strtoupper(substr($usuario->name, 0, 1)) }}
                        </div>
                        <h3 class="text-white font-weight-bold italic">{{ $usuario->name }}</h3>
                        <p style="color: #C9A24A; font-size: 0.65rem; letter-spacing: 3px;" class="uppercase">Acceso
                            Autorizado</p>
                    </div>

                    <div class="info-group mb-4">
                        <label class="info-label">Identificador de Sistema</label>
                        <p class="info-value">#{{ str_pad($usuario->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <div class="info-group mb-4">
                        <label class="info-label">Credencial de Correo</label>
                        <p class="info-value">{{ $usuario->email }}</p>
                    </div>

                    <div class="info-group mb-5">
                        <label class="info-label">Fecha de Registro</label>
                        <p class="info-value">{{ $usuario->created_at->format('d M, Y') }}</p>
                    </div>

                    <div class="d-flex gap-3 pt-4 border-t border-white/5">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn-lux">Editar Perfil</a>
                        <a href="{{ route('usuarios.index') }}" class="btn-regresar-blanco">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-luxure {
        background: #0D0D0D !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 20px !important;
    }

    .avatar-display {
        width: 100px;
        height: 100px;
        background: linear-gradient(45deg, #C9A24A, #8a6d2e);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        font-size: 3rem;
        font-weight: 900;
    }

    .info-label {
        display: block;
        color: #C9A24A;
        text-transform: uppercase;
        font-size: 0.6rem;
        letter-spacing: 2px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .info-value {
        color: #fff;
        font-size: 1.1rem;
        font-style: italic;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding-bottom: 8px;
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
        display: inline-block;
    }

    .btn-lux:hover {
        background: #fff !important;
        box-shadow: 0 0 20px rgba(201, 162, 74, 0.4);
    }

    .btn-regresar-blanco {
        padding: 12px 30px;
        background: transparent;
        color: #fff !important;
        border: 1px solid #fff;
        border-radius: 4px;
        text-transform: uppercase;
        font-weight: 900;
        font-size: 0.7rem;
        letter-spacing: 1px;
        transition: 0.3s;
        text-decoration: none !important;
        display: inline-block;
    }

    .btn-regresar-blanco:hover {
        background: #fff;
        color: #000 !important;
    }
</style>
@stop