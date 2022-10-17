{include file="header.tpl"}
<table class="table">
    <thead class="table-dark">
        <h1 class="font-monospace fw-bold display-2 text-center"
            style="margin: 3rem; text-shadow: 1px 1px 2px rgb(59, 59, 59), 0 0 1em rgb(95, 95, 95), 0 0 0.2em rgb(125, 125, 125);">
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
                    <img src="{$filter->img}" alt="{$filter->title}" style="width:4rem;" />
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