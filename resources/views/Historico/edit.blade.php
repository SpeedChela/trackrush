@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Registro Histórico</h2>
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

            <form action="{{ route('historico.update', $historico->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
                            <input type="datetime-local" class="form-control @error('fecha_entrada') is-invalid @enderror" 
                                   name="fecha_entrada" id="fecha_entrada" 
                                   value="{{ old('fecha_entrada', $historico->fecha_entrada ? date('Y-m-d\TH:i', strtotime($historico->fecha_entrada)) : '') }}" 
                                   required>
                            @error('fecha_entrada')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="fecha_salida" class="form-label">Fecha de Salida</label>
                            <input type="datetime-local" class="form-control @error('fecha_salida') is-invalid @enderror" 
                                   name="fecha_salida" id="fecha_salida" 
                                   value="{{ old('fecha_salida', $historico->fecha_salida ? date('Y-m-d\TH:i', strtotime($historico->fecha_salida)) : '') }}">
                            @error('fecha_salida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="id_estatus" class="form-label">Estado</label>
                            <select class="form-select @error('id_estatus') is-invalid @enderror" 
                                    name="id_estatus" id="id_estatus" required>
                                <option value="">Seleccionar estado...</option>
                                @foreach($estatus as $estatu)
                                    <option value="{{ $estatu->id }}" 
                                        @if(old('id_estatus', $historico->id_estatus) == $estatu->id) selected @endif>
                                        {{ $estatu->bodega }} - {{ $estatu->ruta }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_estatus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="comentarios" class="form-label">Comentarios</label>
                            <textarea class="form-control @error('comentarios') is-invalid @enderror" 
                                      name="comentarios" id="comentarios" rows="4" 
                                      placeholder="Ingrese los comentarios relevantes">{{ old('comentarios', $historico->comentarios) }}</textarea>
                            @error('comentarios')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Registro
                    </button>
                    <a href="{{ route('historico.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection