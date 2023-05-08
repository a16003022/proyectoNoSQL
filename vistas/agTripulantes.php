<div class="row">
    <div class="col">
        <h1>Paso 2. Datos de los tripulantes</h1>
        <h3>Salida: <?php echo $salida->nombreSalida ?></h3><br>
        <?php 
        $cantPeces = $_GET['cantPeces']; 
        $idBarco = $_GET['idBarco']; 
        $idSalida = $_GET['idSalida']; ?>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=guardarTripulantes&idSalida=<?php echo $idSalida?>&cantPeces=<?php echo $cantPeces?>">
        <?php 
        for ($i = 1; $i <= $salida->totalTripulantes; $i++) { 
        ?>
        <label><b>Datos del tripulante <?php echo $i ?></b></label>
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
        <input type="hidden" class="form-control" name="datosTripulantes[<?php echo $i ?>][idSalida]" value="<?php echo $idSalida ?>">
        <input type="hidden" class="form-control" name="datosTripulantes[<?php echo $i ?>][idBarco]" value="<?php echo $idBarco ?>">
        <input type="hidden" class="form-control" name="datosTripulantes[<?php echo $i ?>][capturas]" value="Sin capturas">
        <?php } ?>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>
