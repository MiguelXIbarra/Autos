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
            --lux-white: #F5F5F5;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--lux-black);
            color: var(--lux-white);
            margin: 0;
            overflow-x: hidden;
        }

        /* Hero Fade */
        .hero-item {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1.0s ease-in-out;
            z-index: 0;
        }

        .hero-item.active {
            opacity: 1;
            z-index: 10;
        }

        .btn-lux {
            border: 1px solid rgba(201, 162, 74, 0.5);
            padding: 1rem 2.5rem;
            font-size: 0.7rem;
            letter-spacing: 0.3em;
            transition: all 0.5s ease;
            text-transform: uppercase;
            font-weight: bold;
        }

        .btn-lux:hover {
            background: var(--lux-gold);
            color: var(--lux-black);
            border-color: var(--lux-gold);
        }

        .nav-btn {
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 50;
        }

        #catalogo-section:hover .nav-btn {
            opacity: 1;
        }
    </style>
</head>

<body class="antialiased">
    <nav
        class="fixed w-full z-50 px-10 py-8 flex justify-between items-center bg-gradient-to-b from-black/90 to-transparent">
        <div class="text-xl font-black tracking-[0.4em] uppercase text-white">Luxure<span
                class="text-[#C9A24A]">.</span></div>
        <ul class="hidden md:flex space-x-12 text-[0.65rem] font-bold uppercase tracking-[0.3em] text-white">
            <li><a href="#" class="hover:text-[#C9A24A] transition font-bold">Inicio</a></li>
            <li><a href="#catalogo" class="hover:text-[#C9A24A] transition font-bold">Catálogo</a></li>
            <li><a href="#contacto" class="hover:text-[#C9A24A] transition font-bold">Contacto</a></li>
        </ul>
        <div
            class="text-[0.7rem] tracking-widest font-bold uppercase border-b border-[#C9A24A] pb-1 text-white text-gold">
            Menú</div>
    </nav>

    @yield('content')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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