<?php if($this->Session->read('Auth.User.group_id') == 2) { ?>
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

		<div class="videoandbuttons">
		
		<div style="" class="dashboardbox noborder video">
			<form method="POST" style="margin: 0;" id="linkSending">			
				<div class="left span12" style="padding: 20px;">
					<h1>Welcome! Let's get started and on our way to better health.</h1>
					
					<div class="left span7 moduleSearchHolder">
						<h3>Who are we checking today?</h3>
						
						<div class="moduleInputs">
							<div class="left full moduleInputHolder">
								<?php echo $this->Form->input('User.id', array('style' => "width: 70%; float: left;", 'options' => $user_list, 'empty' => 'Select Patient', 'label' => false, 'div' => false, 'class' => 'chosen-select')); ?>
							</div>
							
							<div class="left full moduleInputHolder">
								<?php echo $this->Form->input('Factor.id', array('style' => "width: 70%; float: left;", 'multiple' => true,  'options' => $factor_list, 'label' => false, 'div' => false, 'class' => 'chosen-select')); ?>
							</div>
						</div>
						
						<div id="controlsHolder">
							<input type="hidden" id="selectedUser">
							<input type="hidden" id="selectedFactor">
						</div>
					</div>
					
					<div class="left span5" style="padding: 30px;">
						<a href="/admin/users/add" id="startNutricheck" class="dashbutton-big dashgreen">
							<div><img src="/img/button_icon_user.png" /></div>
							<span>NEW COSTUMER</span>
						</a>
					</div>
				</div>
			</form>
		</div>
		
		<?php echo $this->element('module_panel'); ?>
		</div>
		<?php
			$iconstyle = ""; //"margin:10px auto 10px auto;max-width:175px;";
		?>
			
		<div style="width: 20%;margin:30px 3.33% 30px 0;" class="dashboardboxsmall mason">
			<p style="text-align:center;" class="iconholder"><img src="/img/answer.png" style="<?php echo $iconstyle; ?>"></p>
			<div class="textBelowsmall">What is nutricheck</div>				
			<div class="textBelowcontent">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit lacus accumsan et justo commodo. Under 200 characters.</div>
		</div>		
		<div style="width: 20%;margin:30px 3.33% 30px 0;" class="dashboardboxsmall mason">
			<p style="text-align:center;" class="iconholder"><img src="/img/tick.png" style="<?php echo $iconstyle; ?>"></p>
			<div class="textBelowsmall">Benefits</div>				
			<div class="textBelowcontent">
			<ul class="biglist">
				<li>Benefit</li>
				<li>Benefit</li>
				<li>3-4 points only</li>
			</ul>
			</div>
		</div>		
		<div style="width: 20%;margin:30px 3.33% 30px 0;" class="dashboardboxsmall mason">
			<p style="text-align:center;" class="iconholder"><img src="/img/training.png" style="<?php echo $iconstyle; ?>"></p>
			<div class="textBelowsmall">HELP & FAQ</div>				
			<div class="textBelowcontent">				
			Need help, or need to talk to us about something?<br><br>
			Please check out the FAQ or contact the NutriCheck team on XX XXXX XXXX or emailaddress@email.com, and we will do our best to help you!
			</div>
		</div>
		<div style="min-height: 0; width: 30%;margin:30px 0 30px 0;" class="dashboardboxsmall nobg mason">
			<img src="../img/happypeople.jpg" class="round5" style="">
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
		
		$(".moduleInputHolder .chosen-select").chosen().change( function () {
			var id = $(this).attr('id');
			var chosen_value = $(this).chosen().val();
			var user_hash = $('#selectedUser').val();
			
			$(".chosen-select").chosen().change( function () {
				var id = $(this).attr('id');
				var chosen_value = $(this).chosen().val();
				
				var user_hash = $('#selectedUser').val();
				
				if(id == "FactorId") {
					
					selected_values = chosen_value;
					$('#selectedFactor').val(selected_values);
					var selected_factor = $('#selectedFactor').val();
					
					if(selected_factor != "") {
<<<<<<< HEAD
						$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors?hash_value="+user_hash+"&factors="+selected_values);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?hash_value="+user_hash+"&factors="+selected_values);
					} else {
						$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/?hash_value="+user_hash);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?hash_value="+user_hash);
					}
				} else {
					$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check");
					$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe");
				}
				
			}
			
			if(id == "UserId") {
				var selected_factors = $('#selectedFactor').val();
				$('#selectedUser').val(chosen_value);
				
				if(chosen_value != "") {
					$('#reportsNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/nutricheck_activity/?hash_value="+chosen_value);
					$('#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?hash_value="+chosen_value);
					
					if(selected_factors == "") {
						$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check?hash_value="+chosen_value);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?hash_value="+chosen_value);
					} else {
						$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors?hash_value="+chosen_value+"&factors="+selected_factors);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe/factors?hash_value="+chosen_value+"&factors="+selected_factors);
					}
					
				} else {
					$('#reportsNutricheck').attr("href", "#");
					$('#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list");
					
					if(selected_factors == "") {
						$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check");
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe");
					} else {
						$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors");
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe");
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
<?php } else { ?>
			
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
			
				<div style="" class="dashboardbox video">
					<video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"
						  controls preload="auto"
						  width="100%"
						  height="100%" poster="http://video-js.zencoder.com/oceans-clip.png"
						  data-setup='{"example_option":true}'>
							 <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
							 <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
							 <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
						</video>
				</div>
			
				<?php echo $this->element('module_panel'); ?>
				
				<?php
					$iconstyle = "margin:10px auto 10px auto;max-width:175px;";
				?>
				<div style="width: 20%;margin:30px 3.33% 30px 0;" class="dashboardboxsmall mason">
			<p style="text-align:center;" class="iconholder"><img src="/img/answer.png" style="<?php echo $iconstyle; ?>"></p>
			<div class="textBelowsmall">What is nutricheck</div>				
			<div class="textBelowcontent">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit lacus accumsan et justo commodo. Under 200 characters.</div>
		</div>		
		<div style="width: 20%;margin:30px 3.33% 30px 0;" class="dashboardboxsmall mason">
			<p style="text-align:center;" class="iconholder"><img src="/img/tick.png" style="<?php echo $iconstyle; ?>"></p>
			<div class="textBelowsmall">Benefits</div>				
			<div class="textBelowcontent">
			<ul class="biglist">
				<li>Benefit</li>
				<li>Benefit</li>
				<li>3-4 points only</li>
			</ul>
			</div>
		</div>		
		<div style="width: 20%;margin:30px 3.33% 30px 0;" class="dashboardboxsmall mason">
			<p style="text-align:center;" class="iconholder"><img src="/img/training.png" style="<?php echo $iconstyle; ?>"></p>
			<div class="textBelowsmall">HELP & FAQ</div>				
			<div class="textBelowcontent">				
			Need help, or need to talk to us about something?<br><br>
			Please check out the FAQ or contact the NutriCheck team on XX XXXX XXXX or emailaddress@email.com, and we will do our best to help you!
			</div>
		</div>
		<div style="min-height: 0; width: 30%;margin:30px 0 30px 0;" class="dashboardboxsmall nobg mason">
			<img src="../img/happypeople.jpg" class="round5" style="">
		</div>
				
			</div>
	</div>

	<div class="hidden">
		<a class="fancybox" href="#aboutNutricheck">Go</a>
		<div id="aboutNutricheck" style="width: 500px;">
			Nutricheck is a Copyright program owned by Nimrose Pty Ltd (Inc in Qld) ACN: 10952271, trading as Nutricheck, 961 Blunder Road, Doolandella, Q. 4077 Ph: (07)3879 6555. No part of this program may be used without prior license agreement.
		</div>

	<script>
		$(document).ready(function() {
			/*$('#mainContentWrapper').masonry({
				//columnWidth: 200,
				itemSelector: '.mason'
			});*/
		});
	</script>
<?php } ?>
