<h1>Crear Moderadore</h1>
<form action="/{str.lower(model)}" method="POST">
    @csrf
    <label>id_usuario:</label><input type="text" name="id_usuario" required><br><label>id_bodega:</label><input type="text" name="id_bodega" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="/{str.lower(model)}">Volver al listado</a>
