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
        <h1 style="font-family: 'Quicksand', sans-serif;">Editar Barco</h1>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=actualizarBarco">
        <input type="hidden" value="<?php echo $barco->_id ?>" name="id">
        <div class="form-group">
            <label for="nombreBarco">Nombre Barco</label>
            <input value="<?php echo $barco->nombreBarco;?>" required type="text" class="form-control" id="nombreBarco" name="nombreBarco">
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;">Guardar</button>
    </form>
    </div>
</div>
