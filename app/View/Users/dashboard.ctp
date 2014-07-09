<div id="contentWrapper">
		<div class="sectionTitle">Dashboard</div>
		
		<div id="mainContentWrapper">
			
			
			<div style="height: 374px; width: 327px;" class="item green">
				<a class="dashboardLink" href="/questions/nutrient_check"><img src="../img/tick.png"></a>
				<div class="textBelow">Start Questionaire</div>
			</div>
			
			<?php if($this->Session->read('Auth.User.group_id') == 1 || $this->Session->read('Auth.User.group_id') == 2) { ?>
				<div style="height: 455px; width: 706px;" class="item">
					
					<br /><div class="widget sectionTitle">At A Glance</div><br />
					
					<h1 class="sectionHeader">Users in system <strong><?php echo count($users_list); ?></strong></h1>
					
					<div class="biColumn_Container">
						<div class="half">
							
							<?php
								$gender_total = $genders['males'] + $genders['females'];
								
								if($gender_total > 0) {
									$male_percentage = ($genders['males'] / $gender_total) * 100;
									$female_percentage =  ($genders['females'] / $gender_total) * 100;
								} else {
									$male_percentage = 0;
									$female_percentage =  0;
								}
							?>
							
							<canvas id="canvas" height="200" width="200"></canvas>
							
							<div style="text-shadow: 1px 1px 1px #000; color: #fff; position: absolute; font-weight: bold; font-size: 15px; top: 0; left: 0; margin-left: 100px; margin-top: 90px;" class="graphLabel">Male<br>(<?php echo round($male_percentage); ?>%)</div>
							<div style="text-shadow: 1px 1px 1px #000;  color: #fff; position: absolute; font-weight: bold; font-size: 15px; top: 0; left: 0; margin-left: 190px; margin-top: 90px;" class="graphLabel">Female<br>(<?php echo round($female_percentage); ?>%)</div>
							
							<h2>User Gender</h2>
						</div>
						
						<div class="half">
							<div id="barGraph_Holder">
								
								<ul class="barGraph">
									
									<?php 
										$color_identifier = 0;
										$color_class = "";
										$limit = 10;
										$current_count = 0;									
										$value_displacement = 0;
										
										foreach($factor_per_percentage as $factor_key => $top_factors) {
											
											if($value_displacement == 0) {
												$value_displacement = (100 - $top_factors);
											}
											
											if($current_count < $limit) {
												
												switch($color_identifier) {
													case 0:
													$color_class = "greenFill";
													break;
													
													case 1:
													$color_class = "blueFill";
													break;
													
													case 2:
													$color_class = "orangeFill";
													break;
													
													case 3:
													$color_class = "greyFill";
													break;
												}
												
												?>
													<li>
														<div title="<?php echo $factors_list[$factor_key]; ?> (<?php echo round($top_factors); ?>%)" style="cursor: pointer; height: <?php echo round(($top_factors + $value_displacement)); ?>%;"  class="<?php echo $color_identifier; ?> graphItem <?php echo $color_class; ?>"></div>
														<div class="percentageCount"><?php echo $factors_list[$factor_key]; ?> (<?php echo round($top_factors); ?>%)</div>
													</li>
												<?php
												
												$color_identifier++;
												$current_count++;
												if($color_identifier >= 3) {
													$color_identifier = 0;
												}
											}
										}
									?>
									
								</ul>
							</div>
							
							<h2>Common Ailments</h2>
						</div>
					</div>
				</div>
			<?php } ?>
			
			<?php if($this->Session->read('Auth.User.group_id') == 1 || $this->Session->read('Auth.User.group_id') == 2) { ?>
				<div style="height: 374px; width: 327px;" class="item">
					<a class="dashboardLink" href="/users/dashboard"><img src="../img/pen.png"></a>
					<div class="blue textBelow">Create / Edit Widget</div>
				</div>
			<?php } ?>
			
			<div style="height: 293px; width: 228px;" class="item">
				<div class="topYellowOccupier">
					How <span>Nutricheck</span> Works
				</div>
				
				<div class="content">Still unsure of how to best utilize the nutricheck app?<br />Look no further...</div>
				<img id="ligthtIco" src="../img/light-ico.png">
			</div>
			
			<div style="height: 293px; width: 445px;" class="item">
				<video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"
					  controls preload="auto" width="100%" height="100%" poster="http://video-js.zencoder.com/oceans-clip.png" data-setup='{"example_option":true}'>
						 <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
						 <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
						 <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
					</video>
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
		
		<?php if($this->Session->read('Auth.User.group_id') == 1 || $this->Session->read('Auth.User.group_id') == 2) { ?>
			var pieData = [
				{ value : <?php echo $female_percentage; ?>, color : "#d9d9d9" },
				{ value: <?php echo $male_percentage; ?>, color:"#7bac00" }
			];
			
			var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
		<?php } ?>
	});
</script>