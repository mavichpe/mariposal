<?php ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Reporte de Actividad
            </h1>
        </div>
        <div class="col-lg-12 reports">
            <p>
                <b>Actividad :</b>   <?php  echo $activity["Activity"]["title"]; ?>
            </p>
            <h3>Asistencia a Actividades:</h3>
            <p>
                <b>Cantida de Asociados Presentes :</b> <?php  echo count($activityMembers); ?>
                <br/>
                <b>Cantidad de Dinero Recaudado :</b> <?php  echo money_format("%i", $total); ?> 
            </p>
            <h2>Lista de Asistencia</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">                <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre de Miembro</th>
                            <th>Realizo el Pago?</th>
                            <th>Monto Pagado</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
            foreach($activityMembers as $members){  ?>
                        <tr>
                            <td><?php  $fecha = new DateTime($members["ActivitiesMember"]["created"]);
                echo $fecha->format("d-m-Y");?></td>
                            <td><?php echo $members["Member"]["name"]; ?></td>
                            <td><?php echo $members["ActivitiesMember"]["is-pay"] == true ? "Si": "No"; ?></td>
                            <td><?php echo $members["ActivitiesMember"]["monto"]; ?></td>
                        </tr>
            <?php }?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>