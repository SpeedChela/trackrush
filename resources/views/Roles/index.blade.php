@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Roles</h2>
                    <ul class="actions">
                        <li><a href="{{ route('roles.create') }}" class="btn btn-primary btn-lg">Nuevo Rol</a></li>
                    </ul>
                </div>
            </header>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <section>
                <div class="table-wrapper">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Permisos</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $rol)
                                <tr>
                                    <td>{{ $rol->nombre }}</td>
                                    <td>{{ $rol->descripcion }}</td>
                                    <td>{{ $rol->permisos->count() }}</td>
                                    <td>
                                        <span class="badge bg-{{ $rol->estado_actual == 'Activo' ? 'success' : 'danger' }}">
                                            {{ $rol->estado_actual }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('roles.read', $rol->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este rol?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $roles->links() }}
                    </div>

                    <ul class="actions">
                        <li><a href="{{ url('/') }}" class="btn btn-secondary btn-lg">Regresar</a></li>
                    </ul>
                </div>
            </section>
        </article>
    </div>
</div>
@endsection