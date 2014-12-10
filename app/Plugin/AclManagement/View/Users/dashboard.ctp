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
<div style="position:relative;float:left;width:100%;margin:0 0 30px 0;padding:0;background:white;" class="round5">
<div style="position:relative;padding:30px;">
	<?php if($this->Session->read('Auth.User.group_id') == 2) { ?>
		<div style="min-height: 374px; margin:0 3% 40px 0;" class="dashboardbox video">
			<form method="POST" style="margin: 0;" id="linkSending">			
				<div class="left span12" style="padding: 20px 20px 20px 20px;">
					<h1 style="color: #64584c;margin:0;padding:0;font-weight:normal;">Welcome!</h1>
					<h4 style="color: #c6bdb4;margin:0;padding:0 0 10px 0;font-weight:normal;border-bottom:1px solid #00b97b;">Let's get started and on our way to better health.</h4>
					
					<div class="left span6 moduleSearchHolder" style="margin-top:40px;">
						<h4 style="color: #64584c;">Who are we checking today?</h4>						
						<div class="moduleInputs">
							<div class="left full moduleInputHolder">								
								<?php echo $this->Form->input('User.id', array('style' => "width: 70%; float: left;", 'options' => $user_list, 'empty' => 'Select Patient', 'selected' => $behalfUserId, 'label' => false, 'div' => false, 'class' => 'chosen-select')); ?>
							</div>							
							<div class="left full moduleInputHolder">
								<?php echo $this->Form->input('Factor.id', array('style' => "width: 70%; float: left;", 'multiple' => true,  'options' => $factor_list, 'label' => false, 'div' => false, 'class' => 'chosen-select')); ?>
							</div>
						</div>						
						<div id="controlsHolder">
							<input type="hidden" id="selectedUser" value="<?php echo $behalfUserId; ?>">
							<input type="hidden" id="selectedFactor">
						</div>
					</div>
					<div class="linewithor left span1">
						<div>or</div>
					</div>
					<div class="left span5" style="padding: 73px 30px 30px 30px;">
						<a href="/admin/users/add" class="dashbutton-big dashgreen">
						<div><img src="/img/button_icon_user.png" /></div>
						<span>NEW CUSTOMER</span>
						</a>
					</div>
					
				</div>
			</form>
		</div>
	<?php } else { ?>
		<div style="min-height: 374px; width: 70%;margin:0 3% 40px 0;" class="dashboardbox video">
<iframe width="700" height="420" src="//www.youtube.com/embed/BjwVkqrQTqs?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
	<?php } ?>
	
	<?php echo $this->element('module_panel'); ?>
	</div>
</div>
	<?php
		$iconstyle = ''; //''"margin:10px auto 10px auto;max-width:175px;";
	?>
	<div style="position:relative;float:left;width:100%;margin:0;padding:0;">
	
	<div style="min-height: 374px; width: 20%;margin:0 3.33% 40px 0;" class="dashboardboxsmall mason">
		<p style="text-align:center;" class="iconholder"><img src="/img/answer.png" style="<?php echo $iconstyle; ?>"></p>
		<div class="textBelowsmall">What is nutricheck</div>				
		<div class="textBelowcontent">
<p>NutriCheck is an online program designed to assist healthcare practitioners assess their patient’s internal metabolic and nutritional health, improve patient health outcomes and build healthier communities.</p>
			<p>NutriCheck performs a detailed analysis of patient symptoms that reflect common metabolic and nutrient dysfunctions that promote chronic illness.</p>
			<p>NutriCheck correlates defined indicators of nutrient disturbance with clinical symptomatology, to provide the practitioner with a wide-ranging assessment of what is wrong and what nutrients are required to help fix the patient’s health problems.</p>
</div>
	</div>
	
	<div style="min-height: 374px; width:20%;margin:0 3.33% 40px 0;" class="dashboardboxsmall mason">
		<p style="text-align:center;" class="iconholder"><img src="/img/tick.png" style="<?php echo $iconstyle; ?>"></p>
		<div class="textBelowsmall">Benefits</div>				
		<div class="textBelowcontent">
			
			<p>NutriCheck assists you to more meaningfully assess and manage your patient’s nutritional health status.</p>
			
			<ul>
				<li>Discuss and explore the dietary and nutrient needs that are specific to them, to build optimal health.</li>
				<li>monitor their progress back to health on a regular basis</li>
				<li>Develop progressive relationships with your patients about their health status</li>
				<li>Enhance your health care practice revenue stream.</li>
			</ul>
		</div>
	</div>
	
	<div style="min-height: 374px; width: 20%;margin:0 3.33% 40px 0;" class="dashboardboxsmall mason">
		<p style="text-align:center;" class="iconholder"><img src="/img/medicine2.png" style="<?php echo $iconstyle; ?>"></p>
		<div class="textBelowsmall">HELP & FAQ</div>				
		<div class="textBelowcontent">				
		Need help, or need to talk to us about something?<br><br>
		Please check out the FAQ or contact the NutriCheck team on<br>Tel: 617 3279 8137<br>or<br>Email: <a href="mailto:info@nutricheck.com.au">info@nutricheck.com.au</a>, and we will do our best to help you! 
		</div>
	</div>

	<?php if($this->Session->read('Auth.User.group_id') == 2) { ?>
	<div style="min-height: 374px; width: 25%;margin:0 3.33% 40px 0;" class="dashboardboxsmall mason">
		<p style="text-align:center;" class="iconholder"><img src="/img/training.png" style="<?php echo $iconstyle; ?>"></p>
		<div class="textBelowsmall">Tutorial Videos</div>				
		<div class="textBelowcontent">		
		<p>		
			<ul>
				<li><a href="https://vimeo.com/107670858" target="_blank">Completing a quick entry</a></li>
				<li><a href="https://vimeo.com/107668581" target="_blank">Viewing reports</a></li>
				<li><a href="https://vimeo.com/107668576" target="_blank">Adding a member and completing a NutriCheck.</a></li>
			</ul>
		</p>
		</div>
	</div>
	<?php } else if($this->Session->read('Auth.User.group_id') == 1) { ?>
	<div style="min-height: 374px; width: 25%;margin:0 3.33% 40px 0;" class="dashboardboxsmall mason">
		<p style="text-align:center;" class="iconholder"><img src="/img/training.png" style="<?php echo $iconstyle; ?>"></p>
		<div class="textBelowsmall">Tutorial Videos</div>				
		<div class="textBelowcontent">		
		<p>		
			<ul>
				<li><a href="https://vimeo.com/107668582" target="_blank">Admin adding a pharmacy</a></li>
			</ul>
		</p>
		</div>
	</div>
	<?php } else { ?>
	<div style="min-height: 0; width: 30%;margin:0 0 40px 0;" class="dashboardbox mason">
			<img src="../../img/happypeople.jpg" class="round5" style="width:100%;height:100%;">
	</div>
	<?php } ?>
	</div>
	
</div>

<div class="hidden">
	<a class="fancybox" href="#aboutNutricheck">Go</a>
	<div id="aboutNutricheck" style="width: 500px;">
		Nutricheck is a Copyright program owned by Nimrose Pty Ltd (Inc in Qld) ACN: 10952271, trading as Nutricheck, 961 Blunder Road, Doolandella, Q. 4077 Ph: (07)3879 6555. No part of this program may be used without prior license agreement.
	</div>
	<div id="faqNutricheck" style="width: 700px;">
<h2>NutriCheck FAQ</h2>

<div class="textBelowsmall">What is NutriCheck?</div>
<p>
	NutriCheck is a support tool designed to help practitioners and pharmacists understand their patients’ probable nutrient status and common metabolic disturbances that affect health. 
</p>
<div class="textBelowsmall">What do the results tell you?</div>
<p>
The results will provide you with your patient’s probable nutrient needs, what they’re getting enough of, and what they’re missing out on. This information can help you make better decisions about their diet and nutritional supplement purchases.
</p>

<div class="textBelowsmall">Can a patient complete NutriCheck without a Pharmacist or Doctor?</div>
<p>
	No. NutriCheck recommends patients seek the advice of a Pharmacist, Doctor or healthcare practitioner. We know that these professionals can provide patients with more information about the importance of nutrition, a good diet and nutritional supplements, if required. 
</p>

<div class="textBelowsmall">Can I charge patients to complete NutriCheck?</div>
<p>
Yes you can. Good nutrition is a key to good health and nutrition is an issue that affects every patient. NutriCheck can provide your practice with an additional revenue stream for the Nutrition consultations you provide. 
</p>

<div class="textBelowsmall">Who invented NutriCheck?</div>
<p>
	NutriCheck was invented by Dr. Melvyn A Sydney-Smith KGSJ.  MBBS. PhD. MHMS(prov). Grad Dip Clin Nutrit. Mast Pract NLP. Grad Dip Gestalt Ther. Grad Cert Hypnosis. FACNEM.
</p>

<p>
	In addition to patient care in private practice, Mel is a respected Medical Educator, being extensively involved for thirty years in both Undergraduate and Postgraduate Medical Nutrition Education in Australia, China and Asia. He was a Visiting Professor at the Open International University for Complementary Medicine and, in 1992, was inducted into the Knights of Malta (Asia) for his contribution to Graduate Medical Education in China and Asia. 
</p>

<p>
	Mel is an Adjunct Associate Professor (Nutrition Medicine) at Southern Cross University (NSW) and was Adjunct Professor (Nutrition Medicine) at RMIT University (Melbourne), where he authored, coordinated and taught the Master of Nutrition Medicine degree program. 
Mel continues to write for and present at national and international medical seminars, whilst continuing in clinical practice in Doolandella, Brisbane.
</p>

<div class="textBelowsmall">How do I find out more?</div>
<p>
Talk to us on the NutriCheck website.
</p>
<p>URL: www.nutricheck.com.au</p>
<p>Email: info@nutricheck.com.au</p>
<p>Tel: 617 3279 8137</p>
	</div>

</div>

<script>
	$(document).ready(function() {
		
		<?php if(!empty($behalfUserId)) { ?>
			$('#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/?hash_value=<?php echo $behalfUserId; ?>");
			$('#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?hash_value=<?php echo $behalfUserId; ?>");
			$('#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?hash_value=<?php echo $behalfUserId; ?>");
			$('#reportsNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/nutricheck_activity/?hash_value=<?php echo $behalfUserId; ?>");
		<?php } ?>
		
		$(".moduleInputHolder .chosen-select").chosen().change( function () {
			var id = $(this).attr('id');
			var chosen_value = $(this).chosen().val();
			var user_hash = $('#selectedUser').val();

			
			if(id == "FactorId") {
				selected_values = chosen_value;
				$('#selectedFactor').val(selected_values);
				var selected_factor = $('#selectedFactor').val();
				
				if(selected_factor != "") {
					if(user_hash != "") {
						$('a#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors?hash_value="+user_hash+"&factors="+selected_values);
						$('a#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?hash_value="+user_hash+"&factors="+selected_values);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?hash_value="+user_hash+"&factors="+selected_values);
					} else {
						$('a#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors?factors="+selected_values);
						$('a#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?factors="+selected_values);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?factors="+selected_values);
					}
				} else {
					if(user_hash != "") {
						$('a#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/?hash_value="+user_hash);
						$('a#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?hash_value="+user_hash);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?hash_value="+user_hash);
					} else {
						$('a#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check");
						$('a#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list");
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe");
					}
				}
			}
			
			if(id == "UserId") {
				var selected_factors = $('#selectedFactor').val();
				$('#selectedUser').val(chosen_value);
				
				if(chosen_value != "") {
					$('#reportsNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/nutricheck_activity/?hash_value="+chosen_value);
					
					if(selected_factors == "") {
						$('a#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/?hash_value="+chosen_value);
						$('a#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?hash_value="+chosen_value);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?hash_value="+chosen_value);
					} else {
						$('a#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors?hash_value="+chosen_value+"&factors="+selected_factors);
						$('a#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?hash_value="+chosen_value+"&factors="+selected_factors);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?hash_value="+chosen_value+"&factors="+selected_factors);
					}
				} else {
					$('#reportsNutricheck').attr("href", "");
					
					if(selected_factors == "") {
						$('a#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/");
						$('a#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list");
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe");
					} else {
						$('a#startNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/nutrient_check/factors?factors="+selected_factors);
						$('a#printNutricheck').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/print_question_list?factors="+selected_factors);
						$('a#quickEntry').attr("href", "http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe?factors="+selected_factors);
					}
				}
			}
		});
	});
</script>