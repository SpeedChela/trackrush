@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Moderador</h2>
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

            <form action="{{ route('moderadores.update', $moderador->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="id_usuario" class="form-label">Usuario</label>
                            <select class="form-select @error('id_usuario') is-invalid @enderror" 
                                    name="id_usuario" id="id_usuario" required>
                                <option value="">Seleccionar usuario...</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" 
                                        @if(old('id_usuario', $moderador->id_usuario) == $usuario->id) selected @endif>
                                        {{ $usuario->nombre }} {{ $usuario->apellido }} - {{ $usuario->email }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_usuario')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="id_bodega" class="form-label">Bodega</label>
                            <select class="form-select @error('id_bodega') is-invalid @enderror" 
                                    name="id_bodega" id="id_bodega" required>
                                <option value="">Seleccionar bodega...</option>
                                @foreach($bodegas as $bodega)
                                    <option value="{{ $bodega->id }}" 
                                        @if(old('id_bodega', $moderador->id_bodega) == $bodega->id) selected @endif>
                                        {{ $bodega->nombre }} - {{ $bodega->ubicacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_bodega')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Moderador
                    </button>
                    <a href="{{ route('moderadores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection