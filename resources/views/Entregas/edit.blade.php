@extends('template.master')

@section('contenido')
<div class="container">
    <h1>Editar Entrega</h1>
    <form action="{{ route('entregas.update', $entrega->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="id_paquete">id_paquete</label>
        <select name="id_paquete" id="id_paquete" required>
            <option value="">Seleccionar ...</option>
            @foreach($paquetes as $paquete)
                <option value="{{ $paquete->id }}" @if(old('id_paquete', $entrega->id_paquete) == $paquete->id) selected @endif>{{ $paquete->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_driver">id_driver</label>
        <select name="id_driver" id="id_driver" required>
            <option value="">Seleccionar ...</option>
            @foreach($drivers as $driver)
                <option value="{{ $driver->id }}" @if(old('id_driver', $entrega->id_driver) == $driver->id) selected @endif>{{ $driver->id }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="id_historico">id_historico</label>
        <select name="id_historico" id="id_historico" required>
            <option value="">Seleccionar ...</option>
            @foreach($historicos as $historico)
                <option value="{{ $historico->id }}" @if(old('id_historico', $entrega->id_historico) == $historico->id) selected @endif>{{ $historico->id }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Actualizar Entrega</button>
    </form>
    <br>
    <a href="{{ route('entregas.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection