@extends('layouts.page')

@section('content_body')
<div class="container">
    <div class="row">
        <h2>Editar Auto: {{ $auto->marca }} {{ $auto->modelo }}</h2>
    </div>
    <hr>
    <div class="row">
        <form action="{{ route('autos.update', $auto->id_auto) }}" method="post" class="col-lg-7">
            @csrf
            @method('PUT')

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
                <input type="text" class="form-control" id="marca" name="marca" value="{{ $auto->marca }}" required />
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $auto->modelo }}"
                    required />
            </div>
            <div class="form-group">
                <label for="anio">Año</label>
                <input type="number" class="form-control" id="anio" name="anio" value="{{ $auto->anio }}" required />
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="{{ $auto->precio }}"
                    required />
            </div>
            <br>
            <button type="submit" class="btn btn-success">Actualizar Cambios</button>
            <a href="{{ route('autos.index') }}" class="btn btn-danger">Volver</a>
        </form>
    </div>
</div>
@endsection