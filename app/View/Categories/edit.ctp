<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Agregar Tipo de Actividad
            </h1>
        </div>
    </div><?php echo $this->Form->create('Category'); ?>
    <fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array("label"=>"Nombre de Tipo de Actividad"));
	?>
    </fieldset>
<?php echo $this->Form->submit('Guardar',array("class"=>"btn btn-default btn-success","after"=>"<a href='".Router::url(array("action"=>"index"))."'class='btn btn-default btn-danger' style='margin-left:10px;'>Cancelar</a>")); ?>
</div>
