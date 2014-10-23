<div class="baseNutrients index">
	<h2><?php echo __('Base Nutrients'); ?> <small> - <?php echo $this->Html->link(__('Create New'), array('action' => 'add')); ?></small></h2>
	
	<div class="left" style="width: 100%;">
		<form method="POST" id="GroupSelect" class="left full" action="/baseNutrients/index/">
			<label style="float: left; margin-right: 20px; padding-top: 10px;"><strong>Search for a Base Nutrient:</strong></label>
			<?php echo $this->Form->input('BaseNutrient.id', array('style' => "width: 40%; float: left;", 'options' => $base_nutrient_list, 'multiple' => true, 'empty' => 'Search Here', 'label' => false, 'div' => false, 'class' => 'chosen-select', 'selected' => $selected_ids)); ?>
			<input name="data[base_nutrient_list][submit]" type="submit" value="SUBMIT" class="btn btn-success">
			<input name="data[base_nutrient_list][reset]" type="submit" value="RESET" class="btn btn-danger">
			<!-- <input type="submit" class="btn btn-success" value="SELECT" name="data[User][submit]"> -->
		</form>
	</div>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('base_nutrient_formula'); ?></th>
			<th><?php echo $this->Paginator->sort('daily_dosage'); ?></th>
			<th><?php echo $this->Paginator->sort('maximum_dosage'); ?></th>
			<th><?php echo $this->Paginator->sort('group'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($baseNutrients as $baseNutrient): ?>
	<tr>
		<td><?php echo h($baseNutrient['BaseNutrient']['id']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['base_nutrient_formula']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['daily_dosage']); ?>&nbsp;</td>
		<td><?php echo h($baseNutrient['BaseNutrient']['maximum_dosage']); ?>&nbsp;</td>
		<td>
			<?php 
				switch($baseNutrient['BaseNutrient']['nutrient_group']) {
					case "":
						echo "";
						break;
						
					case 0:
						echo "Allergy";
						break;
					
					case 1:
						echo "Digestion";
						break;
					
					case 2:
						echo "Git Dysbiosis";
						break;
					
					case 3:
						echo "Vitamins";
						break;
						
					case 4:
						echo "Minerals";
						break;
						
					case 5:
						echo "Neurotransmitter Precursors";
						break;
				}
			?>&nbsp;
		</td>
		
		<td>
			<a href="/base_nutrients/view/<?php echo $baseNutrient['BaseNutrient']['id']; ?>" class="btn btn-primary">View</a>
			<a href="/base_nutrients/edit/<?php echo $baseNutrient['BaseNutrient']['id']; ?>" class="btn btn-warning">Edit</a>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $baseNutrient['BaseNutrient']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $baseNutrient['BaseNutrient']['id'])); ?>
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