@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalle del Estatus</h2>
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
                            <td>{{ $estatus->id }}</td>
                        </tr>
                        <tr>
                            <th>Bodega:</th>
                            <td>{{ $estatus->bodega }}</td>
                        </tr>
                        <tr>
                            <th>Ruta:</th>
                            <td>{{ $estatus->ruta }}</td>
                        </tr>
                        <tr>
                            <th>Estado de Entrega:</th>
                            <td>
                                <span class="badge bg-{{ $estatus->entregado ? 'success' : 'danger' }}">
                                    {{ $estatus->entregado ? 'Entregado' : 'No Entregado' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Estado de Devolución:</th>
                            <td>
                                <span class="badge bg-{{ $estatus->devuelto ? 'warning' : 'info' }}">
                                    {{ $estatus->devuelto ? 'Devuelto' : 'No Devuelto' }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Información Adicional</h4>
                    <table class="table">
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $estatus->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $estatus->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('estatus.edit', $estatus->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Estatus
                </a>
                <a href="{{ route('estatus.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection