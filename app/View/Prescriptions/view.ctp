<div class="prescriptions view">
<h2><?php echo __('Prescription'); ?></h2>
	
	<table class="full table table-striped table">
		<tr>
			<td><strong>Id</strong></td>
			<td><?php echo h($prescription['Prescription']['id']); ?></td>
		</tr>
		<tr>
			<td><strong>Factor</strong></td>
			<td><?php echo h($prescription['Factor']['name']); ?></td>
		</tr>
		<tr>
			<td><strong>Functional Disturbance</strong></td>
			<td><?php echo h($prescription['Prescription']['functional_disturbance']); ?></td>
		</tr>
		<tr>
			<td><strong>1 - 20</strong></td>
			<td><?php echo h($prescription['Prescription']['1_20']); ?></td>
		</tr>
		<tr>
			<td><strong>21 - 40</strong></td>
			<td><?php echo h($prescription['Prescription']['21_40']); ?></td>
		</tr>
		<tr>
			<td><strong>41 - 60</strong></td>
			<td><?php echo h($prescription['Prescription']['41_60']); ?></td>
		</tr>
		<tr>
			<td><strong>61 - 80</strong></td>
			<td><?php echo h($prescription['Prescription']['61_80']); ?></td>
		</tr>
		<tr>
			<td><strong>81 - 100</strong></td>
			<td><?php echo h($prescription['Prescription']['81_100']); ?></td>
		</tr>
		<tr>
			<td><strong>Maximum Dosage</strong></td>
			<td><?php echo h($prescription['Prescription']['maximum_dosage']); ?></td>
		</tr>
		<tr>
			<td><strong>Created</strong></td>
			<td><?php echo h($prescription['Prescription']['created']); ?></td>
		</tr>
		<tr>
			<td><strong>Modified</strong></td>
			<td><?php echo h($prescription['Prescription']['modified']); ?></td>
		</tr>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prescription'), array('action' => 'edit', $prescription['Prescription']['id']), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prescription'), array('action' => 'delete', $prescription['Prescription']['id']), array('class' => 'btn btn-primary'), __('Are you sure you want to delete # %s?', $prescription['Prescription']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prescriptions'), array('action' => 'index'), array('class' => 'btn btn-primary')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prescription'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
	</ul>
</div>
