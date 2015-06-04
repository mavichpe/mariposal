<?php ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Registros a actividades <a href="<?php echo Router::url(array("action"=>"add")); ?>" class="btn btn-default btn-success" > <i class="fa fa-lg fa-desktop"></i> &nbsp;Agregar Registro</a>

            </h1>
        </div>
        <div class="col-lg-6">
            <label>Filtro de Busqueda</label>
            <div class="form-group input-group">
                <?php echo $this->Form->create(); ?>
                <?php echo $this->Form->input("filter",array("label"=>false,"class"=>"form-control","id"=>"search-box","div"=>false)); ?>
                <?php echo $this->Form->end(); ?>
                </form>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    <button class="btn btn-danger" type="button" onclick="clearForm()"><i class="fa fa-close"></i></button>
                </span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('member_id',"Nombre Miembro"); ?></th>
                            <th><?php echo $this->Paginator->sort('activity_id',"Actividad"); ?></th>
                            <th><?php echo $this->Paginator->sort('is-pay',"Actividad Paga ?"); ?></th>
                            <th><?php echo $this->Paginator->sort('created',"Fecha de Registro"); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
	<?php foreach ($activitiesMembers as $activitiesMember): ?>
                        <tr>
                            <td>
			<?php echo $activitiesMember['Member']['name']; ?>
                            </td>
                            <td>
			<?php echo $activitiesMember['Activity']['title']; ?>
                            </td>
                            <td><?php echo $activitiesMember['ActivitiesMember']['is-pay'] == true ? "Si":"No"; ?>&nbsp;</td>
                            <td><?php $fecha = new DateTime($activitiesMember['ActivitiesMember']['created']); echo $fecha->format("d-m-Y h:m") ; ?>&nbsp;</td>
                            <td class="actions">
			<?php echo $this->Html->link(__('<i class="fa fa-pencil-square-o fa-lg"></i> Editar'), array('action' => 'edit', $activitiesMember['ActivitiesMember']['id']),array('escape' => false)); ?>
                                <br/>
			<?php echo $this->Form->postLink(__('<i class="fa fa-trash fa-lg"></i> Borrar'), array('action' => 'delete', $activitiesMember['ActivitiesMember']['id']), array('escape' => false,'confirm' => __('Esta seguro que desea Borrar el registro de actividad para  "'.$activitiesMember['Member']['name'].'"?', $activitiesMember['ActivitiesMember']['id']))); ?>
                            </td>
                        </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination pagination-large">
                    <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('Anterior'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Siguiente'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>