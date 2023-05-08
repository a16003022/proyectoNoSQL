<div class="row">
    <div class="col">
        <h1>Editar Barco</h1>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=actualizarBarco">
        <input type="hidden" value="<?php echo $barco->_id ?>" name="id">
        <div class="form-group">
            <label for="nombreBarco">Nombre Barco</label>
            <input value="<?php echo $barco->nombreBarco;?>" required type="text" class="form-control" id="nombreBarco" name="nombreBarco">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>
