<form id="groupAssoc" method="POST" style="width: 100%; background: #fff;">
	<div style="position: fixed; background: #fff; width: 100%; border-bottom: 2px solid #2598c8; padding-bottom: 10px;">
		<div class="left full">
			<h2>Selected Group is: <strong><?php echo $selected_group_details['Qgroup']['name']; ?></strong></h2>
		</div>
		
		<div style="margin: 5px 0px;" class="full left">
			<input type="submit" class="btn btn-primary" value="Save Association">
		</div>
	</div>
	
	<input type="hidden" name="data[Qgroup][id]" value=<?php echo $selected_qgroup; ?>>
	<div style="padding-top: 120px;">
	<table cellpadding="0" cellspacing="0">
		<tr>
				<th>Questions</th>
				<th class="actions"></th>
		</tr>
		<?php foreach ($selected_questions as $key => $question): ?>
			<tr class="selectedQuestion_instance" id="cart_item_<?php echo $key; ?>">
				<td><?php echo h($question); ?>&nbsp;</td>
				<td>
					<input type="button" id="addToGroup_<?php echo $key; ?>" value="Remove From Group" class="removeFromGroup btn btn-warning">
					<input type="button" id="addToGroup_<?php echo $key; ?>" value="More" class="addToGroup btn btn-info">
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	</div>
</form>

<script>
	$(document).ready( function () {
	
		$('#replaceContent').html('');
		
		$('.removeFromGroup').click( function () {
			var id = $(this).attr('id');
			var bare_id = id.split('_');
			
			$.ajax({
				async:true,
				dataType:'html',
				success:function (data, textStatus) {
					if(data) {
						$("#cart_item_"+bare_id[1]).remove();
						var selected_question_count = $('.selectedQuestion_instance').length;			
						var html_content = "<div style='font-size: 12px; margin-bottom: 10px;'>You currently have "+selected_question_count+" question(s) added to the group <i>\"<?php echo $selected_group_details['Qgroup']['name']; ?>\"</i></div><a  class='fancybox fancybox.iframe' href='http://<?php echo $_SERVER['SERVER_NAME']; ?>/qgroups/save_group_assoc' id='saveGroupAssociation' class='btn btn-success'>Save Association</a>";
						parent.jQuery('#replaceContent').html(html_content);
						alert('Associated question was succesfully saved');
					}
				},
				type:'post',
				url:"/questions/qgroup_cart_remove/"+bare_id[1]+"/"
			});
			
			return false;
		});
		
		$('#groupAssoc').submit( function () {
			$.ajax({
				async:true,
				data:$(this).serialize(),
				dataType:'html',
				success:function (data, textStatus) {
					if(data) {
						parent.jQuery.fancybox.close();
						parent.jQuery('#replaceContent').html('');
						alert('Group association was succesfully saved');
					}
				},
				type:'post',
				url:"/qgroups/save_group_assoc"
			});
			
			return false;
		});
	});
</script>