<div class="prescriptions index">
	<h2><?php echo __('Prescriptions'); ?></h2>
	<table class="full table table-striped table">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('factor_id', 'Functional Disturbances'); ?></th>
			<th><?php echo $this->Paginator->sort('base_nutrient_id', 'Nutrients'); ?></th>
			<th><?php echo $this->Paginator->sort('1_20', '1 - 20'); ?></th>
			<th><?php echo $this->Paginator->sort('21_40', '21 - 40'); ?></th>
			<th><?php echo $this->Paginator->sort('41_60', '41 - 60'); ?></th>
			<th><?php echo $this->Paginator->sort('61_80', '61 - 80'); ?></th>
			<th><?php echo $this->Paginator->sort('81_100', '81 - 100'); ?></th>
			<th><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($prescriptions as $prescription): ?>
	<tr>
		<td><?php echo h($prescription['Prescription']['id']); ?>&nbsp;</td>
		<td><?php echo h($prescription['Factor']['name']); ?>&nbsp;</td>
		<td><?php echo h($prescription['BaseNutrient']['base_nutrient_formula']); ?>&nbsp;</td>
		<td><?php echo h($prescription['Prescription']['1_20']); ?>&nbsp;</td>
		<td><?php echo h($prescription['Prescription']['21_40']); ?>&nbsp;</td>
		<td><?php echo h($prescription['Prescription']['41_60']); ?>&nbsp;</td>
		<td><?php echo h($prescription['Prescription']['61_80']); ?>&nbsp;</td>
		<td><?php echo h($prescription['Prescription']['81_100']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $prescription['Prescription']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prescription['Prescription']['id']), array('class' => 'btn btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prescription['Prescription']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $prescription['Prescription']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Prescription'), array('action' => 'add'), array('class' => "btn btn-primary")); ?></li>
	</ul>
</div>
*/ ?>