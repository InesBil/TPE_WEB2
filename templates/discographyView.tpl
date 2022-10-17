
{include file="header.tpl"}

<table class="table table-hover">

    <thead>
        <tr>
        <th scope="col"></th>
        <th scope="col">Nombre del album</th>
        <th scope="col">Año</th>
        <th scope="col">Genero</th>
        <th scope="col">Duración</th>
        <th scope="col">Discográfica</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$albums item=$album}
            <tr>
                <td> 
                {if isset ($album->img)}
                  <img src="images/{$album->img}" style="width:4rem;"/>
                {/if}
                </td>                
                <td>{$album->album}</td>
                <td>{$album->year}</td>                
                <td>{$album->genre}</td>
                <td>{$album->length}</td>                
                <td><a href="detail/{$album->fk_records_id}"class="text-decoration-none">{$album->records}</a></td>
                <td><a href='deleteAlbum/{$album->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a></td>
                <td><a href='showEditAlbum/{$album->id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>                
            </tr>
        {/foreach}
    </tbody>
  </table>

{include file="formAlbum.tpl"}
{include file="footer.tpl"}