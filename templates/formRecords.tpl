<h5>Añadir nueva Discográfica:</h5>
<form action="addRecords" method="POST" class="my-4">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Discográfica</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="records">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Productor</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="producer">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Estudio de grabación</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="studio">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>