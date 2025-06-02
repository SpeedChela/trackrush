@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Ruta</h2>
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

            <form action="{{ route('rutas.update', $ruta->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" class="form-control @error('codigo') is-invalid @enderror" 
                           name="codigo" id="codigo" value="{{ old('codigo', $ruta->codigo) }}" required>
                    @error('codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="origen_id">Bodega de Origen</label>
                    <select class="form-control @error('origen_id') is-invalid @enderror" 
                            name="origen_id" id="origen_id" required>
                        <option value="">Seleccionar origen...</option>
                        @foreach($bodegas as $bodega)
                            <option value="{{ $bodega->id }}" 
                                {{ old('origen_id', $ruta->origen_id) == $bodega->id ? 'selected' : '' }}>
                                {{ $bodega->nombre }} - {{ $bodega->ubicacion_completa }}
                            </option>
                        @endforeach
                    </select>
                    @error('origen_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="destino_id">Bodega de Destino</label>
                    <select class="form-control @error('destino_id') is-invalid @enderror" 
                            name="destino_id" id="destino_id" required>
                        <option value="">Seleccionar destino...</option>
                        @foreach($bodegas as $bodega)
                            <option value="{{ $bodega->id }}" 
                                {{ old('destino_id', $ruta->destino_id) == $bodega->id ? 'selected' : '' }}>
                                {{ $bodega->nombre }} - {{ $bodega->ubicacion_completa }}
                            </option>
                        @endforeach
                    </select>
                    @error('destino_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="distancia">Distancia (km)</label>
                    <input type="number" class="form-control @error('distancia') is-invalid @enderror" 
                           name="distancia" id="distancia" value="{{ old('distancia', $ruta->distancia) }}" 
                           min="0" step="0.01" required>
                    @error('distancia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tiempo_estimado">Tiempo Estimado (minutos)</label>
                    <input type="number" class="form-control @error('tiempo_estimado') is-invalid @enderror" 
                           name="tiempo_estimado" id="tiempo_estimado" value="{{ old('tiempo_estimado', $ruta->tiempo_estimado) }}" 
                           min="0" required>
                    @error('tiempo_estimado')
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
                                {{ old('estatus_id', $ruta->estatus_id) == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('estatus_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Actualizar Ruta</button>
                    <a href="{{ route('rutas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection