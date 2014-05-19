<div class="qgroups view">
<h2><?php echo __('Question Group'); ?></h2>
	<dl class="left">
		<dt  class="left"><?php echo __('Id'); ?></dt>
		<dd  class="left">
			<?php echo h($qgroup['Qgroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($qgroup['Qgroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($qgroup['Qgroup']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($qgroup['Qgroup']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($qgroup['Qgroup']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Qgroup'), array('action' => 'edit', $qgroup['Qgroup']['id']), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Qgroup'), array('action' => 'delete', $qgroup['Qgroup']['id']), array('class' => 'btn btn-primary'), __('Are you sure you want to delete # %s?', $qgroup['Qgroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Qgroups'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qgroup'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($qgroup['Question'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Users Id'); ?></th>
		<th><?php echo __('Question'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($qgroup['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>
			<td><?php echo $question['users_id']; ?></td>
			<td><?php echo $question['question']; ?></td>
			<td><?php echo $question['created']; ?></td>
			<td><?php echo $question['modified']; ?></td>
			<td><?php echo $question['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $question['id']), null, __('Are you sure you want to delete # %s?', $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
