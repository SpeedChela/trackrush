@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Empresa</h1>
    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <button type="submit">Guardar Empresa</button>
    </form>
</div>
@endsection