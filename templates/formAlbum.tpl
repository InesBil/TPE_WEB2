<form action="addAlbum" method="POST" class="my-4" enctype="multipart/form-data">
<div class="mb-3">
<label class="form-label">Seleccione una opcion:</label>
<select name="studioOption" class="form-control">
{foreach from=$studios item=$studio }
  <option value="{$album->id_name_fk}">{$beer->beer_name}</option> 
{/foreach}
</select> 
</div>
<div class="mb-3">
  <label for="album" class="form-label">Nombre del album</label>
  <input type="text" class="form-control"  name="album">
</div>
<div class="mb-3">
  <label for="year" class="form-label">Año de lanzamiento</label>
  <input type="text" class="form-control"  name="year">
</div>
<div class="mb-3">
  <label for="genre" class="form-label">Género</label>
  <input type="text" class="form-control"  name="genre">
</div>
<div class="mb-3">
  <label for="length" class="form-label">Duración</label>
  <input type="text" class="form-control"  name="length">  
  </div>
  <div class="mb-3">
  <input type="file" class="form-control" name="input_name" id="imageToUpload">
  </div>
  <button type="submit" class="btn btn-primary mt-2">Guardar</button> 
</form>
