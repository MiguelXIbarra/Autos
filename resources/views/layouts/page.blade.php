@extends('adminlte::page')

@section('css')
<style>
    /* 1. FONDO INMERSIVO */
    html,
    body,
    .wrapper,
    .content-wrapper,
    .main-header,
    .main-sidebar {
        background: #050507 !important;
        color: #d1d1d1 !important;
        border: none !important;
    }

    /* Iluminación de Showroom: Un aura azul profundo que se mueve en el fondo */
    .content-wrapper {
        background: radial-gradient(circle at 0% 0%, rgba(0, 123, 255, 0.05) 0%, transparent 40%),
            radial-gradient(circle at 100% 100%, rgba(0, 0, 0, 0.8) 0%, #050507 100%) !important;
    }

    /* 2. TARJETAS "GLASS-PREMIUM" (Efecto cristalizado) */
    .card {
        background: rgba(20, 20, 25, 0.7) !important;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.03) !important;
        /* Borde casi invisible */
        border-radius: 25px !important;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5) !important;
        margin-top: 20px;
        overflow: hidden;
    }

    .card-header {
        background: rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        padding: 1.8rem !important;
    }

    .card-title {
        font-weight: 800 !important;
        text-transform: uppercase;
        letter-spacing: 4px;
        background: linear-gradient(to right, #ffffff, #007bff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* 3. TABLAS DE ALTA GAMA (Filas Flotantes) */
    .table {
        border-collapse: separate !important;
        border-spacing: 0 12px !important;
    }

    .table thead th {
        color: #4f4f4f !important;
        border: none !important;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 2px;
        padding: 15px !important;
    }

    .table tbody tr {
        background: rgba(255, 255, 255, 0.02) !important;
        border-radius: 15px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .table tbody tr:hover {
        background: rgba(0, 123, 255, 0.1) !important;
        transform: translateY(-5px) scale(1.01);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        color: #fff !important;
    }

    .table td {
        border: none !important;
        padding: 20px !important;
        vertical-align: middle !important;
    }

    /* 4. BOTONES "SPORT" (Degradados fluidos) */
    .btn {
        border-radius: 12px !important;
        font-weight: 700 !important;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.3s;
        border: none !important;
    }

    .btn-success {
        background: linear-gradient(45deg, #1db954, #191414) !important;
        box-shadow: 0 4px 15px rgba(29, 185, 84, 0.3);
    }

    .btn-primary {
        background: linear-gradient(45deg, #007bff, #00c6ff) !important;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    /* 5. DATA TABLES CUSTOM */
    .dataTables_filter input {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 30px !important;
        color: #fff !important;
        padding: 8px 20px !important;
    }
</style>
@yield('local_css')
@endsection

@section('content')
<div class="container-fluid pt-3">
    @yield('content_body')
</div>
@endsection

@push('js')
@yield('local_js')
@endpush