<div class="row">
    <div class="col">
        <h1>Editar Posicion</h1>
        <h5>Salida: <?php echo $salida->nombreSalida ?></h5>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=guardarPosicion">
        <input type="hidden" value="<?php echo $salida->_id ?>" name="id">
        <div class="form-group">
            <label for="longitud">Longitud</label>
            <input value="<?php echo $salida->longitud;?>" required type="text" class="form-control" id="longitud" name="longitud">
        </div>
        <div class="form-group">
            <label for="latitud">Latitud</label>
            <input value="<?php echo $salida->latitud;?>" required type="text" class="form-control" id="latitud" name="latitud">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>
