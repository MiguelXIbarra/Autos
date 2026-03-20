@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center bg-black px-6">
    <div class="w-full max-w-md">
        {{-- Tarjeta de Login --}}
        <div class="bg-[#0D0D0D] border border-white/5 p-10 rounded-3xl shadow-2xl backdrop-blur-md bg-opacity-80">
            <div class="text-center mb-10">
                <h2 class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.6em] mb-4">Acceso Exclusivo
                </h2>
                <p class="text-3xl font-light italic tracking-tight text-white">Iniciar Sesión</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-8">
                @csrf

                {{-- Email --}}
                <div class="space-y-2">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Identificación
                        (Email)</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-transparent border-b border-white/10 py-2 text-white focus:outline-none focus:border-[#C9A24A] transition-colors italic @error('email') border-red-500 @enderror">
                    @error('email')
                    <span class="text-red-500 text-[0.6rem] uppercase mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="space-y-2">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Código de Acceso
                        (Contraseña)</label>
                    <input type="password" name="password" required
                        class="w-full bg-transparent border-b border-white/10 py-2 text-white focus:outline-none focus:border-[#C9A24A] transition-colors italic @error('password') border-red-500 @enderror">
                    @error('password')
                    <span class="text-red-500 text-[0.6rem] uppercase mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Opciones --}}
                <div class="flex items-center justify-between pt-2">
                    <label
                        class="flex items-center text-[0.6rem] uppercase tracking-widest text-gray-500 cursor-pointer hover:text-white transition">
                        <input type="checkbox" name="remember" class="mr-2 accent-[#C9A24A]"> Recordarme
                    </label>
                    @if (Route::has('password.request'))
                    {{-- Cambio solicitado aquí --}}
                    <a href="{{ route('password.request') }}"
                        class="text-[0.6rem] uppercase tracking-widest text-[#C9A24A] hover:text-white transition">¿Olvidó
                        su contraseña?</a>
                    @endif
                </div>

                {{-- Botón --}}
                <div class="pt-6">
                    <button type="submit" class="btn-lux w-full text-white font-bold">Autenticar Entrada</button>
                </div>
            </form>
        </div>

        {{-- Link a Registro --}}
        <div class="text-center mt-8">
            <p class="text-gray-500 text-[0.7rem] uppercase tracking-widest">
                ¿No tiene credenciales?
                <a href="{{ route('register') }}" class="text-white hover:text-[#C9A24A] transition ml-2">Solicitar
                    Registro</a>
            </p>
        </div>
    </div>
</div>
@endsection