@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Conductor</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                           name="nombre" id="nombre" value="{{ old('nombre', $driver->nombre) }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control @error('telefono') is-invalid @enderror" 
                           name="telefono" id="telefono" value="{{ old('telefono', $driver->telefono) }}" 
                           pattern="[0-9]{10}" title="Ingrese un número de teléfono válido de 10 dígitos" required>
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="licencia">Número de Licencia</label>
                    <input type="text" class="form-control @error('licencia') is-invalid @enderror" 
                           name="licencia" id="licencia" value="{{ old('licencia', $driver->licencia) }}" required>
                    @error('licencia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vehiculo_id">Vehículo</label>
                    <select class="form-control @error('vehiculo_id') is-invalid @enderror" 
                            name="vehiculo_id" id="vehiculo_id">
                        <option value="">Seleccionar vehículo...</option>
                        @foreach($vehiculos as $vehiculo)
                            <option value="{{ $vehiculo->id }}" 
                                {{ old('vehiculo_id', $driver->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}>
                                {{ $vehiculo->placa }} - {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                            </option>
                        @endforeach
                    </select>
                    @error('vehiculo_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ruta_id">Ruta</label>
                    <select class="form-control @error('ruta_id') is-invalid @enderror" 
                            name="ruta_id" id="ruta_id">
                        <option value="">Seleccionar ruta...</option>
                        @foreach($rutas as $ruta)
                            <option value="{{ $ruta->id }}" 
                                {{ old('ruta_id', $driver->ruta_id) == $ruta->id ? 'selected' : '' }}>
                                {{ $ruta->codigo }} - {{ $ruta->origen->nombre }} a {{ $ruta->destino->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('ruta_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estatus_id">Estado</label>
                    <select class="form-control @error('estatus_id') is-invalid @enderror" 
                            name="estatus_id" id="estatus_id" required>
                        <option value="">Seleccionar estado...</option>
                        @foreach($estatus as $estado)
                            <option value="{{ $estado->id }}" 
                                {{ old('estatus_id', $driver->estatus_id) == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('estatus_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Conductor
                    </button>
                    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection