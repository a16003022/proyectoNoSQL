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
        <h1 style="font-family: 'Quicksand', sans-serif;">Paso 3. Agregar peces objetivo</h1>
        <h3 style="font-family: 'Quicksand', sans-serif;">Salida: <?php echo $salida->nombreSalida ?></h3><br>
        <?php $cantPeces = $_GET['cantPeces']; ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <form method="POST" action="?q=guardarPeces">
            <input type="hidden" class="form-control" value="<?php echo $salida->_id ?>" name="id">
            <input type="hidden" class="form-control" name="nombreSalida" value="<?php echo $salida->nombreSalida?>">
            <input type="hidden" class="form-control" name="idBarco" value="<?php echo $salida->idBarco?>">
            <input type="hidden" class="form-control" name="fechaSalida" value="<?php echo $salida->fechaSalida?>">
            <input type="hidden" class="form-control" name="totalTripulantes" value="<?php echo $salida->totalTripulantes?>">
            <input type="hidden" class="form-control" name="longitud" value="<?php echo $salida->longitud?>">
            <input type="hidden" class="form-control" name="latitud" value="<?php echo $salida->latitud?>">
            <?php 
            for ($i = 1; $i <= $cantPeces; $i++) { ?>
            <label><b>Datos del pez <?php echo $i ?></b></label>
            <input type="hidden" value="<?php echo $i ?>" name="datosPeces[<?php echo $i ?>][id]"> 
            <div class="form-group">
                <label for="nombre<?php echo $i ?>">Tipo de pez</label>
                <input required type="text" class="form-control" id="nombre<?php echo $i ?>" name="datosPeces[<?php echo $i ?>][nombre]" placeholder="Nombre del tipo de pez">
            </div>
            <div class="form-group">
                <label for="precio<?php echo $i ?>">Precio del pez</label>
                <input required type="text" class="form-control" id="precio<?php echo $i ?>" name="datosPeces[<?php echo $i ?>][precio]" placeholder="Precio por kilogramo">
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;">Guardar</button>
        </form>
    </div>
</div>
