{include file="header.tpl"}

{foreach from=$detail item=$item}
<div class="card mb-3 ">
    <div class="row g-0">
        <div class="col-md-4">
        <img src="images/{$item->img}" alt="{$item->records}" class="img-fluid rounded-start imgDetail" >                  
        </div>
    
        <div class="col-md-8">
            <div class="card-body">                
                    <h5 class="card-title">{$item->records}</h5>
                    <p class="card-text">Productor: {$item->producer}</p>
                    <p class="card-text">Estudio de grabación: {$item->studio}</p>
            </div>
            <a href="showDiscography" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
{/foreach}

{include file="footer.tpl"}
