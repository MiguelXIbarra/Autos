@extends('layouts.page')

@section('content_body')
<div class="container">
    <div class="row">
        <h2>Detalle del Recurso</h2>
    </div>
    <hr>
    <div class="row">
        <div class="card col-lg-8 card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">{{ $asset->nombre }}</h3>
            </div>
            <div class="card-body text-center">
                @if($asset->tipo == 'Imagen')
                <img src="{{ $asset->ruta }}" class="img-fluid rounded" style="max-height: 400px;">
                @else
                <div class="p-5 bg-light border rounded">
                    <i class="fas fa-file-alt fa-5x text-secondary"></i>
                    <p class="mt-3">Este recurso es de tipo: <strong>{{ $asset->tipo }}</strong></p>
                    <a href="{{ $asset->ruta }}" target="_blank">{{ $asset->ruta }}</a>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('asset.index') }}" class="btn btn-secondary">Regresar</a>
                <a href="{{ route('asset.edit', $asset->id_asset) }}" class="btn btn-success">Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection