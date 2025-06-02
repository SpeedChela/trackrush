@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Entrega</h2>
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

            <form action="{{ route('entregas.update', $entrega->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="id_paquete">Paquete</label>
                    <select class="form-control @error('id_paquete') is-invalid @enderror" 
                            name="id_paquete" id="id_paquete" required>
                        <option value="">Seleccionar paquete...</option>
                        @foreach($paquetes as $paquete)
                            <option value="{{ $paquete->id }}" 
                                {{ old('id_paquete', $entrega->id_paquete) == $paquete->id ? 'selected' : '' }}>
                                {{ $paquete->codigo }} - {{ $paquete->bodegaOrigen->nombre }} a {{ $paquete->bodegaDestino->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_paquete')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_driver">Conductor</label>
                    <select class="form-control @error('id_driver') is-invalid @enderror" 
                            name="id_driver" id="id_driver" required>
                        <option value="">Seleccionar conductor...</option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}" 
                                {{ old('id_driver', $entrega->id_driver) == $driver->id ? 'selected' : '' }}>
                                {{ $driver->nombre }} - {{ $driver->licencia }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_driver')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado_actual">Estado</label>
                    <select class="form-control @error('estado_actual') is-invalid @enderror" 
                            name="estado_actual" id="estado_actual" required>
                        <option value="">Seleccionar estado...</option>
                        <option value="Pendiente" {{ old('estado_actual', $entrega->estado_actual) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En Proceso" {{ old('estado_actual', $entrega->estado_actual) == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="Completada" {{ old('estado_actual', $entrega->estado_actual) == 'Completada' ? 'selected' : '' }}>Completada</option>
                        <option value="Cancelada" {{ old('estado_actual', $entrega->estado_actual) == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    @error('estado_actual')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_entrega">Fecha de Entrega</label>
                    <input type="datetime-local" class="form-control @error('fecha_entrega') is-invalid @enderror" 
                           name="fecha_entrega" id="fecha_entrega" 
                           value="{{ old('fecha_entrega', $entrega->fecha_entrega ? $entrega->fecha_entrega->format('Y-m-d\TH:i') : '') }}">
                    @error('fecha_entrega')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Entrega
                    </button>
                    <a href="{{ route('entregas.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection