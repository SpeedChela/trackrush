@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalle del Conductor</h2>
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
                            <th>Nombre:</th>
                            <td>{{ $driver->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $driver->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Licencia:</th>
                            <td>{{ $driver->licencia }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-{{ $driver->estado_actual == 'Activo' ? 'success' : 'danger' }}">
                                    {{ $driver->estado_actual }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Asignación Actual</h4>
                    <table class="table">
                        <tr>
                            <th>Vehículo:</th>
                            <td>{{ $driver->vehiculo ? $driver->vehiculo->placa : 'Sin asignar' }}</td>
                        </tr>
                        <tr>
                            <th>Ruta:</th>
                            <td>{{ $driver->ruta ? $driver->ruta->codigo : 'Sin asignar' }}</td>
                        </tr>
                        <tr>
                            <th>Paquete:</th>
                            <td>{{ $driver->paquete ? $driver->paquete->codigo : 'Sin asignar' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4>Estadísticas</h4>
                    <table class="table">
                        <tr>
                            <th>Entregas Completadas:</th>
                            <td>{{ $driver->entregas->where('estatus_id', 4)->count() }}</td>
                        </tr>
                        <tr>
                            <th>Entregas en Proceso:</th>
                            <td>{{ $driver->entregas->where('estatus_id', 2)->count() }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Conductor
                </a>
                <a href="{{ route('drivers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection