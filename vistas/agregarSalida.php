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
        <h1 style="font-family: 'Quicksand', sans-serif;">Paso 1. Datos de salida</h1><br>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=guardarSalida">
        <div class="form-group">
            <label for="nombreSalida">Nombre Salida</label>
            <input required type="text" class="form-control" id="nombreSalida" name="nombreSalida" placeholder="Nombre de la salida">
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
            <input required type="date" class="form-control" id="fechaSalida" name="fechaSalida" placeholder="Fecha de la Salida">
        </div>
        <div class="form-group">
            <label for="totalTripulantes">Total tripulantes</label>
            <input required type="number" class="form-control" id="totalTripulantes" name="totalTripulantes" placeholder="Total de tripulantes">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="longitud" name="longitud" value="Inicial">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="latitud" name="latitud" value="Inicial">
        </div>
        <div class="form-group">
            <label for="cantPeces">Tipos de peces</label>
            <input required type="number" class="form-control" id="cantPeces" name="cantPeces" placeholder="Cantidad de tipos de peces que se van a capturar">
        </div>
        <input type="hidden" class="form-control" id="peces" name="peces" value="Sin capturar">
        <button type="submit" class="btn btn-primary" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;">Guardar</button>
    </form>
    </div>
</div>
