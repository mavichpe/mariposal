<div class="members view">
<h2><?php echo __('Member'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($member['Member']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($member['Member']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedula'); ?></dt>
		<dd>
			<?php echo h($member['Member']['cedula']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edad'); ?></dt>
		<dd>
			<?php echo h($member['Member']['edad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado-civil'); ?></dt>
		<dd>
			<?php echo h($member['Member']['estado-civil']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel-habitacion'); ?></dt>
		<dd>
			<?php echo h($member['Member']['tel-habitacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel-trabajo'); ?></dt>
		<dd>
			<?php echo h($member['Member']['tel-trabajo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel-cel'); ?></dt>
		<dd>
			<?php echo h($member['Member']['tel-cel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($member['Member']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ocupacion'); ?></dt>
		<dd>
			<?php echo h($member['Member']['ocupacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trabajo'); ?></dt>
		<dd>
			<?php echo h($member['Member']['trabajo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Programa-obtar'); ?></dt>
		<dd>
			<?php echo h($member['Member']['programa-obtar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is-ahorro'); ?></dt>
		<dd>
			<?php echo h($member['Member']['is-ahorro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is-bono-59'); ?></dt>
		<dd>
			<?php echo h($member['Member']['is-bono-59']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is-discapacitado'); ?></dt>
		<dd>
			<?php echo h($member['Member']['is-discapacitado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discapacidad-details'); ?></dt>
		<dd>
			<?php echo h($member['Member']['discapacidad-details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($member['Member']['observaciones']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elaborado-por'); ?></dt>
		<dd>
			<?php echo h($member['Member']['elaborado-por']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingreso'); ?></dt>
		<dd>
			<?php echo h($member['Member']['ingreso']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), array(), __('Are you sure you want to delete # %s?', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('action' => 'add')); ?> </li>
	</ul>
</div>
