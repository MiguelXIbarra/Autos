@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h2 class="text-[#C9A24A] font-black uppercase tracking-[0.5em] mb-2"
                style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;">Biblioteca Multimedia</h2>
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

    <div class="card card-luxure">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="luxureTable" class="table mb-0">
                    <thead>
                        <tr>
                            <th class="px-4">ID</th>
                            <th>Recurso</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assets as $item)
                        <tr>
                            <td class="px-4 align-middle">
                                <span class="text-id">#{{ str_pad($item['id'], 4, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="align-middle text-white font-weight-bold italic">
                                {{ $item['nombre'] }}
                            </td>
                            <td class="align-middle text-muted">{{ $item['tipo'] }}</td>
                            <td class="align-middle text-muted">{{ $item['fecha'] }}</td>
                            <td class="text-center align-middle">
                                <div class="acciones-container">
                                    <a href="{{ route('asset.show', $item['id']) }}" class="icon-btn text-info"
                                        title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('asset.edit', $item['id']) }}" class="icon-btn text-warning mx-2"
                                        title="Editar">
                                        <i class="fas fa-pen-nib"></i>
                                    </a>
                                    <a href="{{ route('asset.destroy', $item['id']) }}" class="icon-btn text-danger"
                                        onclick="return confirm('¿Eliminar recurso?')" title="Eliminar">
                                        <i class="fas fa-ghost"></i>
                                    </a>
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
    .card-luxure {
        background: #0D0D0D !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 20px !important;
    }

    .table {
        background: transparent !important;
    }

    th {
        color: #C9A24A !important;
        text-transform: uppercase;
        font-size: 0.65rem;
        letter-spacing: 2px;
        border: none !important;
        padding: 20px 10px !important;
    }

    td {
        border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
        padding: 15px 10px !important;
        vertical-align: middle;
    }

    .text-id {
        color: rgba(255, 255, 255, 0.2);
        font-family: monospace;
    }

    .acciones-container {
        display: flex !important;
        gap: 8px;
        justify-content: center;
        align-items: center;
    }

    .icon-btn {
        display: inline-flex !important;
        width: 38px !important;
        height: 38px !important;
        align-items: center !important;
        justify-content: center !important;
        background: rgba(255, 255, 255, 0.03) !important;
        border-radius: 12px !important;
        transition: 0.3s;
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
        text-decoration: none !important;
    }

    .icon-btn:hover {
        background: rgba(201, 162, 74, 0.1) !important;
        transform: translateY(-2px);
        border-color: #C9A24A !important;
    }

    .btn-lux {
        background: #C9A24A;
        color: #000;
        font-weight: 900;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none !important;
        font-size: 0.7rem;
        text-transform: uppercase;
    }

    .btn-regresar-blanco {
        border: 1px solid #fff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none !important;
        font-size: 0.7rem;
        text-transform: uppercase;
    }
</style>
@stop