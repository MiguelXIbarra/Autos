@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
                Seguridad</h2>
            <p class="text-white italic"
                style="font-size: 2.8rem; font-weight: 200; letter-spacing: -1px; line-height: 1;">
                Gestión de <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Usuarios</span>
            </p>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('usuarios.create') }}" class="btn-lux">
                <i class="fas fa-user-plus mr-2"></i> Nuevo Usuario
            </a>
            <a href="{{ route('home') }}" class="btn-regresar-blanco">Regresar</a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"
        style="background: rgba(40, 167, 69, 0.1); color: #28a745; border: 1px solid #28a745; border-radius: 10px;">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #fff;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card shadow-sm"
        style="background: #0D0D0D; border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0" style="background: transparent;">
                    <thead>
                        <tr>
                            <th class="lux-th">ID</th>
                            <th class="lux-th">Usuario</th>
                            <th class="lux-th">Correo Electrónico</th>
                            <th class="lux-th">Fecha de Registro</th>
                            <th class="lux-th text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                        <tr>
                            <td class="align-middle px-4"
                                style="border-top: 1px solid rgba(255,255,255,0.05); color: rgba(255,255,255,0.3);">
                                #{{ str_pad($item['id'], 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="align-middle" style="border-top: 1px solid rgba(255,255,255,0.05);">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3 d-flex align-items-center justify-content-center"
                                        style="width: 35px; height: 35px; background: rgba(201, 162, 74, 0.1); border-radius: 8px; color: #C9A24A;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-white font-weight-bold italic">{{ $item['nombre'] }}</span>
                                </div>
                            </td>
                            <td class="align-middle text-muted" style="border-top: 1px solid rgba(255,255,255,0.05);">{{
                                $item['email'] }}</td>
                            <td class="align-middle text-muted" style="border-top: 1px solid rgba(255,255,255,0.05);">{{
                                $item['fecha'] }}</td>
                            <td class="text-center align-middle" style="border-top: 1px solid rgba(255,255,255,0.05);">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('usuarios.show', $item['id']) }}" class="btn-action text-info"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('usuarios.edit', $item['id']) }}"
                                        class="btn-action text-warning mx-2"><i class="fas fa-pen-nib"></i></a>

                                    <form action="{{ route('usuarios.destroy', $item['id']) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action text-danger"
                                            onclick="return confirm('¿Dar de baja al usuario?')">
                                            <i class="fas fa-user-times"></i>
                                        </button>
                                    </form>
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
        letter-spacing: 1px;
        text-decoration: none !important;
        transition: 0.3s;
    }

    .btn-lux:hover {
        background: #e0b75a !important;
        transform: translateY(-2px);
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
        transition: 0.3s;
    }

    .btn-regresar-blanco:hover {
        background: rgba(255, 255, 255, 0.1);
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

    .btn-action:hover {
        background: rgba(201, 162, 74, 0.1);
        border-color: #C9A24A;
        transform: translateY(-2px);
    }

    /* Estilo para el botón de formulario destroy */
    form button.btn-action {
        border: none;
        cursor: pointer;
    }
</style>
@stop   