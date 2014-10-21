<div class="factorsQuestions index">
	<h2><?php echo __('Factors - Questions'); ?> <small> - <?php echo $this->Html->link(__('Create New'), array('action' => 'add')); ?></small></h2>
	<table class="full table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('factor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('multiplier'); ?></th>
			<th><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($factorsQuestions as $factorsQuestion): ?>
	<tr>
		<td>
			<?php echo $factorsQuestion['FactorsQuestion']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($factorsQuestion['Factor']['name'], array('controller' => 'factors', 'action' => 'view', $factorsQuestion['Factor']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($factorsQuestion['Question']['question'], array('controller' => 'questions', 'action' => 'view', $factorsQuestion['Question']['id'])); ?>
		</td>
		<td style="text-align:center;">#<?php echo $factorsQuestion['Question']['id']." - ".$factorsQuestion['FactorsQuestion']['multiplier']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $factorsQuestion['FactorsQuestion']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $factorsQuestion['FactorsQuestion']['id']), array('class' => 'btn btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $factorsQuestion['FactorsQuestion']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete this record?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Association'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('NutriCheck'), array('action' => 'nutrient_check'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
*/ ?>