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
<div class="row">
    <div class="col">
        <h1 style="font-family: 'Quicksand', sans-serif;">Capturas por salidas</h1>
        <h5 style="font-family: 'Quicksand', sans-serif;">Totales capturados<h5>
    </div>
</div>
<div class="row">
    <div class="col">
        <table id="miTabla" class="table text-dark table-hover">
            <thead>
                <tr class="text-white">
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
                        <table class="table text-dark">
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
                                $bandera = false;
                                foreach ($captura->capturas as $pez) { 
                                    if (isset($pez->id)) { 
                                    $bandera= true; ?>
                                    <tr>
                                        <td><?php echo $pez->id ?></td>
                                        <td><?php echo $pez->nombre ?></td>
                                        <td><?php echo $pez->precio?></td>
                                        <td><?php echo $pez->cantidad?></td>
                                        <td></td>
                                    </tr>
                                <?php } else { ?>
                                       <td><?php echo "N/A" ?></td>
                                       <td><?php echo "Sin capturar" ?></td>
                                       <td><?php echo "N/A" ?> </td>
                                       <td><?php echo "0" ?> </td>
                                       <td></td> <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </td>
                    <td> 
                    <a class="btn btn-success" style="background-color: rgb(27, 186, 186) !important; border:rgb(27, 186, 186) !important;" href="?q=listarPersonas&id=<?php echo $captura->idSalida ?>">Detalles<br>(capturar)</a><br>
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


