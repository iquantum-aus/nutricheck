<div class="nutritionalGuides view">
<h2><?php echo __('Nutritional Guide'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuide['NutritionalGuide']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuide['NutritionalGuide']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuide['NutritionalGuide']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($nutritionalGuide['Users']['id'], array('controller' => 'users', 'action' => 'view', $nutritionalGuide['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuide['NutritionalGuide']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuide['NutritionalGuide']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($nutritionalGuide['NutritionalGuide']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nutritional Guide'), array('action' => 'edit', $nutritionalGuide['NutritionalGuide']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nutritional Guide'), array('action' => 'delete', $nutritionalGuide['NutritionalGuide']['id']), null, __('Are you sure you want to delete # %s?', $nutritionalGuide['NutritionalGuide']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Nutritional Guides'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nutritional Guide'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
