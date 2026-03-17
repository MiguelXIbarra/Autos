@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Detalle del Usuario</h2>
    </div>
    <hr>
    <div class="row">
        <div class="card col-lg-8 card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Información de Perfil</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nombre:</label>
                    <p class="form-control-static">{{ $usuario->name }}</p>
                </div>
                <div class="form-group">
                    <label>Correo Electrónico:</label>
                    <p class="form-control-static">{{ $usuario->email }}</p>
                </div>
                <div class="form-group">
                    <label>Fecha de Registro:</label>
                    <p class="form-control-static">{{ $usuario->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                    <p class="form-control-static">
                        <span class="badge {{ $usuario->estatus == 1 ? 'badge-success' : 'badge-danger' }}">
                            {{ $usuario->estatus == 1 ? 'Activo' : 'Inactivo' }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Regresar</a>
                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-success">Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection