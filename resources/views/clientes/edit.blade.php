@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Mantenimiento</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Editar <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Cliente</span></p>
    </div>

    <div class="card card-luxure">
        <div class="card-body p-5">
            <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control lux-input" value="{{ $cliente->nombre }}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Apellido</label>
                        <input type="text" name="apellido" class="form-control lux-input"
                            value="{{ $cliente->apellido }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Correo Electrónico</label>
                        <input type="email" name="correo" class="form-control lux-input" value="{{ $cliente->correo }}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control lux-input"
                            value="{{ $cliente->telefono }}">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="lux-label">Dirección</label>
                    <textarea name="direccion" class="form-control lux-input"
                        rows="2">{{ $cliente->direccion }}</textarea>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn-lux">Guardar Cambios</button>
                    <a href="{{ route('clientes.index') }}" class="btn-regresar-blanco ml-3">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop