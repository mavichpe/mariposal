<div class="members index">
	<h2><?php echo __('Members'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('cedula'); ?></th>
			<th><?php echo $this->Paginator->sort('edad'); ?></th>
			<th><?php echo $this->Paginator->sort('estado-civil'); ?></th>
			<th><?php echo $this->Paginator->sort('tel-habitacion'); ?></th>
			<th><?php echo $this->Paginator->sort('tel-trabajo'); ?></th>
			<th><?php echo $this->Paginator->sort('tel-cel'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('ocupacion'); ?></th>
			<th><?php echo $this->Paginator->sort('trabajo'); ?></th>
			<th><?php echo $this->Paginator->sort('programa-obtar'); ?></th>
			<th><?php echo $this->Paginator->sort('is-ahorro'); ?></th>
			<th><?php echo $this->Paginator->sort('is-bono-59'); ?></th>
			<th><?php echo $this->Paginator->sort('is-discapacitado'); ?></th>
			<th><?php echo $this->Paginator->sort('discapacidad-details'); ?></th>
			<th><?php echo $this->Paginator->sort('observaciones'); ?></th>
			<th><?php echo $this->Paginator->sort('elaborado-por'); ?></th>
			<th><?php echo $this->Paginator->sort('ingreso'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($members as $member): ?>
	<tr>
		<td><?php echo h($member['Member']['id']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['name']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['cedula']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['edad']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['estado-civil']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['tel-habitacion']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['tel-trabajo']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['tel-cel']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['ocupacion']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['trabajo']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['programa-obtar']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['is-ahorro']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['is-bono-59']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['is-discapacitado']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['discapacidad-details']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['observaciones']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['elaborado-por']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['ingreso']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $member['Member']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $member['Member']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $member['Member']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $member['Member']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Member'), array('action' => 'add')); ?></li>
	</ul>
</div>
