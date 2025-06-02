@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalle del Moderador</h2>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <h4>Información General</h4>
                    <table class="table">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $moderador->id }}</td>
                        </tr>
                        <tr>
                            <th>Usuario:</th>
                            <td>
                                <span class="badge bg-info">
                                    {{ $moderador->usuario->nombre }} {{ $moderador->usuario->apellido }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $moderador->usuario->email }}</td>
                        </tr>
                        <tr>
                            <th>Bodega Asignada:</th>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $moderador->bodega->nombre }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Información Adicional</h4>
                    <table class="table">
                        <tr>
                            <th>Ubicación de Bodega:</th>
                            <td>{{ $moderador->bodega->ubicacion }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $moderador->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $moderador->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('moderadores.edit', $moderador->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Moderador
                </a>
                <a href="{{ route('moderadores.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection