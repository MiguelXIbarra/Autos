@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Actualizar Recurso</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Editar <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Asset</span></p>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card card-luxure">
                <div class="card-body p-5">
                    <form action="{{ route('asset.update', $asset->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label class="lux-label">Nombre del Asset</label>
                            <input type="text" name="nombre" class="form-control lux-input" value="{{ $asset->nombre }}"
                                required>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="lux-label">Tipo</label>
                                <select name="tipo" class="form-control lux-input">
                                    <option value="Imagen" {{ $asset->tipo == 'Imagen' ? 'selected' : '' }}>Imagen
                                    </option>
                                    <option value="Video" {{ $asset->tipo == 'Video' ? 'selected' : '' }}>Video</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="lux-label">Reemplazar Archivo (Opcional)</label>
                                <input type="file" name="archivo" class="form-control lux-input">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label class="lux-label">Descripción</label>
                            <textarea name="descripcion" class="form-control lux-input"
                                rows="3">{{ $asset->descripcion }}</textarea>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn-lux">Actualizar Registro</button>
                            <a href="{{ route('asset.index') }}" class="btn-regresar-blanco">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop