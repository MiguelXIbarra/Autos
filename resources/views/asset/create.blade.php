@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">Nuevo
            Recurso</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Subir <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Asset</span></p>
    </div>

    <div class="card card-luxure"
        style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px;">
        <div class="card-body p-5">
            <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 mb-4">
                        <label class="lux-label">Título del Recurso</label>
                        <input type="text" name="titulo" class="form-control lux-input"
                            placeholder="Ej. Manual de Usuario" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="lux-label">Tipo de Asset</label>
                        <select name="tipo" class="form-control lux-input" required>
                            <option value="Imagen">Imagen</option>
                            <option value="Video">Video</option>
                            <option value="Documento">Documento</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="lux-label">Seleccionar Archivo</label>
                    <input type="file" name="archivo" class="form-control lux-input" required>
                    <small class="text-muted italic">Formatos admitidos: JPG, PNG, MP4, PDF, DOCX.</small>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn-lux">Guardar Asset</button>
                    <a href="{{ route('asset.index') }}" class="btn-regresar-blanco ml-3">Cancelar</a>
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