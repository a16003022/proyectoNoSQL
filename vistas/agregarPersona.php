<style>
    .dataTables_info{
        color: white !important;
    }
    .dataTables_length{
        color: white !important;
    }
    .dataTables_filter{
        color: white !important;
    }
    .paginate_button{
        color: white !important;
    }
</style>
<div class="row">
    <div class="col">
        <h1 style="font-family: 'Quicksand', sans-serif;">Agregar tripulante</h1>
        <h3 style="font-family: 'Quicksand', sans-serif;">Salida: <?php echo $salida->nombreSalida ?></h3><br>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=guardarNewPersona">
        <label><b>Datos del tripulante</b></label>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del tripulante">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input required type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del tripulante">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono del tripulante</label>
            <input required type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono del tripulante">
        </div>
        <div class="form-group">
            <label for="contacto">Contacto del tripulante</label>
            <input required type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto del tripulante"><br>
        </div>
        <input type="hidden" class="form-control" name="idSalida" value="<?php echo $salida->_id ?>">
        <input type="hidden" class="form-control" name="idBarco" value="<?php echo $salida->idBarco ?>">
        <input type="hidden" class="form-control" name="capturas" value="Sin capturas">
        <button type="submit" class="btn btn-primary" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;">Guardar</button>
    </form>
</div>
