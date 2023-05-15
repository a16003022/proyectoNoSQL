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
        <h1 style="font-family: 'Quicksand', sans-serif;">Editar precios</h1>
        <h5>Salida: <?php echo $salida->nombreSalida ?></h5><br>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=actualizarPeces">
        <input type="hidden" class="form-control" name="id" value="<?php echo $salida->_id ?>">
        <?php
        $i= 0;
        foreach ($salida->peces as $pez){ $i++; ?>
            <label><b>Datos del pez <?php echo $i ?></b></label>
            <input type="hidden" class="form-control" name="datosPeces[<?php echo $i ?>][id]" value="<?php echo $pez->id?>">
            <div class="form-group">
                <label>Tipo de pez</label>
                <input required value="<?php echo $pez->nombre;?>" type="text" class="form-control" name="datosPeces[<?php echo $i ?>][nombre]">
            </div>
            <div class="form-group">
                <label>Precio del pez</label>
                <input required value="<?php echo $pez->precio;?>" type="text" class="form-control" name="datosPeces[<?php echo $i ?>][precio]">
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;">Guardar</button>
    </form>
    </div>
</div>


