@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Historial de Estados</h2>
                    <ul class="actions">
                        <li><a href="{{ route('historico.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Nuevo Registro
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
                                <th>Estado</th>
                                <th>Fecha de Entrada</th>
                                <th>Fecha de Salida</th>
                                <th>Comentarios</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $registro)
                                <tr>
                                    <td>{{ $registro->id }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ $registro->estatus->bodega }} - {{ $registro->estatus->ruta }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($registro->fecha_entrada)->format('d/m/Y H:i') }}</td>
                                    <td>{{ $registro->fecha_salida ? \Carbon\Carbon::parse($registro->fecha_salida)->format('d/m/Y H:i') : 'No registrada' }}</td>
                                    <td>{{ Str::limit($registro->comentarios, 50) }}</td>
                                    <td>
                                        <a href="{{ route('historico.read', $registro->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('historico.edit', $registro->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('historico.destroy', $registro->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este registro histórico?')">
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

                    <div class="form-group mt-4">
                        <a href="{{ url('/') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-arrow-left"></i> Regresar al Inicio
                        </a>
                    </div>
                </div>
            </section>
        </article>
    </div>
</div>
@endsection