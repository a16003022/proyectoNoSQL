<div class="row">
    <div class="col">
        <h1>Posiciones</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del barco</th>
                    <th>Nombre salida</th>
                    <th>Fecha salida</th>
                    <th>Longitud</th>
                    <th>Latitud</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cursorSalidas as $salida): ?>
                <tr>
                    <td><?php echo $salida->nombreBarco ?></td>
                    <td><?php echo $salida->nombreSalida ?></td>
                    <td><?php echo $salida->fechaSalida ?></td>
                    <td><?php echo $salida->longitud ?></td>
                    <td><?php echo $salida->latitud ?></td>
                    <td>
                        <a class="btn btn-warning" href="?q=editarPosicion&id=<?php echo $salida->_id ?>">Editar<br>posición</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

