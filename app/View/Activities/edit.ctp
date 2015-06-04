<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Modificar Actividad
            </h1>
        </div>
    </div>
        <?php echo $this->Form->create('Activity'); ?>
    <fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array("label"=>"Nombre Actividad"));
		echo $this->Form->input('price',array("label"=>"Monto Actividad"));
		echo $this->Form->input('date',array("label"=>"Fecha Actividad"));
		echo $this->Form->input('category_id',array("label"=>"Tipo de Actividad"));
	?>
    </fieldset>
<?php echo $this->Form->submit('Guardar',array("class"=>"btn btn-default btn-success","after"=>"<a href='".Router::url(array("action"=>"index"))."'class='btn btn-default btn-danger' style='margin-left:10px;'>Cancelar</a>")); ?>
<?php echo $this->Form->end(); ?>
</div>
