<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Modificar Registro de actividad
            </h1>
        </div>
    </div><?php echo $this->Form->create('ActivitiesMember'); ?>
    <fieldset>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->input('member_id',array("label"=>"Asociado","id"=>"member_id"));
                echo $this->Form->input('activity_id',array("label"=>"Actividad"));
                echo $this->Form->input('is-pay',array("div"=>"form-group","label"=>"Pago valor de Actividad","type"=>"checkbox"));
        ?>
    </fieldset>
<?php echo $this->Form->submit('Guardar',array("class"=>"btn btn-default btn-success","after"=>"<a href='".Router::url(array("action"=>"index"))."'class='btn btn-default btn-danger' style='margin-left:10px;'>Cancelar</a>")); ?>
</div>
