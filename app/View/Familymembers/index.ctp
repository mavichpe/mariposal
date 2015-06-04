<div class="familymembers index">
	<h2><?php echo __('Familymembers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('member_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('edad'); ?></th>
			<th><?php echo $this->Paginator->sort('cedula'); ?></th>
			<th><?php echo $this->Paginator->sort('parentesco'); ?></th>
			<th><?php echo $this->Paginator->sort('estado-civil'); ?></th>
			<th><?php echo $this->Paginator->sort('ocupacion'); ?></th>
			<th><?php echo $this->Paginator->sort('lugar-trabajo'); ?></th>
			<th><?php echo $this->Paginator->sort('tel'); ?></th>
			<th><?php echo $this->Paginator->sort('salario-bruto'); ?></th>
			<th><?php echo $this->Paginator->sort('salario-neto'); ?></th>
			<th><?php echo $this->Paginator->sort('is-ccss'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($familymembers as $familymember): ?>
	<tr>
		<td><?php echo h($familymember['Familymember']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($familymember['Member']['name'], array('controller' => 'members', 'action' => 'view', $familymember['Member']['id'])); ?>
		</td>
		<td><?php echo h($familymember['Familymember']['name']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['edad']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['cedula']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['parentesco']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['estado-civil']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['ocupacion']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['lugar-trabajo']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['tel']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['salario-bruto']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['salario-neto']); ?>&nbsp;</td>
		<td><?php echo h($familymember['Familymember']['is-ccss']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $familymember['Familymember']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $familymember['Familymember']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $familymember['Familymember']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $familymember['Familymember']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Familymember'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
