@extends('layouts.app')

@section('content')

PHP
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
            <img src="{{ $url }}" class="w-full h-full object-cover grayscale-[15%]" alt="Luxure Hero">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0D0D0D] via-transparent to-black/30"></div>
        </div>
        @endforeach
    </div>
    <div class="relative z-20 px-10 md:px-20 text-white font-bold">
        <h1 class="text-5xl md:text-8xl font-light tracking-tighter leading-none mb-8 uppercase">
            Autos de lujo y<br><span class="font-black italic text-[#C9A24A]">alto rendimiento.</span>
        </h1>
        <a href="#catalogo" class="btn-lux inline-block text-white font-bold">Ver catálogo</a>
    </div>
</section>

<section id="catalogo-section" class="bg-[#0D0D0D] py-32 overflow-hidden relative z-30">
    <div class="container mx-auto px-10 mb-16">
        <h2 class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.6em] mb-4 text-gold">Mundo Luxure</h2>
        <p class="text-4xl font-light tracking-tight italic text-white font-bold">Catálogo de Selección</p>
    </div>

    <div class="relative w-full overflow-hidden">
        <button id="prev-cat"
            class="nav-btn absolute left-10 top-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-black/60 border border-[#C9A24A]/40 flex items-center justify-center text-[#C9A24A] hover:bg-[#C9A24A] hover:text-black">❮</button>
        <button id="next-cat"
            class="nav-btn absolute right-10 top-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-black/60 border border-[#C9A24A]/40 flex items-center justify-center text-[#C9A24A] hover:bg-[#C9A24A] hover:text-black">❯</button>

        <div id="track" class="flex w-max will-change-transform">
            @php
            $autos = [
            ['Azure Race', '$410k USD', 'https://images.unsplash.com/photo-1544636331-e26879cd4d9b?q=80&w=1200'],
            ['Classic Mod', '$160k USD', 'https://images.unsplash.com/photo-1553440569-bcc63803a83d?q=80&w=1200'],
            ['Vanquish S', '$210k USD', 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200'],
            ['Stradale GT', '$285k USD', 'https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?q=80&w=1200'],
            ['Apex Concept', '$350k USD', 'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?q=80&w=1200'],
            ['Formula S', '$195k USD', 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=1200'],
            ['Legacy GTR', '$220k USD', 'https://images.unsplash.com/photo-1542362567-b07e54358753?q=80&w=1200'],
            ['White Sport', '$180k USD', 'https://images.unsplash.com/photo-1619682817481-e994891cd1f5?q=80&w=1200']
            ];
            @endphp
        </div>
    </div>
</section>

<section class="py-32 bg-[#0D0D0D] border-t border-white/10 relative z-30">
    <div class="container mx-auto px-10 grid grid-cols-1 md:grid-cols-3 gap-20">
        <div class="border-t border-white/10 pt-8">
            <span class="text-[#C9A24A] text-[0.6rem] font-black tracking-[0.4em] uppercase mb-4 block">01</span>
            <h3 class="text-xl font-bold uppercase mb-4 text-white">Garantía Premium</h3>
            <p class="text-gray-500 text-sm font-light">Respaldo total en cada kilómetro.</p>
        </div>
        <div class="border-t border-white/10 pt-8">
            <span class="text-[#C9A24A] text-[0.6rem] font-black tracking-[0.4em] uppercase mb-4 block">02</span>
            <h3 class="text-xl font-bold uppercase mb-4 text-white">Autos Certificados</h3>
            <p class="text-gray-500 text-sm font-light">Exclusividad verificada por expertos.</p>
        </div>
        <div class="border-t border-white/10 pt-8">
            <span class="text-[#C9A24A] text-[0.6rem] font-black tracking-[0.4em] uppercase mb-4 block">03</span>
            <h3 class="text-xl font-bold uppercase mb-4 text-white">Financiamiento</h3>
            <p class="text-gray-500 text-sm font-light">Planes diseñados a tu medida.</p>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('track');
    const section = document.getElementById('catalogo-section');
    const autos = {!! json_encode($autos) !!};
    
    const renderCards = (data) => data.map(auto => `
        <div class="card-element w-[85vw] md:w-[45vw] lg:w-[30vw] px-4 flex-shrink-0">
            <div class="group relative overflow-hidden rounded-2xl bg-black h-[550px] border border-white/5 shadow-2xl">
                <img src="${auto[2]}" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition duration-700">
                <div class="absolute inset-0 p-10 flex flex-col justify-end bg-gradient-to-t from-black/90 via-transparent">
                    <h4 class="text-3xl font-black italic uppercase text-white font-bold">${auto[0]}</h4>
                    <p class="text-[#C9A24A] font-bold text-sm mt-2 tracking-widest uppercase font-bold">${auto[1]}</p>
                </div>
            </div>
        </div>
    `).join('');

    // Triple clonado para evitar huecos en cualquier dirección
    track.innerHTML = renderCards(autos) + renderCards(autos) + renderCards(autos);

    let x = 0;
    const speed = 1.0; 
    let isPaused = false;
    let isTransitioning = false;

    const cardWidth = () => track.querySelector('.card-element').offsetWidth;
    const setWidth = () => (autos.length * cardWidth());
    
    // Iniciar en el set central
    x = -setWidth();

    function animate() {
        if (!isPaused && !isTransitioning) {
            x -= speed;
            
            // Si pasamos el segundo set completo, saltamos silenciosamente al inicio del central
            if (Math.abs(x) >= setWidth() * 2) {
                x = -setWidth();
            }
            track.style.transform = `translateX(${x}px)`;
        }
        requestAnimationFrame(animate);
    }

    const moveManual = (direction) => {
        if (isTransitioning) return;
        isTransitioning = true;
        
        const width = cardWidth();
        // Calculamos la carta más cercana para enganche magnético
        const currentCardIndex = Math.round(x / width);
        
        if (direction === 'next') {
            x = (currentCardIndex - 1) * width;
        } else {
            x = (currentCardIndex + 1) * width;
        }

        track.style.transition = "transform 0.6s cubic-bezier(0.19, 1, 0.22, 1)";
        track.style.transform = `translateX(${x}px)`;

        setTimeout(() => {
            track.style.transition = "none";
            isTransitioning = false;
            
            // Re-ajuste de seguridad para infinito
            const sWidth = setWidth();
            if (Math.abs(x) >= sWidth * 2) x = -sWidth + (x % width);
            if (x > -sWidth / 2) x = -sWidth - (Math.abs(x) % width);
            
            track.style.transform = `translateX(${x}px)`;
        }, 600);
    }

    document.getElementById('next-cat').addEventListener('click', () => moveManual('next'));
    document.getElementById('prev-cat').addEventListener('click', () => moveManual('prev'));

    section.addEventListener('mouseenter', () => isPaused = true);
    section.addEventListener('mouseleave', () => isPaused = false);

    animate();
});
</script>

@endsection