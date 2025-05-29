@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Driver</h1>
    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="id_vehiculo">id_vehiculo</label>
        <select name="id_vehiculo" id="id_vehiculo" required>
            <option value="">Seleccionar ...</option>
            @foreach($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}" @if(old('id_vehiculo', $driver->id_vehiculo) == $vehiculo->id) selected @endif>{{ $vehiculo->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_ruta">id_ruta</label>
        <select name="id_ruta" id="id_ruta" required>
            <option value="">Seleccionar ...</option>
            @foreach($rutas as $ruta)
                <option value="{{ $ruta->id }}" @if(old('id_ruta', $driver->id_ruta) == $ruta->id) selected @endif>{{ $ruta->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_paquete">id_paquete</label>
        <select name="id_paquete" id="id_paquete" required>
            <option value="">Seleccionar ...</option>
            @foreach($paquetes as $paquete)
                <option value="{{ $paquete->id }}" @if(old('id_paquete', $driver->id_paquete) == $paquete->id) selected @endif>{{ $paquete->id }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Actualizar Driver</button>
    </form>
    <br>
    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection