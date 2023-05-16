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
    #miTabla_paginate{
        color:white !important;
    }
    tr:hover{
        color:white !important;
    }
</style>
<div class="row text-white">
    <div class="col">
        <h1 style="font-family: 'Quicksand', sans-serif;">Barcos</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <table id="miTabla" class="table text-dark table-hover">
            <thead>
                <tr class="text-white">
                    <th>Nombre del barco</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cursorBarcos as $barco): ?>
                <tr>
                    <td><?php echo $barco->nombreBarco ?></td>
                    <td>
                        <a class="btn btn-warning" style="background-color: #F57A00 !important; border:#F57A00 !important;" href="?q=editarBarco&id=<?php echo $barco->_id ?>"><i class="mdi mdi-pencil-outline"></i></a>
                        <a class="btn btn-danger" style="background-color: rgb(194, 2, 2) !important; border:rgb(194, 2, 2) !important;" href="?q=eliminarBarco&id=<?php echo $barco->_id ?>"><i class="mdi mdi-delete-alert"></i></a> 
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="?q=agregarBarco" class="btn btn-success" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;"><i class="mdi mdi-plus-circle p-1"></i>Agregar</a>
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

