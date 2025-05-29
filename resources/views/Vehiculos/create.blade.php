@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Vehículo</h1>
    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <label for="placa">placa</label>
        <input type="text" name="placa" id="placa" required>
        <br><br>
        <label for="modelo">modelo</label>
        <input type="text" name="modelo" id="modelo" required>
        <br><br>
        <label for="marca">marca</label>
        <input type="text" name="marca" id="marca" required>
        <br><br>
        <button type="submit">Guardar Vehículo</button>
    </form>
</div>
@endsection