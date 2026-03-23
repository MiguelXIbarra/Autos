@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
                Registro de Operaciones</h2>
            <p class="text-white italic"
                style="font-size: 2.8rem; font-weight: 200; letter-spacing: -1px; line-height: 1;">
                Panel de <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Ventas</span>
            </p>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('ventas.create') }}" class="btn-lux">
                <i class="fas fa-plus-circle mr-2"></i> Nueva Venta
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
                            <th>Vehículo</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $item)
                        <tr>
                            <td class="px-4 align-middle"><span class="text-id">#{{ str_pad($item['id'], 4, '0',
                                    STR_PAD_LEFT) }}</span></td>
                            <td class="align-middle text-white font-weight-bold italic">{{ $item['auto'] }}</td>
                            <td class="align-middle text-muted">{{ $item['cliente'] }}</td>
                            <td class="align-middle text-muted">{{ $item['empleado'] }}</td>
                            <td class="align-middle text-[#C9A24A] font-weight-bold">{{ $item['total'] }}</td>
                            <td class="align-middle text-muted">{{ $item['fecha'] }}</td>
                            <td class="text-center align-middle">
                                <div class="acciones-container">
                                    <a href="{{ route('ventas.show', $item['id']) }}" class="icon-btn text-info"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('ventas.edit', $item['id']) }}"
                                        class="icon-btn text-warning mx-2"><i class="fas fa-pen-nib"></i></a>
                                    <a href="{{ route('ventas.destroy', $item['id']) }}" class="icon-btn text-danger"
                                        onclick="return confirm('¿Anular esta venta?')"><i class="fas fa-ghost"></i></a>
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
        text-decoration: none !important;
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
    }

    .icon-btn:hover {
        background: rgba(201, 162, 74, 0.1) !important;
        transform: translateY(-2px);
        border-color: #C9A24A !important;
    }

    .btn-lux {
        background: #C9A24A !important;
        color: #000 !important;
        font-weight: 900;
        text-transform: uppercase;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 0.7rem;
        letter-spacing: 1px;
        text-decoration: none !important;
    }

    .btn-regresar-blanco {
        padding: 10px 25px;
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