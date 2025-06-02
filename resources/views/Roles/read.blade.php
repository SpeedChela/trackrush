@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalles del Rol</h2>
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
                            <td>{{ $rol->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $rol->descripcion }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-{{ $rol->estado_actual == 'Activo' ? 'success' : 'danger' }}">
                                    {{ $rol->estado_actual }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Estadísticas</h4>
                    <table class="table">
                        <tr>
                            <th>Usuarios con este Rol:</th>
                            <td>{{ $rol->usuarios->count() }}</td>
                        </tr>
                        <tr>
                            <th>Permisos Asignados:</th>
                            <td>{{ $rol->permisos->count() }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4>Permisos del Rol</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Módulo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rol->permisos as $permiso)
                                <tr>
                                    <td>{{ $permiso->nombre }}</td>
                                    <td>{{ $permiso->descripcion }}</td>
                                    <td>{{ $permiso->modulo }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No hay permisos asignados a este rol</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Rol
                </a>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection