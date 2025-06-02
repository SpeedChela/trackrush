@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Crear Nueva Entidad</h2>
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

            <form action="{{ route('entidades.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                           name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_pais">País</label>
                    <select class="form-control @error('id_pais') is-invalid @enderror" 
                            name="id_pais" id="id_pais" required>
                        <option value="">Seleccionar país...</option>
                        @foreach($paises as $pais)
                            <option value="{{ $pais->id }}" {{ old('id_pais') == $pais->id ? 'selected' : '' }}>
                                {{ $pais->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_pais')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Estado</label>
                    <select class="form-control @error('status') is-invalid @enderror" 
                            name="status" id="status" required>
                        <option value="">Seleccionar estado...</option>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Entidad
                    </button>
                    <a href="{{ route('entidades.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection