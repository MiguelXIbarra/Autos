@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row"><h2>Editar Asset: {{ $asset->titulo }}</h2></div>
    <hr>
    <form action="{{ route('asset.update', $asset->id_asset) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="titulo">Nombre/Título</label>
            <input type="text" class="form-control" name="titulo" value="{{ $asset->titulo }}" required />
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" class="form-control">
                <option value="Imagen" {{ $asset->tipo == 'Imagen' ? 'selected' : '' }}>Imagen</option>
                <option value="Video" {{ $asset->tipo == 'Video' ? 'selected' : '' }}>Video</option>
                <option value="Documento" {{ $asset->tipo == 'Documento' ? 'selected' : '' }}>Documento</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ruta">Ruta o URL</label>
            <input type="text" class="form-control" name="ruta" value="{{ $asset->ruta }}" required />
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('asset.index') }}" class="btn btn-danger">Volver</a>
    </form>
</div>
@endsection