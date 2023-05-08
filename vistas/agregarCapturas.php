<div class="row">
    <div class="col">
        <h1>Agregar captura</h1><br>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=guardarPersona">
        <label><b>Captura pez </b></label>
        <input type="hidden" class="form-control" name="id" value="<?php echo $persona->_id ?>">
        <div class="form-group">
            <label for="nombre">Nombre del tripulante</label>
            <input required type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $persona->nombre ?>">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección del tripulante</label>
            <input required type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $persona->direccion ?>">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono del tripulante</label>
            <input required type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $persona->telefono ?>">
        </div>
        <div class="form-group">
            <label for="contacto">Contacto del tripulante</label>
            <input required type="text" class="form-control" id="contacto" name="contacto" value="<?php echo $persona->contacto ?>"><br>
        </div>
        <input type="hidden" class="form-control" name="idSalida" value="<?php echo $persona->idSalida ?>">
        <input type="hidden" class="form-control" name="idBarco" value="<?php echo $persona->idBarco ?>">
        <input type="hidden" class="form-control" name="capturas" value="<?php echo $persona->capturas ?>">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>


