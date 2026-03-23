@extends('layouts.page')

@section('content_body')
<div class="container-fluid px-4 py-2">
    <div class="mb-5">
        <h2 style="color: #C9A24A; font-size: 0.7rem; letter-spacing: 0.6em;" class="font-black uppercase mb-2">
            Actualización de Perfil</h2>
        <p class="text-white italic" style="font-size: 2.5rem; font-weight: 200; letter-spacing: -1px;">Editar <span
                style="color: #C9A24A; font-weight: 900; font-style: normal;">Empleado</span></p>
    </div>

    <div class="card card-luxure">
        <div class="card-body p-5">
            <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control lux-input" value="{{ $empleado->nombre }}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Puesto</label>
                        <input type="text" name="puesto" class="form-control lux-input" value="{{ $empleado->puesto }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Email</label>
                        <input type="email" name="email" class="form-control lux-input" value="{{ $empleado->email }}">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="lux-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control lux-input"
                            value="{{ $empleado->telefono }}">
                    </div>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn-lux">Guardar Cambios</button>
                    <a href="{{ route('empleados.index') }}" class="btn-regresar-blanco ml-3">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop