<div class="factorsQuestions view">
<h2><?php echo __('Factors Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($factorsQuestion['FactorsQuestion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Factors'); ?></dt>
		<dd>
			<?php echo $this->Html->link($factorsQuestion['Factors']['name'], array('controller' => 'factors', 'action' => 'view', $factorsQuestion['Factors']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questions'); ?></dt>
		<dd>
			<?php echo $this->Html->link($factorsQuestion['Questions']['id'], array('controller' => 'questions', 'action' => 'view', $factorsQuestion['Questions']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Multiplier'); ?></dt>
		<dd>
			<?php echo h($factorsQuestion['FactorsQuestion']['multiplier']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Factors Question'), array('action' => 'edit', $factorsQuestion['FactorsQuestion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Factors Question'), array('action' => 'delete', $factorsQuestion['FactorsQuestion']['id']), null, __('Are you sure you want to delete # %s?', $factorsQuestion['FactorsQuestion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
