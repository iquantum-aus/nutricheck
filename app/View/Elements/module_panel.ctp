<div style="min-height: 374px; width: 20%;margin:0 0 40px 0;" class="dashboardbox noborder buttons">	
	<?php if($this->Session->read('Auth.User.group_id') != 1) { ?>
		<a href="/questions/nutrient_check" id="startNutricheck" class="dashbutton dashbutton1">START NUTRICHECK</a>
		
		<?php if($this->Session->read('Auth.User.group_id') != 3) { ?>
			<a href="" id="sendNutricheckButton" class="dashbutton dashbutton2">SEND NUTRICHECK</a>
		<?php } ?>
		
		<a target="_blank" id="printNutricheck" href="/questions/print_question_list<?php if($this->Session->read('Auth.User.group_id') == 3) {  echo "?hash_value=".$this->Session->read('Auth.User.hash_value'); } ?>" class="dashbutton dashbutton3">PRINT NUTRICHECK</a>
		
		<?php if($this->Session->read('Auth.User.group_id') != 3) { ?>
			<a class="fancybox dashbutton dashbutton4" href="#quickEntry">QUICK ENTRY</a>
			<a href="#" id="reportsNutricheck" class="dashbutton dashbutton5">REPORTS</a>
		<?php } ?>
	<?php } ?>
</div>

<script>
	$(document).ready( function () {
		$('#sendNutricheckButton').click( function () {
			
			var selectedUser = $('#selectedUser').val();
			var selectedFactor = $('#selectedFactor').val();
			
			if((selectedUser == "") && (selectedFactor == "")) {
				alert('Please choose a user to continue');
				return false;
			} else {				
				$.ajax({
					async:true,
					data: "hash_value="+selectedUser+"&factors="+selectedFactor,
					dataType:'html',
					success:function (data, textStatus) {
						if(data == 1) {
							alert('Nutricheck was succesfully sent');
						} else {
							alert(data);
						}
					},
					type:'post',
					url:"http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutricheckSender"
				});
			}
			
			return false;
		});
	});
</script>