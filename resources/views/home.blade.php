@extends('layouts.app')

@section('content')
<style>
    /* Estilos base del diseño Luxure */
    .hero-item {
        position: absolute;
        inset: 0;
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
        z-index: 0;
    }

    .hero-item.active {
        opacity: 1;
    }

    .btn-lux {
        display: inline-block;
        padding: 1.2rem 3rem;
        background: #C9A24A;
        color: #000 !important;
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 0.75rem;
        font-weight: 900;
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        border: 1px solid #C9A24A;
        text-decoration: none;
    }

    .btn-lux:hover {
        background: transparent;
        color: #C9A24A !important;
        box-shadow: 0 0 30px rgba(201, 162, 74, 0.3);
    }

    #track {
        display: flex;
        gap: 0;
        transition: transform 0.1s linear;
    }

    .text-gold {
        color: #C9A24A;
    }
</style>

{{-- SECTION 1: HERO (IDÉNTICO PARA AMBOS) --}}
<section class="relative h-screen w-full flex items-end pb-32 bg-black overflow-hidden">
    <div class="absolute inset-0 z-0">
        @php
        $imgHero = [
        'https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=90&w=2000&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?q=90&w=2000&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1542362567-b07e54358753?q=90&w=2000&auto=format&fit=crop'
        ];
        @endphp
        @foreach($imgHero as $index => $url)
        <div class="hero-item {{ $index === 0 ? 'active' : '' }}">
            <img src="{{ $url }}" class="w-full h-full object-cover grayscale-[15%]">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0D0D0D] via-transparent to-black/30"></div>
        </div>
        @endforeach
    </div>

    <div class="relative z-20 px-10 md:px-20 text-white font-bold">
        {{-- CAMBIO DINÁMICO: Saludo si está autenticado --}}
        @auth
        <p class="text-[#C9A24A] uppercase tracking-[0.5em] text-[0.7rem] mb-4">Bienvenido, {{ Auth::user()->name }}</p>
        @endauth

        <h1 class="text-5xl md:text-8xl font-light tracking-tighter leading-none mb-8 uppercase text-white font-bold">
            Autos de lujo y<br><span class="font-black italic text-[#C9A24A]">alto rendimiento.</span>
        </h1>

        <div class="flex flex-wrap gap-4">
            <a href="#catalogo-section" class="btn-lux text-white font-bold">Ver catálogo</a>

            {{-- BOTÓN EXTRA: Solo aparece si ya inició sesión --}}
            @auth
            <a href="{{ route('autos.index') }}"
                class="btn-lux border-white text-white bg-transparent hover:bg-white hover:text-black">Panel de
                Control</a>
            @endauth
        </div>
    </div>
</section>

{{-- SECTION 2: CATÁLOGO (SIEMPRE VISIBLE) --}}
<section id="catalogo-section" class="bg-[#0D0D0D] py-32 overflow-hidden relative z-30">
    <div class="container mx-auto px-10 mb-16 text-white font-bold">
        <h2 class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.6em] mb-4 text-gold">Mundo Luxure</h2>
        <p class="text-4xl font-light tracking-tight italic">Catálogo de Selección</p>
    </div>
    <div class="relative w-full overflow-hidden">
        <button id="prev-cat"
            class="nav-btn absolute left-10 top-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-black/60 border border-[#C9A24A]/40 flex items-center justify-center text-[#C9A24A] hover:bg-[#C9A24A] hover:text-black shadow-2xl transition-all duration-300 font-bold">❮</button>
        <button id="next-cat"
            class="nav-btn absolute right-10 top-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-black/60 border border-[#C9A24A]/40 flex items-center justify-center text-[#C9A24A] hover:bg-[#C9A24A] hover:text-black shadow-2xl transition-all duration-300 font-bold">❯</button>
        <div id="track" class="flex w-max will-change-transform"></div>
    </div>
</section>

{{-- SECTION 3: CONTACTO (SIEMPRE VISIBLE) --}}
<section id="contacto" class="bg-[#0D0D0D] py-32 relative z-30 border-t border-white/5">
    <div class="container mx-auto px-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24">
            <div>
                <h2 class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.6em] mb-4">Luxure Connection
                </h2>
                <p class="text-5xl font-light tracking-tighter italic text-white mb-12 font-bold">Hablemos de tu
                    <br><span class="text-[#C9A24A] font-black italic uppercase">próximo deportivo.</span>
                </p>
                <div class="space-y-8 text-gray-400 italic font-bold">
                    <p>Av. Paseo de los Héroes, 101, Guadalajara, Jalisco.</p>
                    <p>+52 33 1234 5678</p>
                </div>
            </div>
            <div class="bg-black/40 p-10 rounded-2xl border border-white/5 shadow-2xl text-white font-bold">
                <form action="#" class="space-y-8">
                    <input type="text" placeholder="Nombre Completo"
                        class="w-full bg-transparent border-b border-white/10 py-3 focus:outline-none focus:border-[#C9A24A] transition-colors italic">
                    <input type="email" placeholder="Correo Electrónico"
                        class="w-full bg-transparent border-b border-white/10 py-3 focus:outline-none focus:border-[#C9A24A] transition-colors italic">
                    <textarea placeholder="Mensaje" rows="3"
                        class="w-full bg-transparent border-b border-white/10 py-3 focus:outline-none focus:border-[#C9A24A] transition-colors italic resize-none"></textarea>
                    <button type="submit" class="btn-lux w-full font-bold text-white">Enviar Solicitud</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    window.addEventListener('load', function() {
    // 1. Slider del Hero
    const heroItems = document.querySelectorAll('.hero-item');
    let currentHero = 0;
    setInterval(() => {
        heroItems[currentHero].classList.remove('active');
        currentHero = (currentHero + 1) % heroItems.length;
        heroItems[currentHero].classList.add('active');
    }, 5000);

    // 2. Lógica del Catálogo
    const track = document.getElementById('track');
    const autos = [
        { n: 'Azure Race', p: '$410k', u: 'https://images.unsplash.com/photo-1544636331-e26879cd4d9b?q=80&w=1200' }, 
        { n: 'Classic Mod', p: '$160k', u: 'https://images.unsplash.com/photo-1553440569-bcc63803a83d?q=80&w=1200' },
        { n: 'Vanquish S', p: '$210k', u: 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200' },
        { n: 'Stradale GT', p: '$285k', u: 'https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?q=80&w=1200' },
        { n: 'Apex Concept', p: '$350k', u: 'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?q=80&w=1200' },
        { n: 'Formula S', p: '$195k', u: 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=90&w=1200' },
        { n: 'Legacy GTR', p: '$220k', u: 'https://images.unsplash.com/photo-1542362567-b07e54358753?q=80&w=1200' },
        { n: 'White Sport', p: '$180k', u: 'https://images.unsplash.com/photo-1619682817481-e994891cd1f5?q=80&w=1200' }
    ];

    const html = autos.map(a => `
        <div class="card-element w-[85vw] md:w-[45vw] lg:w-[30vw] px-4 flex-shrink-0">
            <div class="group relative overflow-hidden rounded-2xl bg-black h-[550px] border border-white/5">
                <img src="${a.u}" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition duration-700">
                <div class="absolute inset-0 p-10 flex flex-col justify-end bg-gradient-to-t from-black/90">
                    <h4 class="text-3xl font-black italic uppercase text-white font-bold tracking-tighter">${a.n}</h4>
                    <p class="text-[#C9A24A] font-bold text-sm mt-2 uppercase text-gold">${a.p} USD</p>
                </div>
            </div>
        </div>
    `).join('');

    track.innerHTML = html + html + html;
    let posX = 0, isPaused = false, isManual = false;
    const cardW = track.querySelector('.card-element').offsetWidth;
    const fullW = autos.length * cardW;
    posX = -fullW;

    function step() {
        if (!isPaused && !isManual) {
            posX -= 1.0; 
            if (Math.abs(posX) >= fullW * 2) posX = -fullW;
            track.style.transform = `translate3d(${posX}px, 0, 0)`;
        }
        requestAnimationFrame(step);
    }

    const move = (dir) => {
        if(isManual) return;
        isManual = true;
        const snap = Math.round(posX / cardW);
        posX = (dir === 'next' ? snap - 1 : snap + 1) * cardW;
        track.style.transition = "transform 0.6s cubic-bezier(0.19, 1, 0.22, 1)";
        track.style.transform = `translate3d(${posX}px, 0, 0)`;
        setTimeout(() => {
            track.style.transition = "none";
            isManual = false;
            if (Math.abs(posX) >= fullW * 2) posX = -fullW;
            if (posX >= 0) posX = -fullW;
            track.style.transform = `translate3d(${posX}px, 0, 0)`;
        }, 600);
    }

    document.getElementById('next-cat').onclick = () => move('next');
    document.getElementById('prev-cat').onclick = () => move('prev');
    document.getElementById('catalogo-section').onmouseenter = () => isPaused = true;
    document.getElementById('catalogo-section').onmouseleave = () => isPaused = false;
    requestAnimationFrame(step);
});
</script>
@endsection