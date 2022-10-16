<form action="addAlbum" method="POST" class="my-4" enctype="multipart/form-data">

  <div class="mb-3">
    <label class="form-label">Seleccione una discográfica:</label>
    <select name="id_records_fk" class="form-control">
      {foreach from=$records item=$record }
        <option value="{$record->id_records_fk}">{$record->records}</option> 
      {/foreach}
    </select> 
  </div>

  <div class="mb-3">
    <label for="album" class="form-label">Álbum</label>
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
