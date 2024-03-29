{include file="header.tpl"}
<table class="table">
    <thead class="table-dark">
        <h1 class="font-monospace fw-bold display-2 text-center ">
            {$name->records}</h1>
        <tr>           
            <th></th>
            <th>Álbum</th>
            <th>Año</th>
            <th>Género</th>
            <th>Duración</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$filters item=$filter}
            <tr>
            <td>
                {if isset($filter->img)}
                    <img src="images/{$filter->img}" alt="{$filter->album}" style="width:4rem;" />
                {/if}
                </td>              
                <td>{$filter->album}</td>
                <td>{$filter->year}</td>
                <td>{$filter->genre}</td>
                <td>{$filter->length}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
{include file="footer.tpl"}