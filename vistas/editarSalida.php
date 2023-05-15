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
        <h1 style="font-family: 'Quicksand', sans-serif;">Editar Salida</h1>
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
        <input value="<?php echo $salida->longitud;?>" type="hidden" class="form-control" id="longitud" name="longitud">
        <input value="<?php echo $salida->latitud;?>" type="hidden" class="form-control" id="latitud" name="latitud">
        <input value="<?php echo $salida->totalTripulantes;?>" type="hidden" class="form-control" id="totalTripulantes" name="totalTripulantes">
        <?php 
            $i= 0;
            foreach ($salida->peces as $pez) { $i++; ?>
            <input type="hidden" value="<?php echo $pez->id ?>" name="datosPeces[<?php echo $i ?>][id]">
            <input type="hidden" value="<?php echo $pez->nombre ?>" name="datosPeces[<?php echo $i ?>][nombre]">  
            <input type="hidden" value="<?php echo $pez->precio ?>" name="datosPeces[<?php echo $i ?>][precio]"> 
        <?php } ?>
        <button type="submit" class="btn btn-primary" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;">Guardar</button>
    </form>
    </div>
</div>
