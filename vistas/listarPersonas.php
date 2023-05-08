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
                    <th>Nombre persona</th>
                    <th>Salida</th>
                    <th>Barco</th>
                    <th>Capturas</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cursorPersonas as $persona): ?>
                <tr>
                    <td><?php echo $persona->nombre?></td>
                    <td><?php echo $persona->nombreSalida?></td>
                    <td><?php echo $persona->nombreBarco?></td>
                    <td>
                        <?php if (is_countable($persona->capturas)){ ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tipo de Pez</th>
                                        <th>Cantidad capturada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($persona->capturas as $captura) { ?>
                                        <tr>
                                            <td><?php echo $captura->tipoPez ?></td>
                                            <td><?php echo $captura->totalPez ?></td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php }else{
                            echo $persona->capturas;
                        } ?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col text-right">
        <a href="?q=agregarSalida" class="btn btn-success">Agregar captura</a>
    </div>
</div>



