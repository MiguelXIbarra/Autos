@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">Nuevo
            Recurso</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Subir <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Asset</span></p>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card card-luxure">
                <div class="card-body p-5">
                    <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="lux-label">Nombre del Asset</label>
                            <input type="text" name="nombre" class="form-control lux-input"
                                placeholder="Ej. Video Promocional 2024" required>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="lux-label">Tipo de Archivo</label>
                                <select name="tipo" class="form-control lux-input" required>
                                    <option value="Imagen">Imagen</option>
                                    <option value="Video">Video</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="lux-label">Archivo Multimedia</label>
                                <input type="file" name="archivo" class="form-control lux-input" required>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label class="lux-label">Descripción Breve</label>
                            <textarea name="descripcion" class="form-control lux-input" rows="3"></textarea>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn-lux">Guardar Asset</button>
                            <a href="{{ route('asset.index') }}" class="btn-regresar-blanco">Cancelar</a>
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
        background: #fff !important;
        box-shadow: 0 0 20px rgba(201, 162, 74, 0.4);
    }
</style>
@stop