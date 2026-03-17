@extends('adminlte::page')

@section('title', 'Lista de Assets')

@section('content_header')
    <h1>Lista de Assets</h1>
@endsection

@section('content')
    @if($assets->isEmpty())
        <div class="alert alert-info">
            No hay assets cargados aún.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Miniatura</th>
                    <th>Video</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assets as $asset)
                    <tr>
                        <td>{{ $asset->id }}</td>
                        <td>{{ $asset->title }}</td>
                        <td>
                            @if($asset->image)
                                <img src="{{ url('/miniatura/' . $asset->image) }}" alt="Miniatura" style="max-width: 100px;">
                            @else
                                Sin imagen
                            @endif
                        </td>
                        <td>
                            @if($asset->video_path)
                                <video width="160" controls>
                                    <source src="{{ url('/video-file/' . $asset->video_path) }}" type="video/mp4">
                                    Tu navegador no soporta video HTML5.
                                </video>
                            @else
                                Sin video
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('asset.show', $asset->id) }}" class="btn btn-primary btn-sm">Ver</a>
                            {{-- Aquí puedes agregar editar, borrar, etc --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
