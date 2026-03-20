<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxure | Agencia de Autos Deportivos</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --lux-black: #0D0D0D;
            --lux-gold: #C9A24A;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--lux-black);
            color: white;
            margin: 0;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        #sidebar {
            transition: transform 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0);
            z-index: 100;
        }

        .sidebar-overlay {
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            z-index: 90;
        }

        .sidebar-open .sidebar-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        .sidebar-open #sidebar {
            transform: translateX(0);
        }

        .hero-item {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
            z-index: 0;
        }

        .hero-item.active {
            opacity: 1;
            z-index: 10;
        }

        .nav-btn {
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 50;
            cursor: pointer;
        }

        #catalogo-section:hover .nav-btn {
            opacity: 1;
        }

        .btn-lux {
            border: 1px solid rgba(201, 162, 74, 0.5);
            padding: 1rem 2.5rem;
            font-size: 0.7rem;
            letter-spacing: 0.3em;
            transition: all 0.5s ease;
            text-transform: uppercase;
            font-weight: bold;
            display: inline-block;
        }

        .btn-lux:hover {
            background: var(--lux-gold);
            color: var(--lux-black);
            border-color: var(--lux-gold);
        }
    </style>
</head>

<body class="antialiased">

    <div id="sidebar-overlay" class="sidebar-overlay fixed inset-0 bg-black/80 backdrop-blur-sm"></div>

    <aside id="sidebar"
        class="fixed top-0 right-0 h-full w-[350px] bg-[#0D0D0D] border-l border-white/5 translate-x-full flex flex-col p-12">
        <button id="close-menu"
            class="text-white text-[0.6rem] uppercase tracking-[0.4em] mb-16 text-right hover:text-[#C9A24A] transition">Cerrar
            ✕</button>

        <div class="flex flex-col h-full justify-between">
            <div class="space-y-12">
                <div>
                    <p class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.4em] mb-6">Cuenta</p>
                    @auth
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-10 h-10 rounded-full bg-[#C9A24A] flex items-center justify-center text-black font-bold uppercase shadow-[0_0_15px_rgba(201,162,74,0.3)]">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-lg font-light italic text-white">{{ Auth::user()->name }}</span>
                    </div>
                    @else
                    <ul class="space-y-4 text-xl font-light italic uppercase tracking-tighter text-white">
                        <li><a href="{{ route('login') }}" class="hover:text-[#C9A24A] transition">Iniciar Sesión</a>
                        </li>
                        <li><a href="{{ route('register') }}"
                                class="hover:text-[#C9A24A] transition text-gray-500">Registrarse</a></li>
                    </ul>
                    @endauth
                </div>

                <div>
                    <p class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.4em] mb-6">Administración
                    </p>
                    <ul class="space-y-4 text-lg font-light italic uppercase tracking-tighter text-white">
                        <li><a href="{{ route('usuarios.index') }}" class="hover:text-[#C9A24A] transition">Usuarios</a>
                        </li>
                        <li><a href="{{ route('clientes.index') }}" class="hover:text-[#C9A24A] transition">Clientes</a>
                        </li>
                        <li><a href="{{ route('empleados.index') }}"
                                class="hover:text-[#C9A24A] transition">Empleados</a></li>
                        <li><a href="{{ route('ventas.index') }}" class="hover:text-[#C9A24A] transition">Ventas</a>
                        </li>
                        <li><a href="{{ route('autos.index') }}" class="hover:text-[#C9A24A] transition">Autos</a></li>
                        <li><a href="{{ route('asset.index') }}" class="hover:text-[#C9A24A] transition">Assets</a></li>
                    </ul>
                </div>
            </div>

            @auth
            <div class="border-t border-white/5 pt-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="text-[0.6rem] text-red-500 font-black uppercase tracking-[0.4em] hover:text-white transition">Cerrar
                        Sesión</button>
                </form>
            </div>
            @endauth
        </div>
    </aside>

    <nav
        class="fixed w-full z-50 px-10 py-8 flex justify-between items-center bg-gradient-to-b from-black/90 to-transparent">
        <div class="text-xl font-black tracking-[0.4em] uppercase text-white font-bold">Luxure<span
                class="text-[#C9A24A]">.</span></div>
        <ul class="hidden md:flex space-x-12 text-[0.65rem] font-bold uppercase tracking-[0.3em] text-white font-bold">
            <li><a href="#" class="hover:text-[#C9A24A] transition">Inicio</a></li>
            <li><a href="#catalogo-section" class="hover:text-[#C9A24A] transition">Catálogo</a></li>
            <li><a href="#contacto" class="hover:text-[#C9A24A] transition">Contacto</a></li>
        </ul>
        <button id="open-menu"
            class="text-[0.7rem] tracking-widest font-bold uppercase border-b border-[#C9A24A] pb-1 text-[#C9A24A] hover:text-white transition">Menú</button>
    </nav>

    @yield('content')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.body;
            const openBtn = document.getElementById('open-menu');
            const closeBtn = document.getElementById('close-menu');
            const overlay = document.getElementById('sidebar-overlay');

            const toggleMenu = () => body.classList.toggle('sidebar-open');
            openBtn.addEventListener('click', toggleMenu);
            closeBtn.addEventListener('click', toggleMenu);
            overlay.addEventListener('click', toggleMenu);

            const heroItems = document.querySelectorAll('.hero-item');
            if(heroItems.length > 0) {
                let current = 0;
                setInterval(() => {
                    heroItems[current].classList.remove('active');
                    current = (current + 1) % heroItems.length;
                    heroItems[current].classList.add('active');
                }, 5000);
            }
        });
    </script>
</body>

</html>