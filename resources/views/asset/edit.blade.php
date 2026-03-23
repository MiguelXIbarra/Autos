@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Mantenimiento</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Editar <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Asset</span></p>
    </div>

    <div class="card card-luxure">
        <div class="card-body p-5">
            <form action="{{ route('asset.update', $asset->id_asset) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8 mb-4">
                        <label class="lux-label">Título</label>
                        <input type="text" name="titulo" class="form-control lux-input" value="{{ $asset->titulo }}"
                            required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="lux-label">Tipo</label>
                        <select name="tipo" class="form-control lux-input">
                            <option value="Imagen" {{ $asset->tipo == 'Imagen' ? 'selected' : '' }}>Imagen</option>
                            <option value="Video" {{ $asset->tipo == 'Video' ? 'selected' : '' }}>Video</option>
                            <option value="Documento" {{ $asset->tipo == 'Documento' ? 'selected' : '' }}>Documento
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="lux-label">Archivo Multimedia (Dejar vacío para conservar actual)</label>
                    <input type="file" name="archivo" class="form-control lux-input">
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn-lux">Guardar Cambios</button>
                    <a href="{{ route('asset.index') }}" class="btn-regresar-blanco ml-3">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop