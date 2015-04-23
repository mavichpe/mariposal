<div class="familymembers form">
<?php echo $this->Form->create('Familymember'); ?>
	<fieldset>
		<legend><?php echo __('Edit Familymember'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('member_id');
		echo $this->Form->input('name');
		echo $this->Form->input('edad');
		echo $this->Form->input('cedula');
		echo $this->Form->input('parentesco');
		echo $this->Form->input('estado-civil');
		echo $this->Form->input('ocupacion');
		echo $this->Form->input('lugar-trabajo');
		echo $this->Form->input('tel');
		echo $this->Form->input('salario-bruto');
		echo $this->Form->input('salario-neto');
		echo $this->Form->input('is-ccss');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Familymember.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Familymember.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Familymembers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
