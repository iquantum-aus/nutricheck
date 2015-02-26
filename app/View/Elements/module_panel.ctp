<div style="" class="dashboardbox noborder buttons">	
<?php
//echo "gid : ".$this->Session->read('Auth.User.group_id');
/*
1 = admin
 - no buttons
2 = client (pharmacist)
- all
3 = member (patient)
- start + print
*/
?>
	<?php if($this->Session->read('Auth.User.group_id') != 1 && $this->Session->read('Auth.User.group_id') != 4 && $this->Session->read('Auth.User.group_id') != 5) { ?>
		<a href="/questions/nutrient_check" id="startNutricheck" class="dashbutton-big dashred">
			<div><img src="/img/button_icon_start.png" /></div>
			<span>START NUTRICHECK</span>
		</a>
		
		<?php if($this->Session->read('Auth.User.group_id') != 3) { ?>
			<a href="" id="sendNutricheckButton" class="dashbutton-small dashgreen">
			<div><img src="/img/button_icon_send.png" /></div>
			<span>SEND NUTRICHECK</span>
			</a>
		<?php } ?>
		
		<a target="_blank" id="printNutricheck" href="/questions/print_question_list<?php if($this->Session->read('Auth.User.group_id') == 3) {  echo "?hash_value=".$this->Session->read('Auth.User.hash_value'); } ?>" class="dashbutton-small dashgreen">
			<div><img src="/img/button_icon_print.png" /></div>
			<span>PRINT NUTRICHECK</span>
		</a>
		
		<?php if($this->Session->read('Auth.User.group_id') != 3) { ?>
			<a id="quickEntry" class="fancybox fancybox.iframe dashbutton dashbutton-small dashgreen dashbutton4 iframefancybox" data-width="450" data-height="590" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe">
				<div><img src="/img/button_icon_quick.png" /></div>
				<span>QUICK ENTRY</span>
			</a>
			
			<a href="#" id="reportsNutricheck" class="dashbutton dashbutton-small dashgreen">
				<div><img src="/img/button_icon_report.png" /></div>
				<span>REPORTS</span>
			</a>
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