@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Visualización de Recurso</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Detalle del
            <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Asset</span></p>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-luxure overflow-hidden">
                <div class="card-body p-0">
                    <div class="preview-container bg-black d-flex align-items-center justify-content-center"
                        style="min-height: 400px;">
                        @if($asset->tipo == 'Video')
                        <video controls class="w-100" style="max-height: 500px;">
                            <source src="{{ asset('storage/assets/'.$asset->archivo) }}" type="video/mp4">
                            Tu navegador no soporta videos.
                        </video>
                        @else
                        <img src="{{ asset('storage/assets/'.$asset->archivo) }}" class="img-fluid"
                            style="max-height: 500px;">
                        @endif
                    </div>
                    <div class="p-5">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-white font-weight-bold italic mb-1">{{ $asset->nombre }}</h4>
                                <p style="color: #C9A24A; font-size: 0.65rem; letter-spacing: 3px;" class="uppercase">{{
                                    $asset->tipo }}</p>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <p class="text-muted small">Subido el: {{ $asset->created_at->format('d M, Y') }}</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-white/5">
                            <p class="text-gray-400 italic">{{ $asset->descripcion ?? 'Sin descripción disponible.' }}
                            </p>
                        </div>
                        <div class="d-flex gap-3 mt-5">
                            <a href="{{ route('asset.edit', $asset->id) }}" class="btn-lux">Editar Asset</a>
                            <a href="{{ route('asset.index') }}" class="btn-regresar-blanco">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop