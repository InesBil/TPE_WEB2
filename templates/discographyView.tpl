
{include file="header.tpl"}

{* {include file="form_alta.tpl"} *}

<ul class="list-group">
    {foreach from=$albums item=$album}
  <li class='list-group-item d-flex justify-content-between align-items-center'>
  <span>   {$album->id} - <img src="../images/{$album->img}" alt="{$album->album}"> - {$album->album} - {$album->year} - {$album->genre} - {$album->length} </span>
  <a href='delete/{$album->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a></li>
   {/foreach}
</ul>

{include file="footer.tpl"}