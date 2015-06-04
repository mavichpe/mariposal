<?php ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Seleccione Un Asociado
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
                            <th width="18%"><?php echo $this->Paginator->sort('name',"Nombre"); ?></th>
                            <th width="10%"><?php echo $this->Paginator->sort('cedula'); ?></th>
                            <th width="10%"><?php echo $this->Paginator->sort('tel-habitacion',"Tel Habitacion"); ?></th>
                            <th width="8%"><?php echo $this->Paginator->sort('tel-cel',"Celular"); ?></th>
                            <th width="10%"><?php echo $this->Paginator->sort('ingreso',"Fecha Ingreso"); ?></th>
                            <th width="15%" class="actions"><?php echo __('Acciones'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
	<?php foreach ($members as $member): ?>
                        <tr>
                            <td><?php echo h($member['Member']['name']); ?>&nbsp;</td>
                            <td><?php echo h($member['Member']['cedula']); ?>&nbsp;</td>
                            <td><?php echo h($member['Member']['tel-habitacion']); ?>&nbsp;</td>
                            <td><?php echo h($member['Member']['tel-cel']); ?>&nbsp;</td>
                            <td><?php $fecha = new DateTime($member['Member']['ingreso']);
                            echo $fecha->format("d-m-Y"); ?>&nbsp;</td>
                            <td class="actions">
			<?php echo $this->Html->link(__('<i class="fa fa-bar-chart-o fa-lg"></i> Ver Reporte'), array("controller"=>"reports",'action' => 'index', $member['Member']['id']),array('escape' => false)); ?>
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
