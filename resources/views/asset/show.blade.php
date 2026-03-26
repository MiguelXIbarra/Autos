@extends('layouts.page')

@section('content_body')
@php
$fileName = basename($asset->ruta);
$url = match($asset->tipo) {
'Imagen' => route('imageVideo', ['filename' => $fileName]),
'Video' => route('fileVideo', ['filename' => $fileName]),
'Documento' => route('fileDoc', ['filename' => $fileName]),
default => '#'
};
@endphp

<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Visualización</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px; line-height: 1;">
            Detalle del <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Asset</span>
        </p>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card"
                style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; overflow: hidden;">
                <div class="card-body p-4 text-center d-flex align-items-center justify-content-center"
                    style="min-height: 400px; background: rgba(0,0,0,0.5);">

                    @if($asset->tipo == 'Video')
                    <video controls class="w-100 shadow-lg"
                        style="max-height: 450px; border-radius: 10px; outline: none;">
                        <source src="{{ $url }}" type="video/mp4">
                        Tu navegador no soporta la reproducción de videos.
                    </video>
                    @elseif($asset->tipo == 'Imagen')
                    <img src="{{ $url }}" class="img-fluid rounded shadow-lg"
                        style="max-height: 450px; border: 1px solid rgba(201, 162, 74, 0.2);">
                    @elseif($asset->tipo == 'Documento')
                    <div class="text-center p-5">
                        <i class="fas fa-file-pdf fa-6x mb-4" style="color: #C9A24A;"></i>
                        <h5 class="text-white mb-4 italic">Documento Digital Cargado</h5>
                        <p class="text-muted mb-4">{{ $asset->ruta }}</p>
                        <a href="{{ $url }}" target="_blank" class="btn btn-outline-light px-5 py-2 italic"
                            style="border-radius: 0; letter-spacing: 1px;">
                            <i class="fas fa-external-link-alt mr-2"></i> ABRIR DOCUMENTO
                        </a>
                    </div>
                    @else
                    <div class="text-center p-5">
                        <i class="fas fa-file-alt fa-4x mb-3" style="color: #C9A24A;"></i>
                        <p class="text-white italic">Formato no reconocido.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card"
                style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px;">
                <div class="card-body p-5">
                    <div class="mb-4">
                        <label
                            style="font-size: 0.65rem; color: #C9A24A; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: block; margin-bottom: 5px;">Título</label>
                        <h4 class="text-white font-weight-bold">{{ $asset->titulo }}</h4>
                    </div>

                    <div class="mb-4">
                        <label
                            style="font-size: 0.65rem; color: #C9A24A; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: block; margin-bottom: 5px;">Categoría</label>
                        <p class="text-white italic">{{ $asset->tipo }}</p>
                    </div>

                    <div class="mb-4">
                        <label
                            style="font-size: 0.65rem; color: #C9A24A; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; display: block; margin-bottom: 5px;">Fecha
                            de Carga</label>
                        <p class="text-muted small">{{ $asset->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="mt-5 d-flex flex-column gap-3">
                        <a href="{{ route('asset.edit', $asset->id_asset) }}" class="btn"
                            style="background: #C9A24A; color: #000; font-weight: 900; text-transform: uppercase; font-size: 0.75rem; padding: 14px; border-radius: 4px; letter-spacing: 1px; text-align: center; text-decoration: none;">
                            EDITAR RECURSO
                        </a>
                        <a href="{{ route('asset.index') }}" class="text-center mt-3"
                            style="color: #4a86e8; text-decoration: none; font-size: 0.85rem; font-weight: 500;">
                            Volver a la Galería
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop