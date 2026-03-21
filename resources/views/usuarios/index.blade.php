@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h2 class="text-[#C9A24A] font-black uppercase tracking-[0.5em] mb-2"
                style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;">Gestión de Privacidad</h2>
            <p class="text-white italic"
                style="font-size: 2.8rem; font-weight: 200; letter-spacing: -1px; line-height: 1;">
                Panel de <span style="color: #C9A24A; font-weight: 900; font-style: normal;">Usuarios</span>
            </p>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('usuarios.create') }}" class="btn-lux">
                <i class="fas fa-plus-circle mr-2"></i> Nuevo Registro
            </a>
            <a href="{{ route('home') }}" class="btn-regresar-blanco">
                Regresar
            </a>
        </div>
    </div>

    <div class="card card-luxure">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="luxureTable" class="table mb-0">
                    <thead>
                        <tr>
                            <th class="px-4">ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $user)
                        @php
                        $userId = $user['id'];
                        $name = $user['name'] ?? 'N/A';
                        $initial = strtoupper(substr($name, 0, 1));
                        $isMe = (Auth::id() == $userId);
                        @endphp
                        <tr class="{{ $isMe ? 'row-me' : '' }}">
                            <td class="px-4 align-middle">
                                <span class="text-id">#{{ str_pad($userId, 4, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle">{{ $initial }}</div>
                                    <div>
                                        <span class="text-white italic font-weight-bold">{{ $name }}</span>
                                        @if($isMe)
                                        <span class="badge ml-2 badge-me">TÚ</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-muted">{{ $user['email'] ?? 'N/A' }}</td>
                            <td class="text-center align-middle">
                                <div class="acciones-container">
                                    <a href="{{ route('usuarios.show', $userId) }}" class="icon-btn text-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('usuarios.edit', $userId) }}" class="icon-btn text-warning">
                                        <i class="fas fa-pen-nib"></i>
                                    </a>
                                    @if(!$isMe)
                                    <a href="{{ route('usuarios.destroy', $userId) }}" class="icon-btn text-danger"
                                        onclick="return confirm('¿Dar de baja este acceso?')">
                                        <i class="fas fa-ghost"></i>
                                    </a>
                                    @endif
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

    .row-me {
        background: rgba(201, 162, 74, 0.05) !important;
    }

    .badge-me {
        background: #C9A24A;
        color: #000;
        font-size: 10px;
        font-weight: 900;
    }

    .avatar-circle {
        width: 32px;
        height: 32px;
        background: linear-gradient(45deg, #C9A24A, #8a6d2e);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        font-weight: 900;
        margin-right: 12px;
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
        border-color: rgba(201, 162, 74, 0.2) !important;
    }

    .btn-regresar-blanco {
        padding: 10px 25px;
        background: transparent;
        color: #fff !important;
        border: 1px solid #fff;
        border-radius: 4px;
        text-transform: uppercase;
        font-weight: 900;
        font-size: 0.7rem;
        letter-spacing: 1px;
        transition: 0.3s;
        text-decoration: none !important;
        display: inline-block;
    }

    .btn-regresar-blanco:hover {
        background: #fff;
        color: #000 !important;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#luxureTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": { "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json" }
        });
    });
</script>
@stop