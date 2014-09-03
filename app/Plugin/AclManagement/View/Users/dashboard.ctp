<div id="contentWrapper">
		<div class="dashboardtopimg">
			<div class="sectionTitle">Dashboard</div>
			<img src="/img/dashboardtop.jpg" style="max-height:300px;">
		</div>
		
		
		<div id="mainContentWrapper" class="mainContentWrapper">
		
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
		
			<div style="min-height: 374px; width: 77%;margin:0 3% 40px 0;" class="dashboardbox">
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
		
			<div style="min-height: 374px; width: 20%;margin:0 0 40px 0;" class="dashboardbox noborder">
				<a href="#" class="dashbutton dashbutton1">START NUTRICHECK</a>
				<a href="#" class="dashbutton dashbutton2">SEND NUTRICHECK</a>
				<a href="#" class="dashbutton dashbutton3">PRINT NUTRICHECK</a>
				<a href="#" class="dashbutton dashbutton4">QUICK ENTRY</a>
				<a href="#" class="dashbutton dashbutton5">REPORTS</a>
			</div>
			
			
			<div style="height: 374px; width: 34%;margin:0 3% 40px 0;" class="dashboardbox">
				<div class="textBelowsmall">What is nutricheck</div>
				<div class="textBelowcontent">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. Aenean euismod bibendum laoreet. 
Proin gravida dolor sit lacus accumsan et justo commodo. Under 200 characters.</div>
			</div>
			
			<div style="height: 374px; width: 34%;margin:0 3% 40px 0;" class="dashboardbox">
				<div class="textBelowsmall">Benefits</div>
				<div class="textBelowcontent">
				<ul class="biglist">
					<li>Benefit</li>
					<li>Benefit</li>
					<li>Benefit</li>
					<li>Benefit</li>
					<li>3-4 points only</li>
				</ul>
				</div>
			</div>
			
			<div style="height: 374px; width: 26%;margin:0 0 40px 0;" class="dashboardbox">
				<img src="../img/happypeople.jpg" style="width:100%;height:100%;">
			</div>
			
			<div style="height: 374px; width: 327px;" class="dashboardbox">
				<div class="textBelowsmall">HELP & FAQ</div>
				<div class="textBelowcontent">				
				Need help, or need to talk to us about something?<br><br>
				Please check out the FAQ or contact the NutriCheck team on<br>
XX XXXX XXXX<br>or<br>emailaddress@email.com, and we will do our best to help you!
				</div>
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
		
		
	});
</script>