@extends('adminlte::page')

@section('title', 'Editar Auto Deportivo')

@section('content_header')
    <h1>Editar Auto Deportivo</h1>
@endsection

@section('content')

<div class="container">

    <!-- Mensajes de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('autos.update', $auto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre del Auto</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $auto->name) }}" required>
        </div>

        <div class="form-group">
            <label>Email del Propietario</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $auto->email) }}" required>
        </div>

        <div class="form-group">
            <label>Cliente Asociado</label>
            <select name="cliente_id" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}"
                        {{ $auto->cliente_id == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Imagen del Auto</label>
            <input type="file" name="imagen" class="form-control">
            @if($auto->image)
                <img src="{{ asset('img/autos/originals/' . $auto->image) }}"
                     class="img-fluid mt-2" style="max-width: 150px;" alt="Imagen actual">
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-2">Actualizar Auto</button>
        <a href="{{ route('autos.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>

</div>

@endsection
