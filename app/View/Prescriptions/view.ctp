<div class="prescriptions view">
<h2><?php echo __('Prescription'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Factor Id'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['factor_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Functional Disturbance'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['functional_disturbance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('1 20'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['1_20']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('21 40'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['21_40']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('41 60'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['41_60']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('61 80'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['61_80']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('81 100'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['81_100']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maximum Dosage'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['maximum_dosage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($prescription['Prescription']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prescription'), array('action' => 'edit', $prescription['Prescription']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prescription'), array('action' => 'delete', $prescription['Prescription']['id']), null, __('Are you sure you want to delete # %s?', $prescription['Prescription']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prescriptions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prescription'), array('action' => 'add')); ?> </li>
	</ul>
</div>
