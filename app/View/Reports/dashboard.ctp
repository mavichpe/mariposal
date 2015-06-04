<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Seleccione un reporte
            </h1>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="row" style="text-align: center;">
        <a href="<?php  echo Router::url(array("controller"=>"activities","action"=>"select")); ?>" class="col-lg-2 col-lg-offset-4">
            <i class="fa fa-4x fa-desktop"></i> 
            <br/>
            Reporte de Actividad
        </a>
        <a href="<?php  echo Router::url(array("controller"=>"members","action"=>"select")); ?>" class="col-lg-2">
            <i class="fa fa-4x fa-bar-chart-o"></i>
            <br/>
            Reporte de Asociado
        </a>
    </div>
</div>