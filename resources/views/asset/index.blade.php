@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
                Biblioteca Multimedia</h2>
            <p class="text-white italic"
                style="font-size: 2.8rem; font-weight: 200; letter-spacing: -1px; line-height: 1;">
                Gestión de <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Assets</span>
            </p>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('asset.create') }}" class="btn-lux">
                <i class="fas fa-cloud-upload-alt mr-2"></i> Subir Recurso
            </a>
            <a href="{{ route('home') }}" class="btn-regresar-blanco">Regresar</a>
        </div>
    </div>

    <div class="card"
        style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0" style="background: transparent;">
                    <thead>
                        <tr>
                            <th
                                style="color: #C9A24A; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 2px; border: none; padding: 20px;">
                                ID</th>
                            <th
                                style="color: #C9A24A; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 2px; border: none;">
                                Recurso</th>
                            <th
                                style="color: #C9A24A; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 2px; border: none;">
                                Tipo</th>
                            <th
                                style="color: #C9A24A; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 2px; border: none;">
                                Fecha</th>
                            <th style="color: #C9A24A; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 2px; border: none;"
                                class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assets as $item)
                        <tr>
                            <td class="align-middle px-4"
                                style="border-top: 1px solid rgba(255,255,255,0.05); color: rgba(255,255,255,0.3);">
                                #{{ str_pad($item['id'], 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="align-middle" style="border-top: 1px solid rgba(255,255,255,0.05);">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3 d-flex align-items-center justify-content-center"
                                        style="width: 35px; height: 35px; background: rgba(201, 162, 74, 0.1); border-radius: 8px; color: #C9A24A;">
                                        @if($item['tipo'] == 'Video') <i class="fas fa-video"></i>
                                        @elseif($item['tipo'] == 'Imagen') <i class="fas fa-image"></i>
                                        @else <i class="fas fa-file-alt"></i> @endif
                                    </div>
                                    <span class="text-white font-weight-bold italic">{{ $item['nombre'] }}</span>
                                </div>
                            </td>
                            <td class="align-middle text-muted" style="border-top: 1px solid rgba(255,255,255,0.05);">{{
                                $item['tipo'] }}</td>
                            <td class="align-middle text-muted" style="border-top: 1px solid rgba(255,255,255,0.05);">{{
                                $item['fecha'] }}</td>
                            <td class="text-center align-middle" style="border-top: 1px solid rgba(255,255,255,0.05);">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('asset.show', $item['id']) }}" class="btn-action text-info"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('asset.edit', $item['id']) }}"
                                        class="btn-action text-warning mx-2"><i class="fas fa-pen-nib"></i></a>
                                    <a href="{{ route('asset.destroy', $item['id']) }}" class="btn-action text-danger"
                                        onclick="return confirm('¿Eliminar recurso?')"><i class="fas fa-ghost"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-action {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: 0.3s;
    }

    .btn-action:hover {
        background: rgba(201, 162, 74, 0.1);
        border-color: #C9A24A;
        transform: translateY(-2px);
    }
</style>
@stop