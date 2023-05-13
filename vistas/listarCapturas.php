<div class="row">
    <div class="col">
        <h1>Capturas por personas</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre Salida</th>
                    <th>Barco</th>
                    <th>Tripulantes</th>
                    <th>Capturas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($cursorCapturas as $captura): ?>
                <tr>
                    <td><?php echo $captura->nombreSalida?></td>
                    <td><?php echo $captura->nombreBarco?></td>
                    <td><?php echo $captura->totalTripulantes?></td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de pez</th>
                                    <th>Precio</th>
                                    <th>Total(kg)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($captura->capturas as $pez) { 
                                    if (isset($pez->id)) { ?>
                                    <tr>
                                        <td><?php echo $pez->id ?></td>
                                        <td><?php echo $pez->nombre ?></td>
                                        <td><?php echo $pez->precio?></td>
                                        <td><?php echo $pez->cantidad?></td>
                                        <td></td>
                                    </tr>
                                <?php } else {

                                    }
                                } ?>
                            </tbody>
                        </table>
                    </td>
                    <td> 
                    <a class="btn btn-success" href="">Agregar/Editar<br>capturas</a><br>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

