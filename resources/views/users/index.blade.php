@extends('adminlte::page')

@section('title', 'Usuarios Registrados')

@section('content_header')
    <h1>Usuarios Registrados</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <h2>Lista de Usuarios</h2>
            <hr>
            <br>
            <p align="right">
                <a href="#" class="btn btn-success">Crear Usuario</a>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    Regresar
                </a>
            </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
