<div class="row">
    <div class="col">
        <h1>Paso 2. Datos de los tripulantes</h1>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=gTripulantes">
        <input type="hidden" value="<?php echo $barco->_id ?>" name="id">
        <input type="hidden" value="<?php echo $barco->totalTripulantes ?>" name="totalTripulantes">
        <div class="form-group">
            <label for="nombreBarco">Nombre del barco</label>
            <input readonly value="<?php echo $barco->nombreBarco; ?>" required type="text" class="form-control" id="nombreBarco" name="nombreBarco" placeholder="Nombre del barco">
        </div>
        <?php 
        for ($i = 1; $i <= $barco->totalTripulantes; $i++) { ?>
        <label><b>Datos de tripulante <?php echo $i ?></b></label>
        <input type="hidden" name="datosTripulantes[<?php echo $i ?>][clave]" value="<?php echo $i ?>">
        <div class="form-group">
            <label for="nombre<?php echo $i ?>">Nombre del tripulante</label>
            <input required type="text" class="form-control" id="nombre<?php echo $i ?>" name="datosTripulantes[<?php echo $i ?>][nombre]" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="direccion<?php echo $i ?>">Dirección del tripulante</label>
            <input required type="text" class="form-control" id="direccion<?php echo $i ?>" name="datosTripulantes[<?php echo $i ?>][direccion]" placeholder="Dirección">
        </div>
        <div class="form-group">
            <label for="telefono<?php echo $i ?>">Teléfono del tripulante</label>
            <input required type="text" class="form-control" id="telefono<?php echo $i ?>" name="datosTripulantes[<?php echo $i ?>][telefono]" placeholder="Teléfono">
        </div>
        <div class="form-group">
            <label for="contacto<?php echo $i ?>">Contacto del tripulante</label>
            <input required type="text" class="form-control" id="contacto<?php echo $i ?>" name="datosTripulantes[<?php echo $i ?>][contacto]" placeholder="Contacto"><br>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>
