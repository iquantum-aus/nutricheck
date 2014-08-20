<div class="factorTypes view">
<h2><?php echo __('Factor Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($factorType['FactorType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($factorType['FactorType']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($factorType['FactorType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($factorType['FactorType']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($factorType['FactorType']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Factor Type'), array('action' => 'edit', $factorType['FactorType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Factor Type'), array('action' => 'delete', $factorType['FactorType']['id']), null, __('Are you sure you want to delete # %s?', $factorType['FactorType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Factor Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factor Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
