@extends('template.master')

@section('contenido')
<div id="wrapper">
  <div id="main">
    <article class="post">
      <header>
        <div class="title">
          <h2>Listado de {{ $titulo }}</h2>
          <ul class="actions">
            <li><a href="{{ route('entregas.create') }}" class="btn btn-primary btn-lg">Nuevo {{ $singular }}</a></li>
          </ul>
        </div>
      </header>
      <section>
        <div class="table-wrapper">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>id_paquete</th>
                <th>id_driver</th>
                <th>id_historico</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($registros as $registro)
                <tr>
                  <td>{{ $registro->id }}</td>
                  <td>{{ $registro->id_paquete }}</td>
                  <td>{{ $registro->id_driver }}</td>
                  <td>{{ $registro->id_historico }}</td>
                  <td>
                    <a href="{{ route('entregas.read', $registro->id) }}" class="btn btn-info btn-sm">Detalle</a>
                    <a href="{{ route('entregas.edit', $registro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('entregas.destroy', $registro->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este {{ $singular }}?')">Eliminar</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <ul class="actions">
            <li><a href="{{ asset('cruds') }}" class="btn btn-secondary btn-lg">Regresar</a></li>
          </ul>
        </div>
      </section>
    </article>
  </div>
</div>
@endsection