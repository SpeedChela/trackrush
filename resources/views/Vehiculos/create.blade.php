@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Crear Nuevo Vehículo</h2>
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

            <form action="{{ route('vehiculos.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="placa">Placa</label>
                    <input type="text" class="form-control @error('placa') is-invalid @enderror" 
                           name="placa" id="placa" value="{{ old('placa') }}" required>
                    @error('placa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control @error('marca') is-invalid @enderror" 
                           name="marca" id="marca" value="{{ old('marca') }}" required>
                    @error('marca')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control @error('modelo') is-invalid @enderror" 
                           name="modelo" id="modelo" value="{{ old('modelo') }}" required>
                    @error('modelo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="anio">Año</label>
                    <input type="number" class="form-control @error('anio') is-invalid @enderror" 
                           name="anio" id="anio" value="{{ old('anio') }}" 
                           min="1900" max="{{ date('Y') + 1 }}" required>
                    @error('anio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="capacidad">Capacidad (kg)</label>
                    <input type="number" class="form-control @error('capacidad') is-invalid @enderror" 
                           name="capacidad" id="capacidad" value="{{ old('capacidad') }}" 
                           min="0" step="0.01" required>
                    @error('capacidad')
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

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Guardar Vehículo</button>
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection