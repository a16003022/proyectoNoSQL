<div class="row">
    <div class="col">
        <h1>Agregar captura</h1>
        <h5>Tripulante: <?php echo $persona->nombre ?></h5><br>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=guardarCapturas">
        <input type="hidden" class="form-control" name="id" value="<?php echo $persona->_id ?>">
        <?php
        $i= 0;
        foreach ($salida->peces as $pez){ $i++; ?>
            <label><b>Datos del pez <?php echo $i ?></b></label>
            <input type="hidden" class="form-control" name="datosPeces[<?php echo $i ?>][id]" value="<?php echo $pez->id?>">
            <div class="form-group">
                <label>Tipo de pez</label>
                <input readonly value="<?php echo $pez->nombre;?>" type="text" class="form-control" name="datosPeces[<?php echo $i ?>][nombre]">
            </div>
            <div class="form-group">
                <label>Cantidad capturada</label>
                <input required type="text" class="form-control" name="datosPeces[<?php echo $i ?>][cantidad]" placeholder="Cantidad capturada en Kilos">
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>


