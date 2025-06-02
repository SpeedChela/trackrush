@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalle de la Empresa</h2>
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
                            <td>{{ $empresa->nombre }}</td>
                        </tr>
                        <tr>
                            <th>RFC:</th>
                            <td>{{ $empresa->rfc ?? 'No especificado' }}</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $empresa->direccion ?? 'No especificada' }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $empresa->telefono ?? 'No especificado' }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $empresa->email ?? 'No especificado' }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-{{ $empresa->estado_actual == 'Activa' ? 'success' : 'danger' }}">
                                    {{ $empresa->estado_actual }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Estadísticas</h4>
                    <table class="table">
                        <tr>
                            <th>Bodegas:</th>
                            <td>{{ $empresa->bodegas->count() }}</td>
                        </tr>
                        <tr>
                            <th>Vehículos:</th>
                            <td>{{ $empresa->vehiculos->count() }}</td>
                        </tr>
                        <tr>
                            <th>Conductores:</th>
                            <td>{{ $empresa->drivers->count() }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $empresa->created_at->format('d/m/Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Empresa
                </a>
                <a href="{{ route('empresas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection