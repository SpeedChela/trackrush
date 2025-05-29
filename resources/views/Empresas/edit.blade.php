@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Empresa</h1>
    <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $empresa->nombre) }}" required>
        <br><br>
        <button type="submit">Actualizar Empresa</button>
    </form>
    <br>
    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection