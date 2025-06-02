@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Paquete</h2>
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

            <form action="{{ route('paquetes.update', $paquete->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" class="form-control @error('codigo') is-invalid @enderror" 
                           name="codigo" id="codigo" value="{{ old('codigo', $paquete->codigo) }}" required>
                    @error('codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" step="0.01" class="form-control @error('peso') is-invalid @enderror" 
                           name="peso" id="peso" value="{{ old('peso', $paquete->peso) }}" required>
                    @error('peso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dimensiones">Dimensiones</label>
                    <input type="text" class="form-control @error('dimensiones') is-invalid @enderror" 
                           name="dimensiones" id="dimensiones" value="{{ old('dimensiones', $paquete->dimensiones) }}" 
                           placeholder="Largo x Ancho x Alto" required>
                    @error('dimensiones')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                              name="descripcion" id="descripcion" rows="3" required>{{ old('descripcion', $paquete->descripcion) }}</textarea>
                    @error('descripcion')
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
                                {{ old('estatus_id', $paquete->estatus_id) == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('estatus_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bodega_origen_id">Bodega de Origen</label>
                    <select class="form-control @error('bodega_origen_id') is-invalid @enderror" 
                            name="bodega_origen_id" id="bodega_origen_id" required>
                        <option value="">Seleccionar bodega de origen...</option>
                        @foreach($bodegas as $bodega)
                            <option value="{{ $bodega->id }}" 
                                {{ old('bodega_origen_id', $paquete->bodega_origen_id) == $bodega->id ? 'selected' : '' }}>
                                {{ $bodega->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('bodega_origen_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bodega_destino_id">Bodega de Destino</label>
                    <select class="form-control @error('bodega_destino_id') is-invalid @enderror" 
                            name="bodega_destino_id" id="bodega_destino_id" required>
                        <option value="">Seleccionar bodega de destino...</option>
                        @foreach($bodegas as $bodega)
                            <option value="{{ $bodega->id }}" 
                                {{ old('bodega_destino_id', $paquete->bodega_destino_id) == $bodega->id ? 'selected' : '' }}>
                                {{ $bodega->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('bodega_destino_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Actualizar Paquete</button>
                    <a href="{{ route('paquetes.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection