<div class="activitiesMembers view">
<h2><?php echo __('Activities Member'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($activitiesMember['ActivitiesMember']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activitiesMember['Member']['name'], array('controller' => 'members', 'action' => 'view', $activitiesMember['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activity'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activitiesMember['Activity']['title'], array('controller' => 'activities', 'action' => 'view', $activitiesMember['Activity']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is-pay'); ?></dt>
		<dd>
			<?php echo h($activitiesMember['ActivitiesMember']['is-pay']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($activitiesMember['ActivitiesMember']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Activities Member'), array('action' => 'edit', $activitiesMember['ActivitiesMember']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Activities Member'), array('action' => 'delete', $activitiesMember['ActivitiesMember']['id']), array(), __('Are you sure you want to delete # %s?', $activitiesMember['ActivitiesMember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activities Member'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
	</ul>
</div>
