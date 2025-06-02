@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalles de la Ruta</h2>
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
                            <td>{{ $ruta->codigo }}</td>
                        </tr>
                        <tr>
                            <th>Origen:</th>
                            <td>{{ $ruta->origen->nombre }} - {{ $ruta->origen->ubicacion_completa }}</td>
                        </tr>
                        <tr>
                            <th>Destino:</th>
                            <td>{{ $ruta->destino->nombre }} - {{ $ruta->destino->ubicacion_completa }}</td>
                        </tr>
                        <tr>
                            <th>Distancia:</th>
                            <td>{{ $ruta->distancia }} km</td>
                        </tr>
                        <tr>
                            <th>Tiempo Estimado:</th>
                            <td>{{ $ruta->tiempo_estimado }} minutos</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-{{ $ruta->estado_actual == 'Activa' ? 'success' : 'danger' }}">
                                    {{ $ruta->estado_actual }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Estadísticas</h4>
                    <table class="table">
                        <tr>
                            <th>Paquetes en Tránsito:</th>
                            <td>{{ $ruta->paquetes->where('estatus_id', 2)->count() }}</td>
                        </tr>
                        <tr>
                            <th>Entregas Completadas:</th>
                            <td>{{ $ruta->paquetes->where('estatus_id', 4)->count() }}</td>
                        </tr>
                        <tr>
                            <th>Vehículo Asignado:</th>
                            <td>{{ $ruta->vehiculo ? $ruta->vehiculo->placa : 'Sin asignar' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4>Paquetes en Ruta</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Peso</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ruta->paquetes as $paquete)
                                <tr>
                                    <td>{{ $paquete->codigo }}</td>
                                    <td>{{ $paquete->descripcion }}</td>
                                    <td>{{ $paquete->peso }} kg</td>
                                    <td>{{ $paquete->estado_actual }}</td>
                                    <td>
                                        <a href="{{ route('paquetes.read', $paquete->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay paquetes en esta ruta</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('rutas.edit', $ruta->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Ruta
                </a>
                <a href="{{ route('rutas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection