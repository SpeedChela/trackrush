@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalle de la Entrega</h2>
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
                            <th>Paquete:</th>
                            <td>{{ $entrega->paquete->codigo }}</td>
                        </tr>
                        <tr>
                            <th>Conductor:</th>
                            <td>{{ $entrega->driver->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-{{ $entrega->estado_actual == 'Completada' ? 'success' : 'warning' }}">
                                    {{ $entrega->estado_actual }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Fecha de Entrega:</th>
                            <td>{{ $entrega->fecha_entrega ? $entrega->fecha_entrega->format('d/m/Y H:i:s') : 'Pendiente' }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Detalles del Paquete</h4>
                    <table class="table">
                        <tr>
                            <th>Origen:</th>
                            <td>{{ $entrega->paquete->bodegaOrigen->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Destino:</th>
                            <td>{{ $entrega->paquete->bodegaDestino->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Peso:</th>
                            <td>{{ $entrega->paquete->peso }} kg</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('entregas.edit', $entrega->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Entrega
                </a>
                <a href="{{ route('entregas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 