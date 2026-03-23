@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">Cierre
            de Trato</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Nueva <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Venta</span></p>
    </div>

    <div class="card card-luxure">
        <div class="card-body p-5">
            <form action="{{ route('ventas.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label class="lux-label">Seleccionar Auto</label>
                        <select name="id_auto" class="form-control lux-input" required>
                            @foreach($autos as $auto)
                            <option value="{{ $auto->id_auto }}">{{ $auto->marca }} {{ $auto->modelo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="lux-label">Cliente</label>
                        <select name="id_cliente" class="form-control lux-input" required>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="lux-label">Empleado</label>
                        <select name="id_empleado" class="form-control lux-input" required>
                            @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Monto Total</label>
                        <input type="number" step="0.01" name="total" class="form-control lux-input" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Fecha de Venta</label>
                        <input type="date" name="fecha_venta" class="form-control lux-input" value="{{ date('Y-m-d') }}"
                            required>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn-lux">Confirmar Operación</button>
                    <a href="{{ route('ventas.index') }}" class="btn-regresar-blanco ml-3">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .lux-label {
        font-size: 0.6rem;
        color: #C9A24A;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 800;
        margin-bottom: 8px;
        display: block;
    }

    .lux-input {
        background: transparent !important;
        border: none !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: #fff !important;
        border-radius: 0 !important;
        padding: 10px 0 !important;
    }

    .lux-input:focus {
        border-bottom: 1px solid #C9A24A !important;
        box-shadow: none !important;
    }
</style>
@stop