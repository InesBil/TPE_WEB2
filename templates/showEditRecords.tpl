{include file="header.tpl"}
<table class="table">
<thead class="table-dark">
 <tr>   
   <th>Discográfica</th>
   <th>Productor</th>
   <th>Estudio de grabación</th>   
   <th></th>
   <th></th>
 </tr>
</thead>
<tbody>
{foreach from=$records item=$record}
   <tr>
   <td>{$record->records}</td>
   <td>{$record->producer}</td>
   <td>{$record->studio}</td>
   </tr>
{/foreach}
</tbody>
</table>
<h1>Edit Form</h1>
<form action="editRecords/{$record->record}" method="POST" class="my-4">
{foreach from=$records item=$record }
<div class="mb-3">
  <label for="records_name" class="form-label">Discográfica</label>
  <input type="text" class="form-control"  name="records_name" value="{$record->producer}">
</div>
<div class="mb-3">
  <label for="producer" class="form-label">Productor</label>
  <input type="text" class="form-control"  name="producer" value="{$record->producer}">
</div>
<div class="mb-3">
  <label for="studio" class="form-label">Estudio de grabación</label>
  <input type="text" class="form-control"  name="studio" value="{$beer->ibu}">
</div>
{/foreach}
  <button type="submit" class="btn btn-primary mt-2">Editar</button> 
</form>
{include file="footer.tpl"}