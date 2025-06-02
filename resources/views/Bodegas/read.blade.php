@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalles de la Bodega</h2>
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
                            <td>{{ $bodega->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $bodega->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Municipio:</th>
                            <td>{{ $bodega->municipio->nombre }}, {{ $bodega->municipio->entidad->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $bodega->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $bodega->email }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-{{ $bodega->estado_actual == 'Activa' ? 'success' : 'danger' }}">
                                    {{ $bodega->estado_actual }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Estadísticas</h4>
                    <table class="table">
                        <tr>
                            <th>Paquetes como Origen:</th>
                            <td>{{ $bodega->paquetesOrigen->count() }}</td>
                        </tr>
                        <tr>
                            <th>Paquetes como Destino:</th>
                            <td>{{ $bodega->paquetesDestino->count() }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4>Paquetes Actuales</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Destino</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bodega->paquetesOrigen as $paquete)
                                <tr>
                                    <td>{{ $paquete->codigo }}</td>
                                    <td>Origen</td>
                                    <td>{{ $paquete->estado_actual }}</td>
                                    <td>{{ $paquete->bodegaDestino->nombre }}</td>
                                    <td>
                                        <a href="{{ route('paquetes.read', $paquete->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay paquetes con esta bodega como origen</td>
                                </tr>
                            @endforelse

                            @foreach($bodega->paquetesDestino as $paquete)
                                <tr>
                                    <td>{{ $paquete->codigo }}</td>
                                    <td>Destino</td>
                                    <td>{{ $paquete->estado_actual }}</td>
                                    <td>{{ $paquete->bodegaOrigen->nombre }}</td>
                                    <td>
                                        <a href="{{ route('paquetes.read', $paquete->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('bodegas.edit', $bodega->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Bodega
                </a>
                <a href="{{ route('bodegas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection