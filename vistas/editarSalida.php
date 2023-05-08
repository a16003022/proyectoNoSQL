<div class="row">
    <div class="col">
        <h1>Editar Salida</h1>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=actualizarSalida">
        <input type="hidden" value="<?php echo $salida->_id ?>" name="id">
        <div class="form-group">
            <label for="nombreSalida">Nombre Salida</label>
            <input value="<?php echo $salida->nombreSalida;?>" required type="text" class="form-control" id="nombreSalida" name="nombreSalida">
        </div>
        <div class="form-group">
            <label for="idBarco">Barco</label>
            <select class="form-control" id="idBarco" name="idBarco">
                <?php
                foreach ($cursorBarcos as $barco) {
                    echo "<option value='".$barco->_id."'>". $barco->nombreBarco."</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="fechaSalida">Fecha Salida</label>
            <input value="<?php echo $salida->fechaSalida;?>" required type="date" class="form-control" id="fechaSalida" name="fechaSalida">
        </div>
        <div class="form-group">
            <label for="peces">Peces a Capturar</label>
            <input value="<?php echo $salida->peces;?>" required type="number" class="form-control" id="peces" name="peces">
        </div>
        <input value="<?php echo $salida->longitud;?>" type="hidden" class="form-control" id="longitud" name="longitud">
        <input value="<?php echo $salida->latitud;?>" type="hidden" class="form-control" id="latitud" name="latitud">
        <input value="<?php echo $salida->totalTripulantes;?>" type="hidden" class="form-control" id="totalTripulantes" name="totalTripulantes">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>
