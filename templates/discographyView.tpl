
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
                  <img src="{$album->img}" style="width:3rem:"/>
                {/if}
                </td>
                <a href="detail/{$album->fk_records_id}">
                <td>{$album->album}</td>
                <td>{$album->year}</td>                
                <td>{$album->genre}</td>
                <td>{$album->length}</td>                
                <td>{$album->records}</td>
                <td><a href='deleteAlbum/{$beer->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a></td>
                <td><a href='showEdit/{$beer->id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>                
            </tr>
        {/foreach}
    </tbody>
  </table>

{*<table class="table">
<thead class="table-dark">
 <tr>
   <th></th>   
   <th>Nombre del album</th>
   <th>Año</th>
   <th>Género</th>
   <th>Duración</th>
   <th>Discográfica</th>
   <th></th>
 </tr>
</thead>
<tbody>
{foreach from=$albums item=$album}
   <tr>
   <td>
      {if isset($album->img)}
        <img src="{$album->img}" style="width:3rem;"/>
       {/if}
   </td>
   <td>{$album->album}</td>
   <td>{$album->year}</td>
   <td>{$album->genre}</td>
   <td>{$album->length}</td>
   <td>{$album->stock}</td>
   
   <td><a href='deleteAlbum/{$beer->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a></td>
   <td><a href='showEdit/{$beer->id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>
   </tr>
{/foreach}
</tbody>
</table>

<ul class="list-group">
    {foreach from=$albums item=$album}
  <li class='list-group-item d-flex justify-content-between align-items-center'>
  <span>   {$album->id} - <img src="../images/{$album->img}" alt="{$album->album}"> - {$album->album} - {$album->year} - {$album->genre} - {$album->length} </span>
  <a href='showEditAlbum/{$beer->id}' type='button' class='btn btn-danger ml-auto'>Editar</a>
  <a href='deleteAlbum/{$album->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
  </li>
   {/foreach}
</ul>*}

{include file="formAlbum.tpl"}
{include file="footer.tpl"}