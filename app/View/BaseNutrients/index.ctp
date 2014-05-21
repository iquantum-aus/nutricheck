<div class="baseNutrients index">
	<h2><?php echo __('Base Nutrients'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('base_nutrient_formula'); ?></th>
			<th><?php echo $this->Paginator->sort('daily_dosage'); ?></th>
			<th><?php echo $this->Paginator->sort('maximum_dosage'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($baseNutrients as $baseNutrient): ?>
	<tr>
		<td><?php echo h($baseNutrient['BaseNutrient']['id']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['base_nutrient_formula']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['daily_dosage']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['maximum_dosage']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['created']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['modified']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $baseNutrient['BaseNutrient']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $baseNutrient['BaseNutrient']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $baseNutrient['BaseNutrient']['id']), null, __('Are you sure you want to delete # %s?', $baseNutrient['BaseNutrient']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Base Nutrient'), array('action' => 'add')); ?></li>
	</ul>
</div>
