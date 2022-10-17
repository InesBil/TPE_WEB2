{include file="header.tpl"}


<table class="table table-hover">

    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Discográfica</th>
            <th scope="col">Productor</th>
            <th scope="col">Estudio de grabación</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$records item=$record}
            <tr>
                <td> 
                {if isset ($record->img)}
                  <img src="images/{$record->img}" style="width:4rem;"/>
                {/if}
                </td>   
                <td>{$record->records}</td>
                <td>{$record->producer}</td>
                <td>{$record->studio}</td>
                <td><a href='showEditRecords/{$record->fk_records_id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>
                <td><a href='deleteRecords/{$record->fk_records_id}' type='button' class='btn btn-danger'>Borrar</a></td>                
            </tr>
        {/foreach}
    </tbody>
</table>
    {include file="formRecords.tpl"}
    {include file="footer.tpl"}
