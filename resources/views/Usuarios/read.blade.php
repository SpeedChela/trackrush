@extends('template.master')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalles del Usuario</h2>
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
                            <td>{{ $usuario->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $usuario->email }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $usuario->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Rol:</th>
                            <td>{{ $usuario->rol->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge bg-{{ $usuario->estado_actual == 'Activo' ? 'success' : 'danger' }}">
                                    {{ $usuario->estado_actual }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Estadísticas</h4>
                    <table class="table">
                        <tr>
                            <th>Última Conexión:</th>
                            <td>{{ $usuario->ultimo_login ? $usuario->ultimo_login->format('d/m/Y H:i:s') : 'Nunca' }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4>Permisos del Usuario</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Módulo</th>
                                <th>Origen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuario->rol->permisos as $permiso)
                                <tr>
                                    <td>{{ $permiso->nombre }}</td>
                                    <td>{{ $permiso->descripcion }}</td>
                                    <td>{{ $permiso->modulo }}</td>
                                    <td>Por rol: {{ $usuario->rol->nombre }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No hay permisos asignados a este usuario</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Usuario
                </a>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 