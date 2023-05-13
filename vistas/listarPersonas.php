<div class="row">
    <div class="col-6">
        <h1>Capturas por personas</h1>
        <h5>Salida: <?php echo $salida->nombreSalida ?></h5><br>
    </div>
    <div class="col-6 text-right">
        <br><a href="?q=listarSalidas" class="btn btn-primary">Regresar</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre persona</th>
                    <th>Salida</th>
                    <th>Barco</th>
                    <th>Capturas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($cursorPersonas as $persona): ?>
                <tr>
                    <td><?php echo $persona->nombre?></td>
                    <td><?php echo $persona->nombreSalida?></td>
                    <td><?php echo $persona->nombreBarco?></td>
                    <td>
                        <?php if (is_countable($persona->capturas)){ ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo de pez</th>
                                        <th>Cantidad(kg)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $contador = 0; 
                                    foreach ($persona->capturas as $captura) { $contador++; ?>
                                        <tr>
                                            <td><?php echo $contador ?></td>
                                            <td><?php echo $captura->nombre ?></td>
                                            <td><?php echo $captura->cantidad?></td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php }else{
                            echo $persona->capturas;
                        } ?>
                    </td>
                    <td> 
                    <a class="btn btn-warning" href="?q=agregarCapturas&idPersona=<?php echo $persona->_id?>&idSalida=<?php echo $persona->idSalida?>">Agregar/Editar<br>capturas</a><br>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>


