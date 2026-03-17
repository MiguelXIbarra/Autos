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
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </div>
    <div class="row">
        <h2>Panel de Ventas</h2>
        <hr>
        <br>
        <p align="right">
            <a href="{{ route('ventas.create') }}" class="btn btn-success">Nueva Venta</a>
            <a href="{{ route('home') }}" class="btn btn-primary">Regresar</a>
        </p>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Folio</th>
                    <th>Cliente</th>
                    <th>Vehículo</th>
                    <th>Fecha</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

{{-- Modal de Cancelación --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5">Confirmar Cancelación</h1>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas cancelar la venta con Folio: <span id="folio_venta"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="" id="borrar" class="btn btn-danger">Confirmar Cancelación</a>
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
        $('#folio_venta').html(parametro);
        let url = "{{ route('ventas.destroy', ':id') }}";
        url = url.replace(':id', parametro);
        document.getElementById('borrar').href = url;
    }

    var data = @json($ventas);

    $(document).ready(function() {
        $('#example').DataTable({
            "data": data,
            "order": [[1, "desc"]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
            },
            dom: '<"col-xs-3"l><"col-xs-5"B><"col-xs-4"f>rtip',
            buttons: ['copy', 'excel', 'pdf']
        });
    });
</script>
@endsection