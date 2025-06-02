@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalles del Paquete</h2>
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
                            <th>Código:</th>
                            <td>{{ $paquete->codigo }}</td>
                        </tr>
                        <tr>
                            <th>Peso:</th>
                            <td>{{ $paquete->peso }} kg</td>
                        </tr>
                        <tr>
                            <th>Dimensiones:</th>
                            <td>{{ $paquete->dimensiones }}</td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $paquete->descripcion }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Estado y Ubicación</h4>
                    <table class="table">
                        <tr>
                            <th>Estado Actual:</th>
                            <td>
                                <span class="badge bg-primary">{{ $paquete->estado_actual }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Ruta Asignada:</th>
                            <td>{{ $paquete->ruta_actual }}</td>
                        </tr>
                        <tr>
                            <th>Bodega de Origen:</th>
                            <td>{{ $paquete->bodegaOrigen->nombre ?? 'No asignada' }}</td>
                        </tr>
                        <tr>
                            <th>Bodega de Destino:</th>
                            <td>{{ $paquete->bodegaDestino->nombre ?? 'No asignada' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4>Historial de Movimientos</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($paquete->historicos as $historico)
                                <tr>
                                    <td>{{ $historico->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $historico->estatus->nombre }}</td>
                                    <td>{{ $historico->descripcion }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No hay registros de movimientos</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('paquetes.edit', $paquete->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Paquete
                </a>
                <a href="{{ route('paquetes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection