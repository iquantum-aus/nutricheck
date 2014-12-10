<div class="templates view">
<h2><?php echo __('Template'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($template['Template']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($template['Template']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Template'), array('action' => 'edit', $template['Template']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Template'), array('action' => 'delete', $template['Template']['id']), null, __('Are you sure you want to delete # %s?', $template['Template']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Template'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Widgets'), array('controller' => 'widgets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Widget'), array('controller' => 'widgets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Widgets'); ?></h3>
	<?php if (!empty($template['Widget'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Template Id'); ?></th>
		<th><?php echo __('Hosted Url'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($template['Widget'] as $widget): ?>
		<tr>
			<td><?php echo $widget['id']; ?></td>
			<td><?php echo $widget['name']; ?></td>
			<td><?php echo $widget['template_id']; ?></td>
			<td><?php echo $widget['hosted_url']; ?></td>
			<td><?php echo $widget['created']; ?></td>
			<td><?php echo $widget['modified']; ?></td>
			<td><?php echo $widget['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'widgets', 'action' => 'view', $widget['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'widgets', 'action' => 'edit', $widget['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'widgets', 'action' => 'delete', $widget['id']), null, __('Are you sure you want to delete # %s?', $widget['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Widget'), array('controller' => 'widgets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
