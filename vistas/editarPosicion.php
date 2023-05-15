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
        <h1 style="font-family: 'Quicksand', sans-serif;">Editar Posicion</h1>
        <h5 style="font-family: 'Quicksand', sans-serif;">Salida: <?php echo $salida->nombreSalida ?></h5>
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
        <button type="submit" class="btn btn-primary" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;">Guardar</button>
    </form>
    </div>
</div>
