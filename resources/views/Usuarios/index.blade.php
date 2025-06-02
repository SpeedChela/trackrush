@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Usuarios</h2>
                    <ul class="actions">
                        <li><a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-lg">Nuevo Usuario</a></li>
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
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->telefono }}</td>
                                    <td>{{ $usuario->rol->nombre }}</td>
                                    <td>
                                        <span class="badge bg-{{ $usuario->estado_actual == 'Activo' ? 'success' : 'danger' }}">
                                            {{ $usuario->estado_actual }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('usuarios.read', $usuario->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este usuario?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $usuarios->links() }}
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