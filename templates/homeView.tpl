{include file="header.tpl"}

<!--Contenido-->
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
                <td>{$album->img}</td>
                <td>{$album->album}</td>
                <td>{$album->year}</td>                
                <td>{$album->genre}</td>
                <td>{$album->length}</td>                
                <td>{$album->records}</td>                
            </tr>
        {/foreach}
    </tbody>
{include file="footer.tpl"}