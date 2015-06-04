<div class="activities view">
<h2><?php echo __('Activity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detetime'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['detetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activity['Category']['title'], array('controller' => 'categories', 'action' => 'view', $activity['Category']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Activity'), array('action' => 'edit', $activity['Activity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Activity'), array('action' => 'delete', $activity['Activity']['id']), array(), __('Are you sure you want to delete # %s?', $activity['Activity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
