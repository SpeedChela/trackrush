@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalles del Vehículo</h2>
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
                            <th>Placa:</th>
                            <td>{{ $vehiculo->placa }}</td>
                        </tr>
                        <tr>
                            <th>Marca:</th>
                            <td>{{ $vehiculo->marca }}</td>
                        </tr>
                        <tr>
                            <th>Modelo:</th>
                            <td>{{ $vehiculo->modelo }}</td>
                        </tr>
                        <tr>
                            <th>Año:</th>
                            <td>{{ $vehiculo->anio }}</td>
                        </tr>
                        <tr>
                            <th>Capacidad:</th>
                            <td>{{ $vehiculo->capacidad }} kg</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-{{ $vehiculo->estado_actual == 'Activo' ? 'success' : 'danger' }}">
                                    {{ $vehiculo->estado_actual }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Estadísticas</h4>
                    <table class="table">
                        <tr>
                            <th>Rutas Asignadas:</th>
                            <td>{{ $vehiculo->rutas->count() }}</td>
                        </tr>
                        <tr>
                            <th>Entregas Completadas:</th>
                            <td>{{ $vehiculo->entregas->where('estatus_id', 4)->count() }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4>Rutas Actuales</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vehiculo->rutas as $ruta)
                                <tr>
                                    <td>{{ $ruta->codigo }}</td>
                                    <td>{{ $ruta->origen->nombre }}</td>
                                    <td>{{ $ruta->destino->nombre }}</td>
                                    <td>{{ $ruta->estado_actual }}</td>
                                    <td>
                                        <a href="{{ route('rutas.read', $ruta->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay rutas asignadas a este vehículo</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Vehículo
                </a>
                <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection