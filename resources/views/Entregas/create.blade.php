@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Crear Entrega</h1>
    <form action="{{ route('entregas.store') }}" method="POST">
        @csrf
        <label for="id_paquete">id_paquete</label>
        <select name="id_paquete" id="id_paquete" required>
            <option value="">Seleccionar ...</option>
            @foreach($paquetes as $paquete)
                <option value="{{ $paquete->id }}">{{ $paquete->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_driver">id_driver</label>
        <select name="id_driver" id="id_driver" required>
            <option value="">Seleccionar ...</option>
            @foreach($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_historico">id_historico</label>
        <select name="id_historico" id="id_historico" required>
            <option value="">Seleccionar ...</option>
            @foreach($historicos as $historico)
                <option value="{{ $historico->id }}">{{ $historico->id }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Guardar Entrega</button>
    </form>
</div>
@endsection