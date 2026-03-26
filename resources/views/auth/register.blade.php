@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center bg-black px-6 py-20">
    <div class="w-full max-w-md">
        <div class="bg-[#0D0D0D] border border-white/5 p-10 rounded-3xl shadow-2xl backdrop-blur-md bg-opacity-80">
            <div class="text-center mb-10">
                <h2 class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.6em] mb-4">Membresía Luxure
                </h2>
                <p class="text-3xl font-light italic tracking-tight text-white">Crear Cuenta</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- Nombre --}}
                <div class="space-y-2">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Nombre
                        Completo</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full bg-transparent border-b border-white/10 py-2 text-white focus:outline-none focus:border-[#C9A24A] transition-colors italic">
                    @error('name')
                    <span class="text-red-500 text-[0.6rem] uppercase mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="space-y-2">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Correo
                        Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-transparent border-b border-white/10 py-2 text-white focus:outline-none focus:border-[#C9A24A] transition-colors italic">
                    @error('email')
                    <span class="text-red-500 text-[0.6rem] uppercase mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="space-y-2 relative">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Contraseña</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                            class="w-full bg-transparent border-b border-white/10 py-2 pr-10 text-white focus:outline-none focus:border-[#C9A24A] transition-colors italic">
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute right-0 top-2 text-[0.5rem] uppercase tracking-widest text-[#C9A24A] hover:text-white transition font-bold">
                            Ver
                        </button>
                    </div>
                    @error('password')
                    <span class="text-red-500 text-[0.6rem] uppercase mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="space-y-2 relative">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Confirmar Contraseña</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="w-full bg-transparent border-b border-white/10 py-2 pr-10 text-white focus:outline-none focus:border-[#C9A24A] transition-colors italic">
                        <button type="button" onclick="togglePassword('password_confirmation', this)"
                            class="absolute right-0 top-2 text-[0.5rem] uppercase tracking-widest text-[#C9A24A] hover:text-white transition font-bold">
                            Ver
                        </button>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="btn-lux w-full text-white font-bold">Unirse a la Red</button>
                </div>
            </form>
        </div>

        <div class="text-center mt-8">
            <p class="text-gray-500 text-[0.7rem] uppercase tracking-widest">
                ¿Ya es miembro?
                <a href="{{ route('login') }}" class="text-white hover:text-[#C9A24A] transition ml-2">Ingresar</a>
            </p>
        </div>
    </div>
</div>
@endsection