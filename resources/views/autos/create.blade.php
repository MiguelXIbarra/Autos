@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row">
        <h2>Registrar Nuevo Auto</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('autos.store') }}" method="post" class="col-lg-7">
            @csrf
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="{{old('marca')}}" required />
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{old('modelo')}}" required />
            </div>
            <div class="form-group">
                <label for="anio">Año</label>
                <input type="number" class="form-control" id="anio" name="anio" value="{{old('anio')}}" required />
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="{{old('precio')}}" required />
            </div>
            <br>
            <button type="submit" class="btn btn-success">Guardar Registro</button>
            <a href="{{ route('autos.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>
@endsection