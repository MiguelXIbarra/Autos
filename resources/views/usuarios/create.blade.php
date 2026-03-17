@extends('layouts.page')

@section('content_body')
<div class="container">
    <div class="row">
        <h2>Registrar Nuevo Usuario</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('usuarios.store') }}" method="POST" class="col-lg-7">
            @csrf
            <div class="form-group">
                <label for="name">Nombre Completo</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" required />
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" required />
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" required />
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" required />
            </div>
            <br>
            <button type="submit" class="btn btn-success">Guardar Usuario</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>
@endsection