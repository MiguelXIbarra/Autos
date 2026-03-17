@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Usuario: {{ $usuario->name }}</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="col-lg-7">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre Completo</label>
                <input type="text" class="form-control" name="name" value="{{ $usuario->name }}" required />
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" name="email" value="{{ $usuario->email }}" required />
            </div>
            <div class="form-group text-muted">
                <label for="password">Contraseña (Dejar en blanco para no cambiar)</label>
                <input type="password" class="form-control" name="password" />
            </div>
            <div class="form-group text-muted">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Volver</a>
        </form>
    </div>
</div>
@endsection