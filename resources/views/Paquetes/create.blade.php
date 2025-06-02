<h1>Crear Paquete</h1>
<form action="/{str.lower(model)}" method="POST">
    @csrf
    <label>id_bodega:</label><input type="text" name="id_bodega" required><br><label>guia:</label><input type="text" name="guia" required><br><label>peso:</label><input type="text" name="peso" required><br><label>estado:</label><input type="text" name="estado" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="/{str.lower(model)}">Volver al listado</a>
@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Crear Nuevo Paquete</h2>
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

            <form action="{{ route('paquetes.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" class="form-control @error('codigo') is-invalid @enderror" 
                           name="codigo" id="codigo" value="{{ old('codigo') }}" required>
                    @error('codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" step="0.01" class="form-control @error('peso') is-invalid @enderror" 
                           name="peso" id="peso" value="{{ old('peso') }}" required>
                    @error('peso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dimensiones">Dimensiones</label>
                    <input type="text" class="form-control @error('dimensiones') is-invalid @enderror" 
                           name="dimensiones" id="dimensiones" value="{{ old('dimensiones') }}" 
                           placeholder="Largo x Ancho x Alto" required>
                    @error('dimensiones')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                              name="descripcion" id="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
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
                            <option value="{{ $estado->id }}" {{ old('estatus_id') == $estado->id ? 'selected' : '' }}>
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
                            <option value="{{ $bodega->id }}" {{ old('bodega_origen_id') == $bodega->id ? 'selected' : '' }}>
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
                            <option value="{{ $bodega->id }}" {{ old('bodega_destino_id') == $bodega->id ? 'selected' : '' }}>
                                {{ $bodega->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('bodega_destino_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Guardar Paquete</button>
                    <a href="{{ route('paquetes.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection