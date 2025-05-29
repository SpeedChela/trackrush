@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Driver</h1>
    <form action="{{ route('drivers.store') }}" method="POST">
        @csrf
        <label for="id_vehiculo">id_vehiculo</label>
        <select name="id_vehiculo" id="id_vehiculo" required>
            <option value="">Seleccionar ...</option>
            @foreach($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}">{{ $vehiculo->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_ruta">id_ruta</label>
        <select name="id_ruta" id="id_ruta" required>
            <option value="">Seleccionar ...</option>
            @foreach($rutas as $ruta)
                <option value="{{ $ruta->id }}">{{ $ruta->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_paquete">id_paquete</label>
        <select name="id_paquete" id="id_paquete" required>
            <option value="">Seleccionar ...</option>
            @foreach($paquetes as $paquete)
                <option value="{{ $paquete->id }}">{{ $paquete->id }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Guardar Driver</button>
    </form>
</div>
@endsection