
{include file="header.tpl"}

<ul class="list-group">
    {foreach from=$albums item=$album}
  <li class='list-group-item d-flex justify-content-between align-items-center'>
  <span>   {$album->id} - <img src="../images/{$album->img}" alt="{$album->album}"> - {$album->album} - {$album->year} - {$album->genre} - {$album->length} </span>
  <a href='showEditAlbum/{$beer->id}' type='button' class='btn btn-danger ml-auto'>Editar</a>
  <a href='deleteAlbum/{$album->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
  </li>
   {/foreach}
</ul>

{include file="formAlbum.tpl"}
{include file="footer.tpl"}