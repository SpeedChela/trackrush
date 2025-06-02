@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Empresas</h2>
                    <ul class="actions">
                        <li><a href="{{ route('empresas.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Nueva Empresa
                        </a></li>
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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>RFC</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $empresa)
                                <tr>
                                    <td>{{ $empresa->id }}</td>
                                    <td>{{ $empresa->nombre }}</td>
                                    <td>{{ $empresa->rfc ?? 'No especificado' }}</td>
                                    <td>{{ $empresa->telefono ?? 'No especificado' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $empresa->estado_actual == 'Activa' ? 'success' : 'danger' }}">
                                            {{ $empresa->estado_actual }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('empresas.read', $empresa->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta empresa?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(method_exists($registros, 'links'))
                        <div class="d-flex justify-content-center">
                            {{ $registros->links() }}
                        </div>
                    @endif

                    <ul class="actions">
                        <li><a href="{{ url('/') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-arrow-left"></i> Regresar
                        </a></li>
                    </ul>
                </div>
            </section>
        </article>
    </div>
</div>
@endsection