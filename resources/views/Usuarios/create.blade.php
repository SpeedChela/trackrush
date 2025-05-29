@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <label for="email">email</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="password">password</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <button type="submit">Guardar Usuario</button>
    </form>
</div>
@endsection