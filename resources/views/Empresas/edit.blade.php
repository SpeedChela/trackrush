@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Empresa</h2>
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

            <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                           name="nombre" id="nombre" value="{{ old('nombre', $empresa->nombre) }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="rfc">RFC</label>
                    <input type="text" class="form-control @error('rfc') is-invalid @enderror" 
                           name="rfc" id="rfc" value="{{ old('rfc', $empresa->rfc) }}">
                    @error('rfc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                           name="direccion" id="direccion" value="{{ old('direccion', $empresa->direccion) }}">
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control @error('telefono') is-invalid @enderror" 
                           name="telefono" id="telefono" value="{{ old('telefono', $empresa->telefono) }}"
                           pattern="[0-9]{10}" title="Ingrese un número de teléfono válido de 10 dígitos">
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" id="email" value="{{ old('email', $empresa->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado_actual">Estado</label>
                    <select class="form-control @error('estado_actual') is-invalid @enderror" 
                            name="estado_actual" id="estado_actual" required>
                        <option value="Activa" {{ old('estado_actual', $empresa->estado_actual) == 'Activa' ? 'selected' : '' }}>Activa</option>
                        <option value="Inactiva" {{ old('estado_actual', $empresa->estado_actual) == 'Inactiva' ? 'selected' : '' }}>Inactiva</option>
                    </select>
                    @error('estado_actual')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Empresa
                    </button>
                    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection