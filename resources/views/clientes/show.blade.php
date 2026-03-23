@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Expediente</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Perfil de <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Cliente</span></p>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card card-luxure">
                <div class="card-body p-5">
                    <div class="d-flex align-items-center mb-5">
                        <div class="p-3 rounded-lg border border-[#C9A24A] mr-4">
                            <i class="fas fa-user-tag fa-3x" style="color: #C9A24A;"></i>
                        </div>
                        <div>
                            <h3 class="text-white italic font-weight-bold mb-0">{{ $cliente->nombre }} {{
                                $cliente->apellido }}</h3>
                            <p class="text-muted small mb-0">ID de Cliente: #{{ $cliente->id_cliente }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="lux-label">Correo Electrónico</label>
                            <p class="text-white italic">{{ $cliente->correo }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="lux-label">Teléfono de Contacto</label>
                            <p class="text-white italic">{{ $cliente->telefono }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="lux-label">Dirección Registrada</label>
                        <p class="text-white italic">{{ $cliente->direccion }}</p>
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('clientes.index') }}" class="btn-regresar-blanco">Volver</a>
                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn-lux ml-3">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop