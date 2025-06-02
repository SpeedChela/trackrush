@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalle del Histórico</h2>
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
                            <td>{{ $historico->id }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $historico->estatus->bodega }} - {{ $historico->estatus->ruta }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Fecha de Entrada:</th>
                            <td>{{ \Carbon\Carbon::parse($historico->fecha_entrada)->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Salida:</th>
                            <td>{{ $historico->fecha_salida ? \Carbon\Carbon::parse($historico->fecha_salida)->format('d/m/Y H:i') : 'No registrada' }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Comentarios y Detalles</h4>
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-0">{{ $historico->comentarios ?: 'Sin comentarios registrados' }}</p>
                        </div>
                    </div>

                    <h4 class="mt-4">Información Adicional</h4>
                    <table class="table">
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $historico->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $historico->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('historico.edit', $historico->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Histórico
                </a>
                <a href="{{ route('historico.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection