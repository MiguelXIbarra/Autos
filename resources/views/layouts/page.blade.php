@extends('adminlte::page')

@section('css')
<style>
    /* 1. Fondo Profundo Estilo Showroom */
    .content-wrapper {
        background: #0d0d0d !important;
        background-image:
            radial-gradient(at 0% 0%, rgba(30, 144, 255, 0.05) 0px, transparent 50%),
            radial-gradient(at 100% 0%, rgba(0, 0, 0, 0.5) 0px, transparent 50%) !important;
    }

    /* 2. Tarjetas con Cristalografía (Glassmorphism ligero) */
    .card {
        background: rgba(26, 26, 26, 0.95) !important;
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
        border-radius: 15px !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
        transition: transform 0.3s ease;
    }

    .card-header {
        background: linear-gradient(90deg, #1a1a1a 0%, #252525 100%) !important;
        border-bottom: 2px solid #007bff !important;
        border-top-left-radius: 15px !important;
        border-top-right-radius: 15px !important;
        padding: 1.5rem !important;
    }

    .card-title {
        color: #f8f9fa !important;
        font-weight: 800 !important;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1.1rem;
    }

    /* 3. Tablas Estilo Agencia */
    .table {
        color: #d1d1d1 !important;
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
    }

    .table thead th {
        background-color: transparent !important;
        color: #007bff !important;
        border: none !important;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        padding: 15px !important;
    }

    .table tbody tr {
        background-color: #222222 !important;
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #2a2a2a !important;
        transform: scale(1.01);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
    }

    .table td {
        border: none !important;
        padding: 15px !important;
        vertical-align: middle !important;
    }

    /* 4. Inputs Modernos */
    .form-control {
        background-color: #222 !important;
        border: 1px solid #333 !important;
        color: #fff !important;
        border-radius: 10px !important;
        padding: 12px !important;
    }

    .form-control:focus {
        border-color: #007bff !important;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.3) !important;
    }

    /* 5. Sidebar y Navegación */
    .main-sidebar {
        background-color: #000 !important;
        border-right: 1px solid #111;
    }

    .nav-sidebar .nav-link.active {
        background: linear-gradient(90deg, #007bff, #0056b3) !important;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.4) !important;
        border-radius: 8px;
    }

    /* 6. Botones tipo "Sport" */
    .btn {
        border-radius: 8px !important;
        font-weight: 600 !important;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 8px 20px !important;
    }
</style>
@yield('local_css')
@endsection

@section('content')
<div class="pt-4">
    @yield('content_body')
</div>
@endsection

@push('js')
@yield('local_js')
@endpush