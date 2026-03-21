@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Actualizar Credenciales</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Editar <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Usuario</span></p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-luxure">
                <div class="card-body p-5">
                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label class="text-[#C9A24A] uppercase tracking-widest font-bold mb-2"
                                style="font-size: 0.6rem; color: #C9A24A;">Nombre Completo</label>
                            <input type="text" name="name" class="form-control lux-input" value="{{ $usuario->name }}"
                                required>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-[#C9A24A] uppercase tracking-widest font-bold mb-2"
                                style="font-size: 0.6rem; color: #C9A24A;">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control lux-input"
                                value="{{ $usuario->email }}" required>
                        </div>
                        <div class="mt-5 pt-3 border-t border-white/5">
                            <p class="text-gray-500 text-[0.6rem] uppercase mb-4 italic">Dejar en blanco para mantener
                                contraseña actual</p>
                            <div class="form-group mb-4">
                                <label class="text-[#C9A24A] uppercase tracking-widest font-bold mb-2"
                                    style="font-size: 0.6rem; color: #C9A24A;">Nueva Contraseña</label>
                                <input type="password" name="password" class="form-control lux-input">
                            </div>
                            <div class="form-group mb-5">
                                <label class="text-[#C9A24A] uppercase tracking-widest font-bold mb-2"
                                    style="font-size: 0.6rem; color: #C9A24A;">Confirmar Nueva Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control lux-input">
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn-lux">Actualizar Registro</button>
                            <a href="{{ route('usuarios.index') }}" class="btn-regresar-blanco">Cancelar</a>
                        </div>
                    </form>
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