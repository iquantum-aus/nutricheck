<div id="mainContentWrapper" class="mainContentWrapper left full">

<?php if(!empty($videos)) { ?>
		<?php foreach($videos as $video) { ?>
			<div style="height: 281px; width: 500px;" class="item">
				<?php
					$newWidth = "500";
					$newHeight = "281";
					$content = preg_replace(
					array('/width="\d+"/i', '/height="\d+"/i'),
					array(sprintf('width="%d"', $newWidth), sprintf('height="%d"', $newHeight)),
					$video['Video']['video_link']);							
					//echo $content;
				?>
			</div>
		<?php } ?>
	<?php } ?>

	<div style="min-height: 374px; width: 77%;margin:0 3% 40px 0;" class="dashboardbox video">
		<form method="POST" style="margin: 0;" id="linkSending">			
			<div class="left span12" style="padding: 20px;">
				<h1>Welcome! Let's get started and on our way to better health.</h1>
				
				<div class="left span7 moduleSearchHolder">
					<h3>Who are we checking today?</h3>
					
					<div class="moduleInputs">
						<div class="left full moduleInputHolder">
							<?php echo $this->Form->input('User.id', array('style' => "width: 70%; float: left;", 'options' => $email_list, 'empty' => 'Select Email', 'label' => false, 'div' => false, 'class' => 'chosen-select')); ?>
						</div>
						
						<div class="left full moduleInputHolder">
							<?php echo $this->Form->input('Factor.id', array('style' => "width: 70%; float: left;", 'multiple' => true,  'options' => $factor_list, 'label' => false, 'div' => false, 'class' => 'chosen-select')); ?>
						</div>
					</div>
					
					<div id="controlsHolder">
						<a style="display: none;" id="startNutricheck" href="#"><input type="button" value="Start Nutricheck" class="btn btn-success"></a>
						<a style="display: none;" id="userHistory" href="#"><input type="button" value="History" class="btn btn-warning"></a>
						
						<input type="hidden" id="selectedUser">
						<input type="hidden" id="selectedFactor">
					</div>
				</div>
				
				<div class="left span5" style="padding: 30px;">
					<a href="/admin/users/add"><input type="button" class="btn btn-primary" value="New Customer"></a>
				</div>
			</div>
		</form>
	</div>
	
	<?php echo $this->element('module_panel'); ?>
	
	<?php
		$iconstyle = "margin:10px auto 10px auto;max-width:175px;";
	?>
	
	
	<div style="min-height: 374px; width: 34%;margin:0 3% 40px 0;" class="dashboardbox mason">
		<p style="text-align:center;" class="iconholder gradientbg1"><img src="/img/answer.png" style="<?php echo $iconstyle; ?>"></p>
		<div class="textBelowsmall blue">What is nutricheck</div>				
		<div class="textBelowcontent">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit lacus accumsan et justo commodo. Under 200 characters.</div>
	</div>
	
	<div style="min-height: 374px; width: 34%;margin:0 3% 40px 0;" class="dashboardbox mason">
		<p style="text-align:center;" class="iconholder gradientbg1"><img src="/img/tick.png" style="<?php echo $iconstyle; ?>"></p>
		<div class="textBelowsmall green">Benefits</div>				
		<div class="textBelowcontent">
		<ul class="biglist">
			<li>Benefit</li>
			<li>Benefit</li>
			<li>3-4 points only</li>
		</ul>
		</div>
	</div>
	
	<div style="min-height: 0; width: 26%;margin:0 0 40px 0;" class="dashboardbox mason">
		<img src="../img/happypeople.jpg" style="width:100%;height:100%;">
	</div>
	
	<div style="min-height: 374px; width: 327px;" class="dashboardbox mason">
		<p style="text-align:center;" class="iconholder gradientbg1"><img src="/img/training.png" style="<?php echo $iconstyle; ?>"></p>
		<div class="textBelowsmall green">HELP & FAQ</div>				
		<div class="textBelowcontent">				
		Need help, or need to talk to us about something?<br><br>
		Please check out the FAQ or contact the NutriCheck team on<br>XX XXXX XXXX<br>or<br>emailaddress@email.com, and we will do our best to help you!
		</div>
	</div>		
	
</div>

<div class="hidden">
	<a class="fancybox" href="#aboutNutricheck">Go</a>
	<div id="aboutNutricheck" style="width: 500px;">
		Nutricheck is a Copyright program owned by Nimrose Pty Ltd (Inc in Qld) ACN: 10952271, trading as Nutricheck, 961 Blunder Road, Doolandella, Q. 4077 Ph: (07)3879 6555. No part of this program may be used without prior license agreement.
	</div>
</div>

<script>
	$(document).ready(function() {
		
		$(".chosen-select").chosen().change( function () {
			var id = $(this).attr('id');
			var chosen_value = $(this).chosen().val();
			
			var user_hash = $('#selectedUser').val();
			
			if(id == "FactorId") {
				
				selected_values = chosen_value;
				$('#selectedFactor').val(selected_values);
				var selected_factor = $('#selectedFactor').val();
				
				if(selected_factor != "") {
					$('#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?factors="+selected_factor);
				}
				
				if(user_hash != "") {
					if(selected_factor != "") {
						$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors?hash_value="+user_hash+"&factors="+selected_values);
					} else {
						$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/?hash_value="+user_hash);
					}
					
					$('#startNutricheck').fadeIn();
				} else {
					$('#startNutricheck').fadeOut();
				}
				
			}
			
			if(id == "UserId") {
				var selected_factors = $('#selectedFactor').val();
				
				$('#userHistory').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/nutricheck_activity/?hash_value="+chosen_value);
				
				if(selected_factors == "") {
					$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check?hash_value="+chosen_value);
				} else {
					$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors?hash_value="+chosen_value+"&factors="+selected_factors);
				}
				
				$('#selectedUser').val(chosen_value);
				if(chosen_value != "") {
					$('#userHistory').fadeIn();
					$('#startNutricheck').fadeIn();
				} else {
					$('#userHistory').fadeOut();
					$('#startNutricheck').fadeOut();
				}
			}
		});
		
		
		$(document).on("click", '#selectionVerify', function () {
			// var formData = $('#linkSending').serialize();
			
			var user_id = $('#UserId_chosen .result-selected').html();
			// var user_id = $('#UserId').html();
			
			// $(".chosen-select").chosen().change( function () {
				// alert('test');
			// });
			
			// var factors_id = "";
			// $('#FactorId_chosen .chosen-choices .search-choice').each( function () {
				// var factor_selected_id = $(this).children('a').attr('data-option-array-index');
				
				// if(factors_id == "") {
					// factors_id += factor_selected_id;
				// } else {
					// factors_id += "-"+factor_selected_id;
				// }
			// });
			
			alert(user_id);
			// alert(factors_id);
			
			/* $.ajax({
				async:true,
				data:formData,
				dataType:'html',
				success:function (data, textStatus) {
					var parameters = data.split('explode');
				},
				type:'post',
				url:"http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/question_link_generator"
			}); */
		});
	});
</script>