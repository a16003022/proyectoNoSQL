<div class="row">
    <div class="col">
        <h1>Barcos</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del barco</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cursorBarcos as $barco): ?>
                <tr>
                    <td><?php echo $barco->nombreBarco ?></td>
                    <td>
                        <a class="btn btn-warning" href="?q=editarBarco&id=<?php echo $barco->_id ?>">Editar</a>
                        <a class="btn btn-danger" href="?q=eliminarBarco&id=<?php echo $barco->_id ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="?q=agregarBarco" class="btn btn-success">Agregar</a>
        <br>
    </div>
</div>

