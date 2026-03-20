@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center bg-black px-6">
    <div class="w-full max-w-md">
        <div class="bg-[#0D0D0D] border border-white/5 p-10 rounded-3xl shadow-2xl backdrop-blur-md bg-opacity-80">

            @if (session('status'))
            <div class="text-center">
                <div class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.6em] mb-4">Sistema Actualizado
                </div>
                <p class="text-3xl font-light italic tracking-tight text-white mb-8">Enlace Enviado</p>

                <div class="mb-10 p-6 bg-green-900/10 border border-green-500/30 rounded-2xl">
                    <p class="text-green-400 text-xs uppercase tracking-[0.2em] leading-loose">
                        Hemos enviado un enlace de recuperación a tu bandeja de entrada.
                    </p>
                </div>

                <a href="{{ route('login') }}" class="btn-lux w-full text-white font-bold inline-block text-center">
                    Volver al Inicio de Sesión
                </a>
            </div>
            @else
            <div class="text-center mb-10">
                <h2 class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.6em] mb-4">Recuperación de
                    Sistema</h2>
                <p class="text-3xl font-light italic tracking-tight text-white">Restablecer Contraseña</p>
            </div>

            <form method="POST" action="{{ route('password.email') }}" class="space-y-8">
                @csrf
                <div class="space-y-2">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Correo Electrónico de
                        Usuario</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-transparent border-b border-white/10 py-2 text-white focus:outline-none focus:border-[#C9A24A] transition-colors italic">
                    @error('email')
                    <span class="text-red-500 text-[0.6rem] uppercase mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-6">
                    <button type="submit" class="btn-lux w-full text-white font-bold">Enviar Enlace de Acceso</button>
                </div>
            </form>

            <div class="text-center mt-8">
                <a href="{{ route('login') }}"
                    class="text-gray-500 text-[0.7rem] uppercase tracking-widest hover:text-white transition">
                    ← Volver al inicio de sesión
                </a>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection