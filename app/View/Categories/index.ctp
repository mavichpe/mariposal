<?php ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tipos de Actividad <a href="<?php echo Router::url(array("action"=>"add")); ?>" class="btn btn-default btn-success" > <i class="fa fa-lg fa-plus"></i> &nbsp;Agregar Tipo de Actividad</a>

            </h1>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('title'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
	<?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo h($category['Category']['title']); ?>&nbsp;</td>
                            <td class="actions">
			<?php echo $this->Html->link(__('<i class="fa fa-pencil-square-o fa-lg"></i> Editar'), array('action' => 'edit', $category['Category']['id']),array('escape' => false)); ?>
                                <span style="margin-right: 20px;"></span>
			<?php echo $this->Form->postLink(__('<i class="fa fa-trash fa-lg"></i> Borrar'), array('action' => 'delete', $category['Category']['id']), array('escape' => false,'confirm' => __('Esta seguro que desea borrar el tipo de actividad "'.$category['Category']['title'].'"?', $category['Category']['id']))); ?>
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
