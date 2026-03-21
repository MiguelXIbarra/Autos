@extends('adminlte::page')

@section('title', 'Luxure | Panel Administrativo')

@section('adminlte_css')
<style>
    /* VARIABLES Y COLORES LUXURE */
    :root {
        --lux-gold: #C9A24A;
        --lux-black: #000000;
        --lux-dark: #0D0D0D;
        --lux-gray: rgba(255, 255, 255, 0.05);
    }

    /* FONDO Y ESTRUCTURA */
    .content-wrapper {
        background-color: var(--lux-black) !important;
        color: #ffffff !important;
    }

    .main-sidebar {
        background-color: var(--lux-dark) !important;
        border-right: 1px solid var(--lux-gray) !important;
    }

    .main-header {
        background-color: var(--lux-dark) !important;
        border-bottom: 1px solid var(--lux-gray) !important;
    }

    /* BARRA LATERAL (NAV) */
    .nav-sidebar .nav-link {
        color: #888 !important;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.75rem;
    }

    .nav-sidebar .nav-link.active,
    .nav-sidebar .nav-link:hover {
        background-color: rgba(201, 162, 74, 0.1) !important;
        color: var(--lux-gold) !important;
    }

    /* CONTENEDORES (CARDS) */
    .card {
        background-color: var(--lux-dark) !important;
        border: 1px solid var(--lux-gray) !important;
        border-radius: 15px !important;
        overflow: hidden;
    }

    .card-header {
        border-bottom: 1px solid var(--lux-gray) !important;
        padding: 1.5rem !important;
    }

    /* BOTONES LUXURE */
    .btn-lux {
        background: var(--lux-gold) !important;
        color: #000 !important;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none !important;
        padding: 8px 20px;
        transition: 0.3s;
    }

    .btn-lux:hover {
        background: #fff !important;
        box-shadow: 0 0 15px rgba(201, 162, 74, 0.4);
    }

    /* TABLAS */
    .table {
        color: #eee !important;
    }

    .table thead th {
        color: var(--lux-gold) !important;
        text-transform: uppercase;
        font-size: 0.65rem;
        letter-spacing: 2px;
        border-bottom: 2px solid var(--lux-gold) !important;
    }

    .table td {
        border-top: 1px solid var(--lux-gray) !important;
        vertical-align: middle;
    }

    /* SCROLLBAR PERSONALIZADO */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #000;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--lux-gold);
        border-radius: 10px;
    }
</style>
@stop

@section('content')
<div class="pt-4">
    @yield('content_body')
</div>
@stop