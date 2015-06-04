<?php ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Reporte de Asistencias
            </h1>
        </div>
        <div class="col-lg-12 reports">
            <p>
                <b>Asociado :</b>   <?php  echo $member["Member"]["name"]; ?>
                <br/>
                <b>Cedula :</b>   <?php  echo $member["Member"]["cedula"]; ?>
            </p>
            <h3>Asistencia a Actividades:</h3>
            <p>
                <b>Cantidad de Eventos :</b>   <?php  echo $cantidadActivities; ?>
                <br/>
                <b>Cantidad de Eventos Asistidos :</b>   <?php  echo $cantidadActivitiesAsistidas; ?>
                <br/>
                <b>Cantidad de Eventos Pagados :</b>   <?php  echo $cantidadActivitiesPagadas; ?>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">                <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre de Actividad</th>
                            <th>Asistio A Actividad</th>
                            <th>Actividad Pagada</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
            foreach($activities as $actividad){  ?>
                        <tr>
                            <td><?php  $fecha = new DateTime($actividad["Activity"]["date"]);
                echo $fecha->format("d-m-Y");?></td>
                            <td><?php echo $actividad["Activity"]["title"]; ?></td>
                <?php if(isset($actividad['ActivitiesMember']['id']) && $actividad['ActivitiesMember']['id'] != null){ ?>
                            <td>Si</td>
                            <td><?php echo $actividad["ActivitiesMember"]["is-pay"] == true ? "Si": "No"; ?></td>
                <?php }else {?>
                            <td>No</td>
                            <td>N/A</td>
                <?php } ?>
                        </tr>
            <?php }?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>