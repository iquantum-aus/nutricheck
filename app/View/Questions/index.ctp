<div class="questions index">
	<h2><?php echo __('Questions'); ?></h2>
	
	<div id="qgroup_holder">
		<form id="qgroup_selector" method="POST">
			<label class="left">Select Group:</label>
			<div class = "left">
				<?php echo $this->Form->input('Qgroup.id', array('options' => $qgroups, 'selected' => $selected_qgroup, 'empty' => 'Select a question list', 'div' => false, 'label' => false)); ?>
			</div>
			
			<a href="#qgroup_creator_holder" class="fancybox btn btn-primary">Create</a>
			<a id="qgroup_edit" href="#qgroup_editor_holder" class="fancybox btn btn-warning">Edit</a>
		</form>
	</div>
	
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('question'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($questions as $question): ?>
	<tr>
		<td>
			<?php 
				echo substr($question['Question']['question'], 0, 85); 
				if(strlen($question['Question']['question']) > 85) {
					echo "...";
				}
			?>&nbsp;
		</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $question['Question']['id']), array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-warning')); ?>
			<?php 
				echo $this->Form->postLink(__('Delete'), 
					array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete this record?')
				); 
			?>
			
			<?php
				if(!empty($selected_qgroup)) {
					if(!empty($selected_questions)) {
						if(in_array($question['Question']['id'], $selected_questions)) {
							?>
								<a style="width: 170px; text-align: center;" type="button" id="addToGroup_<?php echo $question['Question']['id']; ?>" class="hidden addToGroup btn btn-success">Add to Group</a>
								<a style="width: 170px; text-align: center;" type="button" id="removeFromGroup_<?php echo $question['Question']['id']; ?>" class="removeFromGroup btn btn-info">Remove from Group</a>
							<?php
						} else {
							?>
								<a style="width: 170px; text-align: center;" type="button" id="addToGroup_<?php echo $question['Question']['id']; ?>" class="addToGroup btn btn-success">Add to Group</a>
								<a style="width: 170px; text-align: center;" type="button" id="removeFromGroup_<?php echo $question['Question']['id']; ?>" class="hidden removeFromGroup btn btn-info">Remove from Group</a>
							<?php
						}
					} else {
						?>
							<a style="width: 170px; text-align: center;" type="button" id="addToGroup_<?php echo $question['Question']['id']; ?>" class="addToGroup btn btn-success">Add to Group</a>
							<a style="width: 170px; text-align: center;" type="button" id="removeFromGroup_<?php echo $question['Question']['id']; ?>" class="hidden removeFromGroup btn btn-info">Remove from Group</a>
						<?php
					}
				}
			?>
			
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
<div class="actions hidden">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Associate Factors'), array('controller' => 'FactorsQuestions'), array('class' => 'btn btn-primary')); ?></li>
		<li><?php echo $this->Html->link(__('Create Question'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?></li>
	</ul>
	
	<?php
	// <div class="left" id="qgroup_cart_holder">
		// <div id="replaceContent">
			// <?php
				// if(!empty($selected_questions)) {
					// ?>
						// <div style='font-size: 12px; margin-bottom: 10px;'>You currently have <?php echo count($selected_questions); ?> question(s) added to the group <i>"<?php echo $selected_group_details['Qgroup']['name']; ?>"</i></div><a  class='btn btn-info fancybox fancybox.iframe' href='http://<?php echo $_SERVER['SERVER_NAME']; ?>/qgroups/save_group_assoc' id='saveGroupAssociation'>Save Association</a>
					// <?php
				// }
			// ?>
		// </div>
	// </div>
	?>
</div>
/* ?>

<div style="display: none;">
	<div id="qgroup_creator_holder" style="width: 420px;">
		<form id="group_creator">
			<h3>Create Question Group</h3>
			<label class="left">Question Group:</label>&nbsp;
			<input id="add_qgroup_name" class="left" type="text" name="data[Qgroup][name]" style="width: 255px;">
			<input type="submit" value="Save Group" class="right btn btn-primary">
		</form>
	</div>
	
	<div id="qgroup_editor_holder" style="width: 420px;">
		<form id="group_editor">
			<h3>Update Question Group</h3>
			<label class="left">Question Group:</label>&nbsp;
			<input id="edit_qgroup_id" class="left" type="hidden" name="data[Qgroup][id]" style="width: 255px;">
			<input id="edit_qgroup_name" class="left" type="text" name="data[Qgroup][name]" style="width: 255px;">
			<input type="submit" value="Save Group" class="right btn btn-info">
		</form>
	</div>
</div>

<script>
	$(document).ready( function () {
		$('.fancybox').fancybox({
			afterClose: function() {
			}
		});
		
		$(".addToGroup").on("click", function () {
			
			var id = $(this).attr('id');
			
			var bare_id = id.split('_');
			var select_group_id = $("#QgroupId option:selected").val();
			
			$.ajax({
				async:true,
				dataType:'html',
				success:function (data, textStatus) {
					$('#'+id).addClass('hidden');
					$('#removeFromGroup_'+bare_id[1]).removeClass('hidden');
				},
				type:'post',
				url:"/questions/qgroup_cart/"+bare_id[1]
			});
			
			return false;
		});

		$('#qgroup_edit').click( function () {
			var qgroup_id = $('#QgroupId option:selected').val();
			var qgroup_text = $('#QgroupId option:selected').text();
			
			$('#edit_qgroup_id').val(qgroup_id);
			$('#edit_qgroup_name').val(qgroup_text);
		});
		
		$('#group_editor').submit( function () {
			$.ajax({
				async:true,
				dataType:'html',
				data:$(this).serialize(),
				success:function (data, textStatus) {					
					if(data) {
						var updated_name = $('#edit_qgroup_name').val();
						var qgroup_text = $('#QgroupId option:selected').text(updated_name);
						$.fancybox.close();
						alert('Question group was succesfully updated');
					}
				},
				type:'post',
				url:"/qgroups/ajax_update/"
			});
			
			return false;
		});
		
		$('#group_creator').submit( function () {
			$.ajax({
				async:true,
				dataType:'html',
				data:$(this).serialize(),
				success:function (data, textStatus) {					
					if(data) {
						var add_qgroup_name = $('#add_qgroup_name').val();
						var append_option = "<option value="+data+">"+add_qgroup_name+"</option>";
						$('#QgroupId').append(append_option);
						
						$("#QgroupId option[value='"+data+"']").attr('selected', 'selected');
						
						$.fancybox.close();
						alert('Question group was succesfully created');
					}
				},
				type:'post',
				url:"/qgroups/ajax_create/"
			});
			
			return false;
		});
		
		$('#QgroupId').change( function () {
			$('form#qgroup_selector').submit();
		});
		
		$(".removeFromGroup").click( function () {
			var id = $(this).attr('id');
			var bare_id = id.split('_');
			
			$.ajax({
				async:true,
				dataType:'html',
				success:function (data, textStatus) {
					if(data) {
						$('#'+id).addClass('hidden');
						$('#addToGroup_'+bare_id[1]).removeClass('hidden');
					}
				},
				type:'post',
				url:"/questions/qgroup_cart_remove/"+bare_id[1]+"/"
			});
			
			return false;
		});
	});
</script>