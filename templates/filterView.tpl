{include file="header.tpl"}
<table class="table">
    <thead class="table-dark">
        <h1 class="font-monospace fw-bold display-2 text-center"
            style="margin: 3rem; text-shadow: 1px 1px 2px rgb(59, 59, 59), 0 0 1em rgb(95, 95, 95), 0 0 0.2em rgb(125, 125, 125);">
            {$name->records}</h1>
        <tr>           
            <th>Productor</th>
            <th>Estudio de grabación</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$filters item=$filter}
            <tr>              
                <td>{$filter->producer}</td>
                <td>{$filter->studio}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
{include file="footer.tpl"}