<div class="familymembers view">
<h2><?php echo __('Familymember'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member'); ?></dt>
		<dd>
			<?php echo $this->Html->link($familymember['Member']['name'], array('controller' => 'members', 'action' => 'view', $familymember['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edad'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['edad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedula'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['cedula']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parentesco'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['parentesco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado-civil'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['estado-civil']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ocupacion'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['ocupacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lugar-trabajo'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['lugar-trabajo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['tel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salario-bruto'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['salario-bruto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salario-neto'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['salario-neto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is-ccss'); ?></dt>
		<dd>
			<?php echo h($familymember['Familymember']['is-ccss']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Familymember'), array('action' => 'edit', $familymember['Familymember']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Familymember'), array('action' => 'delete', $familymember['Familymember']['id']), array(), __('Are you sure you want to delete # %s?', $familymember['Familymember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Familymembers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Familymember'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
