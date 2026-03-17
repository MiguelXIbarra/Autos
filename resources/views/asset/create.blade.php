@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Registrar Nuevo Asset</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('asset.store') }}" method="POST" class="col-lg-7">
            @csrf
            <div class="form-group">
                <label for="titulo">Título del Recurso</label>
                <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}" required />
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de Archivo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="">-- Seleccione --</option>
                    <option value="Imagen" {{old('tipo')=='Imagen' ? 'selected' : '' }}>Imagen</option>
                    <option value="Video" {{old('tipo')=='Video' ? 'selected' : '' }}>Video</option>
                    <option value="Documento" {{old('tipo')=='Documento' ? 'selected' : '' }}>Documento</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ruta">Ruta, URL o Nombre de Archivo</label>
                <input type="text" class="form-control" name="ruta" value="{{old('ruta')}}" required />
            </div>

            <br>
            <button type="submit" class="btn btn-success">Guardar Recurso</button>
            <a href="{{ route('asset.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>
@endsection