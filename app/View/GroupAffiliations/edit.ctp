<div class="groupAffiliations form">
<?php echo $this->Form->create('GroupAffiliation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Group Affiliation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->submit('submit', array('class' => 'btn btn-success'));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
