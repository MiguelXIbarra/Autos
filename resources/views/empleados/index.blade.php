@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
                Administración</h2>
            <p class="text-white italic"
                style="font-size: 2.8rem; font-weight: 200; letter-spacing: -1px; line-height: 1;">
                Gestión de <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Empleados</span>
            </p>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('empleados.create') }}" class="btn-lux">
                <i class="fas fa-user-plus mr-2"></i> Nuevo Empleado
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
                            <th class="lux-th">Nombre</th>
                            <th class="lux-th">Puesto</th>
                            <th class="lux-th">Salario</th>
                            <th class="lux-th">Ingreso</th>
                            <th class="lux-th text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $item)
                        <tr>
                            <td class="align-middle px-4" style="border-top: 1px solid rgba(255,255,255,0.05);">
                                <span class="text-white font-weight-bold italic">{{ $item['nombre'] }}</span>
                            </td>
                            <td class="align-middle text-muted" style="border-top: 1px solid rgba(255,255,255,0.05);">{{
                                $item['puesto'] }}</td>
                            <td class="align-middle"
                                style="border-top: 1px solid rgba(255,255,255,0.05); color: #C9A24A;">
                                ${{ number_format($item['salario'], 2) }}
                            </td>
                            <td class="align-middle text-muted" style="border-top: 1px solid rgba(255,255,255,0.05);">
                                {{ date('d/m/Y', strtotime($item['ingreso'])) }}
                            </td>
                            <td class="text-center align-middle" style="border-top: 1px solid rgba(255,255,255,0.05);">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('empleados.show', $item['id']) }}" class="btn-action text-info"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('empleados.edit', $item['id']) }}"
                                        class="btn-action text-warning mx-2"><i class="fas fa-pen-nib"></i></a>
                                    <a href="{{ route('empleados.destroy', $item['id']) }}"
                                        class="btn-action text-danger"
                                        onclick="return confirm('¿Dar de baja al empleado?')">
                                        <i class="fas fa-user-slash"></i>
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
    .lux-th {
        color: #C9A24A;
        text-transform: uppercase;
        font-size: 0.65rem;
        letter-spacing: 2px;
        border: none !important;
        padding: 20px !important;
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
        text-decoration: none !important;
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
        text-decoration: none !important;
    }
</style>
@stop