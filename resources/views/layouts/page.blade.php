@extends('adminlte::page')

@section('css')
<style>
    /* 1. RESET DARK PREMIUM (Sin bordes blancos) */
    html,
    body,
    .wrapper,
    .content-wrapper,
    .main-header,
    .main-sidebar,
    .content {
        background-color: #050505 !important;
        border: none !important;
        color: #eee !important;
    }

    .main-header.navbar {
        border-bottom: none !important;
        background-color: #000 !important;
    }

    /* Iluminación de Showroom sutil */
    .content-wrapper {
        background-image: radial-gradient(at 0% 0%, rgba(0, 123, 255, 0.08) 0px, transparent 50%) !important;
    }

    /* 2. TARJETAS "GLASS-PREMIUM" */
    .card {
        background: rgba(20, 20, 25, 0.7) !important;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
        border-radius: 25px !important;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6) !important;
        margin-top: 20px;
    }

    .card-title {
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 3px;
        background: linear-gradient(90deg, #007bff, #00c6ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* 3. TABLAS ESTILO LUXURE */
    .table {
        border-collapse: separate !important;
        border-spacing: 0 10px !important;
        width: 100% !important;
    }

    .table thead th {
        color: #444 !important;
        border: none !important;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 2px;
    }

    .table tbody tr {
        background: rgba(255, 255, 255, 0.02) !important;
        transition: 0.4s;
    }

    .table-hover tbody tr:hover {
        background: rgba(0, 123, 255, 0.1) !important;
        transform: translateY(-5px) scale(1.01);
        color: #fff !important;
    }

    .table td {
        border: none !important;
        padding: 20px !important;
        vertical-align: middle !important;
    }

    /* 4. FOOTER AMPLIO ESTILO CUPRA */
    .main-footer {
        background: #000 !important;
        border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
        padding: 4rem 2rem !important;
        color: #888 !important;
        margin-left: 0 !important;
    }

    .footer-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-section h4 {
        color: #fff;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
        background: linear-gradient(90deg, #007bff, #00c6ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li a {
        color: #555;
        transition: 0.3s;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .footer-section ul li a:hover {
        color: #007bff;
        padding-left: 5px;
    }

    /* Ajuste de margen para el footer con el sidebar de AdminLTE */
    @media (min-width: 768px) {
        .main-footer {
            margin-left: 250px !important;
        }
    }
</style>
@yield('local_css')
@endsection

@section('content')
<div class="container-fluid pt-3">
    @yield('content_body')
</div>

{{-- Formulario oculto global para el Logout --}}
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-section">
            <h4>PROYECTO AUTOS</h4>
            <p>Gestión automotriz de alto rendimiento. Privacidad y potencia en un solo lugar.</p>
        </div>
        <div class="footer-section">
            <h4>SISTEMA</h4>
            <ul>
                <li><a href="{{ route('autos.index') }}">Inventario</a></li>
                <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
                <li><a href="{{ route('home') }}">Home</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>SOPORTE</h4>
            <p class="small text-muted"><i class="fas fa-envelope mr-2"></i> help@luxure.com</p>
            <p class="small text-muted"><i class="fas fa-phone mr-2"></i> +52 33 1234 5678</p>
        </div>
    </div>
    <div class="text-center mt-5 border-top border-dark pt-4" style="font-size: 0.8rem;">
        &copy; {{ date('Y') }} LUXURE | Agencia de Autos Deportivos.
    </div>
</footer>
@endsection

@push('js')
<script>
    // Este script asegura que cualquier botón de logout dentro del admin funcione
        document.addEventListener('DOMContentLoaded', function() {
            const logoutButtons = document.querySelectorAll('a[href="{{ route('logout') }}"]');
            logoutButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            });
        });
</script>
@yield('local_js')
@endpush