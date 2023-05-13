<div class="row">
    <div class="col">
        <h1>Posiciones</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <table id="miTabla" class="table">
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#miTabla').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            "pageLength": 5, //Establece el número de filas por página en 3
            "lengthMenu": [5, 10 ,25, 50] //Establece las opciones del menú de longitud de página
        });
    });
</script>

