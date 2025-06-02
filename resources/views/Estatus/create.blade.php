@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Crear Nuevo Estado</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('estatus.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="bodega" class="form-label">Bodega</label>
                            <input type="text" class="form-control @error('bodega') is-invalid @enderror" 
                                   name="bodega" id="bodega" value="{{ old('bodega') }}" required 
                                   placeholder="Ingrese el nombre de la bodega">
                            @error('bodega')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="ruta" class="form-label">Ruta</label>
                            <input type="text" class="form-control @error('ruta') is-invalid @enderror" 
                                   name="ruta" id="ruta" value="{{ old('ruta') }}" required 
                                   placeholder="Ingrese la ruta">
                            @error('ruta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="entregado" class="form-label">Estado de Entrega</label>
                            <select class="form-select @error('entregado') is-invalid @enderror" 
                                    name="entregado" id="entregado" required>
                                <option value="">Seleccionar estado...</option>
                                <option value="1" {{ old('entregado') == '1' ? 'selected' : '' }}>Entregado</option>
                                <option value="0" {{ old('entregado') == '0' ? 'selected' : '' }}>No Entregado</option>
                            </select>
                            @error('entregado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="devuelto" class="form-label">Estado de Devolución</label>
                            <select class="form-select @error('devuelto') is-invalid @enderror" 
                                    name="devuelto" id="devuelto" required>
                                <option value="">Seleccionar estado...</option>
                                <option value="1" {{ old('devuelto') == '1' ? 'selected' : '' }}>Devuelto</option>
                                <option value="0" {{ old('devuelto') == '0' ? 'selected' : '' }}>No Devuelto</option>
                            </select>
                            @error('devuelto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Estado
                    </button>
                    <a href="{{ route('estatus.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection