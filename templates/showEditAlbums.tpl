{include file="header.tpl"}

<!-- lista de tareas -->
<table class="table table-hover">

    <thead>
        <tr>
            <th scope="col">Nombre del album</th>
            <th scope="col">Año de lanzamiento</th>
            <th scope="col">Género</th>
            <th scope="col">Duración</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$albums item=$album}
            <tr>
                <td>{$album->album}</td>
                <td>{$album->year>}</td>
                <td>{$album->genre}</td>
                <td>{$album->length}</td>                
                <td><a href='deleteAlbum/{$album->id}' type='button' class='btn btn-danger'>Borrar</a></td>
                <td><a href='showEdit/{$album->id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>

<h1>EDITAR</h1>

<form action="editAlbum/{$album->id}" method="POST" class="my-4">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Seleccione una opcion</label>
        <select name="studioOption" class="form-control">
            {foreach from =$records item=$record}
                <option value="{$record->id_author}">{$record->name}</option>
            {/foreach}
        </select>
    </div>
        {foreach from=$albums item=$album}   
    <div class="mb-3">
        <label for="titulo" class="form-label">Nombre del album</label>
<input type="text" class="form-control" name="titulo" value="{$book->title}">
    </div>
    <div class="mb-3">
        <label for="genero" class="form-label">Año de lanzamiento</label>
<input type="text" class="form-control" name="genero" value="{$book->genre}">
    </div>
        {/foreach}
    <button type="submit" class="btn btn-primary mt-2">Editar</button>
</form>
{include file="footer.tpl"}