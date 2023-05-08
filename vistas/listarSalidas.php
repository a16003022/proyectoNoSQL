<div class="row">
    <div class="col-6">
        <h1>Salidas</h1>
        <h5>Agrupación de personas por salidas</h5>
    </div>
    <div class="col-6 text-right">
        <br><a href="?q=agregarSalida" class="btn btn-success">Agregar salida</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Barco</th>
                    <th>Tripulantes</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($cursorPersonas as $persona): ?>
                <tr>
                    <td>
                        <a class="btn btn-warning" href="?q=editarSalida&id=<?php echo $persona->_id ?>">Editar</a><br>
                        <a class="btn btn-danger" href="?q=eliminarSalida&id=<?php echo $persona->_id ?>">Eliminar</a><br><br>
                        <a class="btn btn-success" href="?q=agregarPersona&id=<?php echo $persona->_id?>">Agregar<br>persona</a>
                    </td>
                    <td><?php echo $persona->nombreSalida?></td>
                    <td><?php echo $persona->nombreBarco?></td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Contacto</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                        $tripulantes = $persona->tripulantes;
                        $contador = count($tripulantes);
                        $numerador = 0;
                        foreach ($persona->tripulantes as $tripulante) { 
                            $numerador++; ?>
                                    <tr>
                                        <td><?php echo $numerador ?></td>
                                        <td><?php echo $tripulante->nombre ?></td>
                                        <td><?php echo $tripulante->direccion ?></td>
                                        <td><?php echo $tripulante->telefono ?></td>
                                        <td><?php echo $tripulante->contacto ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="?q=editarPersona&id=<?php echo $tripulante->_id ?>">Editar</a><br>
                                            <?php if ($contador > 1){ //no se puede quedar sin tripulantes un barco que ya salió ?>
                                                <a class="btn btn-danger" href="?q=eliminarPersona&id=<?php echo $tripulante->_id ?>">Eliminar</a>
                                            <?php } ?>
                                        </td>
                                    </tr> <?php 
                        }
                            echo "</tbody>";
                        echo "</table>"; ?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>


