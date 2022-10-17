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
                <td>{$album->year}</td>
                <td>{$album->genre}</td>
                <td>{$album->length}</td>                
            </tr>
        {/foreach}
    </tbody>
</table>

<h1>EDITAR</h1>

<form action="editAlbum/{$album->id}" method="POST" class="my-4">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Seleccione una opcion</label>
        <select name="id_records_fk" class="form-control">
            {foreach from =$records item=$record}
                <option value="{$record->fk_records_id}">{$record->records}</option>
            {/foreach}
        </select>
    </div>
        {foreach from=$albums item=$album}   
    <div class="mb-3">
        <label for="album" class="form-label">Nombre del album</label>
        <input type="text" class="form-control" name="album" value="{$album->album}">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Año de lanzamiento</label>
        <input type="text" class="form-control" name="year" value="{$album->year}">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Género</label>
        <input type="text" class="form-control" name="genre" value="{$album->genre}">
    </div>
    <div class="mb-3">
    <label for="length" class="form-label">Duración</label>
    <input type="text" class="form-control" name="length" value="{$album->length}">
</div>
        {/foreach}
    <button type="submit" class="btn btn-primary mt-2">Editar</button>
</form>
{include file="footer.tpl"}