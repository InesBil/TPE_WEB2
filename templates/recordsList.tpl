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
                {if isset($smarty.session.USER_ID)}
                <td><a href='showEditRecords/{$record->fk_records_id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>
                <td><a href='deleteRecords/{$record->fk_records_id}' type='button' class='btn btn-danger'>Borrar</a></td> 
                {/if}               
            </tr>
        {/foreach}
    </tbody>
</table>
{if isset($smarty.session.USER_ID)}
    {include file="formRecords.tpl"}
{/if}
    {include file="footer.tpl"}
