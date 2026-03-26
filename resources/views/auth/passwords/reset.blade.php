@isset($url)
<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        body {
            background-color: #000;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .container {
            background-color: #0D0D0D;
            max-width: 600px;
            margin: 40px auto;
            border: 1px solid #1a1a1a;
            border-radius: 20px;
            overflow: hidden;
        }

        .content {
            padding: 50px;
            text-align: center;
        }

        .logo {
            color: #fff;
            font-size: 24px;
            font-weight: 900;
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .gold {
            color: #C9A24A;
        }

        h1 {
            color: #fff;
            font-size: 20px;
            font-weight: 200;
            text-transform: uppercase;
            letter-spacing: 2px;
            line-height: 1.5;
        }

        p {
            color: #666;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .btn-lux {
            display: inline-block;
            padding: 15px 40px;
            background-color: #C9A24A;
            color: #000 !important;
            text-decoration: none;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
            border-radius: 4px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #333;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="logo">LUXURE<span class="gold">.</span></div>
            <h1>Solicitud de <br><span class="gold italic">Restablecimiento</span></h1>
            <p>Se ha solicitado un cambio de credenciales para tu cuenta. Si no has sido tú, ignora este mensaje.</p>
            <a href="{{ $url }}" class="btn-lux">Restablecer Contraseña</a>
            <p style="margin-top: 40px; font-size: 11px;">Este enlace expira en 60 minutos.</p>
        </div>
    </div>
    <div class="footer">&copy; {{ date('Y') }} Luxure Connection</div>
</body>

</html>
@else
@extends('layouts.app')
@section('content')
<div class="min-h-screen w-full flex items-center justify-center bg-black px-6 py-20">
    <div class="w-full max-w-md">
        <div class="bg-[#0D0D0D] border border-white/5 p-10 rounded-3xl shadow-2xl backdrop-blur-md bg-opacity-80">
            <div class="text-center mb-10">
                <h2 class="text-[0.6rem] text-[#C9A24A] font-black uppercase tracking-[0.6em] mb-4">Actualización de
                    Credenciales</h2>
                <p class="text-3xl font-light italic tracking-tight text-white">Nueva Contraseña</p>
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="space-y-2">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Confirmar
                        Email</label>
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus
                        class="w-full bg-transparent border-b border-white/10 py-2 text-white focus:outline-none focus:border-[#C9A24A] transition-colors italic">
                    @error('email') <span class="text-red-500 text-[0.6rem] uppercase mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2 relative">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Nueva Contraseña</label>
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

                <div class="space-y-2 relative">
                    <label class="text-[0.6rem] uppercase tracking-widest text-gray-500 font-bold">Confirmar Nueva Contraseña</label>
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
                    <button type="submit" class="btn-lux w-full text-white font-bold">Actualizar y Entrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@endisset