@extends('adminlte::page')

@section('title', 'Autos Deportivos')

@section('content_header')
    <h1>Listado de Autos Deportivos</h1>
@endsection

@section('content')
    @include('partials.alerts')

    <a href="{{ route('autos.create') }}" class="btn btn-success mb-3">Crear Nuevo Auto</a>

    <table id="autosTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consulta as $auto)
            <tr>
                <td>
                    @if($auto->image)
                        <img src="{{ asset('img/autos/originals/' . $auto->image) }}"
                             style="width:50px;height:50px;object-fit:cover;" class="img-circle elevation-1">
                    @else
                        <span class="badge badge-secondary">SIN FOTO</span>
                    @endif
                </td>
                <td>{{ $auto->name }}</td>
                <td>{{ $auto->email }}</td>
                <td>{{ $auto->cliente ? $auto->cliente->nombre : '-' }}</td>
                <td>
                    <a href="{{ route('autos.show', $auto->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('autos.edit', $auto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('autos.destroy', $auto->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este auto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
$(document).ready(function() {
    $('#autosTable').DataTable({
        pageLength: 25,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf'],

        // Lenguaje español
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });

    // Extensión para ordenar ignorando acentos y vocales especiales
    jQuery.extend(jQuery.fn.dataTableExt.oSort, {
        "vocal-pre": function (data) {
            if (!data) return '';
            var map = { "Á": "A", "á": "a", "É": "E", "é": "e", "Í": "I", "í": "i", "Ó": "O", "ó": "o", "Ú": "U", "ú": "u", "Ü": "U", "ü": "u", "Ñ": "N", "ñ": "n" };
            return data.replace(/[ÁáÉéÍíÓóÚúÜüÑñ]/g, function(match) { return map[match]; }).toLowerCase();
        },
        "vocal-asc": function(a,b){ return ((a < b) ? -1 : ((a > b) ? 1 : 0)); },
        "vocal-desc": function(a,b){ return ((a < b) ? 1 : ((a > b) ? -1 : 0)); }
    });

    // Aplicar columna "Nombre" con ordenamiento vocal-pre
    $('#autosTable').DataTable().column(1).order('vocal-asc').draw();
});
</script>
@endsection
