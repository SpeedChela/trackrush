@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Bodega</h2>
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

            <form action="{{ route('bodegas.update', $bodega->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                           name="nombre" id="nombre" value="{{ old('nombre', $bodega->nombre) }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                           name="direccion" id="direccion" value="{{ old('direccion', $bodega->direccion) }}" required>
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control @error('telefono') is-invalid @enderror" 
                           name="telefono" id="telefono" value="{{ old('telefono', $bodega->telefono) }}" 
                           pattern="[0-9]{10}" title="Ingrese un número de teléfono válido de 10 dígitos" required>
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" id="email" value="{{ old('email', $bodega->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="municipio_id">Municipio</label>
                    <select class="form-control @error('municipio_id') is-invalid @enderror" 
                            name="municipio_id" id="municipio_id" required>
                        <option value="">Seleccionar municipio...</option>
                        @foreach($municipios as $municipio)
                            <option value="{{ $municipio->id }}" 
                                {{ old('municipio_id', $bodega->municipio_id) == $municipio->id ? 'selected' : '' }}>
                                {{ $municipio->nombre }}, {{ $municipio->entidad->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('municipio_id')
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
                                {{ old('estatus_id', $bodega->estatus_id) == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('estatus_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Actualizar Bodega</button>
                    <a href="{{ route('bodegas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection