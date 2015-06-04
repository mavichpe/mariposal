<?php ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Actividades <a href="<?php echo Router::url(array("action"=>"add")); ?>" class="btn btn-default btn-success" > <i class="fa fa-lg fa-desktop"></i> &nbsp;Agregar Actividad</a>
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
                            <th><?php echo $this->Paginator->sort('title',"Titulo"); ?></th>
                            <th><?php echo $this->Paginator->sort('price',"Precio"); ?></th>
                            <th><?php echo $this->Paginator->sort('date',"fecha"); ?></th>
                            <th><?php echo $this->Paginator->sort('category_id',"Tipo de Actividad"); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
	<?php foreach ($activities as $activity): ?>
                        <tr>
                            <td><?php echo h($activity['Activity']['title']); ?>&nbsp;</td>
                            <td><?php echo h($activity['Activity']['price']); ?>&nbsp;</td>
                            <td><?php $fecha = new DateTime($activity['Activity']['date']);
                            echo $fecha->format("d-m-Y"); ?>&nbsp;</td>
                            <td>
			<?php echo $activity['Category']['title'];?>
                            </td>
                            <td class="actions">
                             <?php echo $this->Html->link(__('<i class="fa fa-bar-chart-o fa-lg"></i> Ver Reporte'), array("controller"=>"reports",'action' => 'activity', $activity['Activity']['id']),array('escape' => false)); ?>

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
