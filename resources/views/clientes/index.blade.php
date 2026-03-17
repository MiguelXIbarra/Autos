@extends('adminlte::page')

@section('css')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="row">
        <h2>Lista de Clientes</h2>
        <hr>
        <br>
        <p align="right">
            <a href="{{ route('clientes.create') }}" class="btn btn-success">Registrar Cliente</a>
            <a href="{{ route('home') }}" class="btn btn-primary">Regresar</a>
        </p>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Borrado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Deseas eliminar al cliente con ID: <span id="nombre_id"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="" id="borrar" class="btn btn-danger">Borrar</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
<script>
    function modal(parametro) {
        $('#nombre_id').html(parametro);
        let url = "{{ route('clientes.destroy', ':id') }}";
        url = url.replace(':id', parametro);
        document.getElementById('borrar').href = url;
    }

    var data = @json($clientes);

    $(document).ready(function() {
        $('#example').DataTable({
            "data": data,
            "pageLength": 10,
            "order": [[1, "asc"]],
            "language": {
                "sSearch": "Buscar:",
                "sEmptyTable": "No hay datos disponibles"
            },
            responsive: true,
            dom: '<"col-xs-3"l><"col-xs-5"B><"col-xs-4"f>rtip',
            buttons: ['copy', 'excel', 'pdf']
        });
    });
</script>
@endsection