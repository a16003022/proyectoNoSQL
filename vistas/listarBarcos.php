<div class="row">
    <div class="col">
        <h1>Barcos</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <table id="miTabla" class="table">
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#miTabla').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            "pageLength": 5, //Establece el número de filas por página en 3
            "lengthMenu": [5, 10, 25, 50] //Establece las opciones del menú de longitud de página
        });
    });
</script>

