@extends('adminlte::page')

@section('title', 'Subir Video')

@section('content')
<div class="container">
    <h2>Crear un Nuevo Video</h2>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data" class="col-lg-7">
        @csrf

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Miniatura</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <div class="form-group">
            <label for="video_path">Archivo de Video</label>
            <input type="file" class="form-control" id="video_path" name="video_path" accept="video/*">
        </div>

        <div class="form-group mt-3">
            <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Subir Video</button>
        </div>
    </form>
</div>
@endsection
