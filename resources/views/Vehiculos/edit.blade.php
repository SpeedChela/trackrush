@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Vehículo</h1>
    <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="placa">placa</label>
        <input type="text" name="placa" id="placa" value="{{ old('placa', $vehiculo->placa) }}" required>
        <br><br>
        <label for="modelo">modelo</label>
        <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $vehiculo->modelo) }}" required>
        <br><br>
        <label for="marca">marca</label>
        <input type="text" name="marca" id="marca" value="{{ old('marca', $vehiculo->marca) }}" required>
        <br><br>
        <button type="submit">Actualizar Vehículo</button>
    </form>
    <br>
    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection