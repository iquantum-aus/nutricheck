<style>
	.sb-submenu {
		position: absolute;
		width: 200px;
		border-radius: 5px;
		background-color: #f3f3f3;
		box-shadow: 0px 1px 5px #999;
		margin-top: 20px;
	}
	
	.sb-submenu li {
		float: left;
		width: 100%;
		margin: 0;
	}
	
	.sb-submenu li a {
		float: left;
		width: 100%;
		padding: 5px;
	}
	
	.sb-submenu li a:hover {
		background: #eee;
	}
</style>

<?php $group_id = $this->Session->read('Auth.User.group_id'); ?>

<?php
	$current_plugin = $this->params['plugin'];
	$current_page = $this->params['action'];
?>

<?php 
	/* --------------------------------- PULLING AND GENERATING OF VIEW AS SELECTION ------------------------------------ */
	
		$view_selections = $this->requestAction('users/get_view_selection/');
		$user_view_id = $this->Session->read('User.user_view_id');
		
		$view_selection_list = array();
		$increment = 0;
		foreach($view_selections as $group_key => $view_selection) {	
			
			$suffix = "";
			switch($group_key) {
				
				case 'group_affiliations':
					$suffix = "Group Affiliation";
					break;
				
				case 'client_groups':
					$suffix = "Client Group";
					break;
				
				case 'clients':
					$suffix = "Client";
					break;
				
			}
			
			foreach($view_selection as $user_key => $user_entry) {
				
				if(!empty($user_entry['UserProfile']['first_name']) || !empty($user_entry['UserProfile']['last_name']) || !empty($user_entry['User']['email'])) {
				
					if(!empty($user_entry['UserProfile']['first_name']) && !empty($user_entry['UserProfile']['last_name'])) {
						$view_selection_list[$user_entry['User']['id']] = $user_entry['UserProfile']['first_name']." ".$user_entry['UserProfile']['last_name']." - ".$suffix;
					} else {
						$view_selection_list[$user_entry['User']['id']] = $user_entry['User']['email']." - ".$suffix;
					}
					
					$increment++;
				}
			}
		}
		
	/* --------------------------------- PULLING AND GENERATING OF VIEW AS SELECTION ------------------------------------ */
?>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			
			<div id="headerScript">
				<a href="/users/dashboard"><img src="/img/nutricheck-logo.png" style="max-height:80px;"></a>
			</div>
			
			<button type="button" style="position: relative;" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span>MENU</span>
				<div style="float:right;max-width:40px;margin-top:3px;">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</div>
			</button>
			
			<?php
				$user_info = $this->Session->read('Auth');
				
				$first_name = $user_info['User']['UserProfile']['first_name'];
				$last_name = $user_info['User']['UserProfile']['last_name'];
				$email = $user_info['User']['email'];
				
				$strip_name = "";
				if(empty($first_name) || empty($last_name)) {
					$strip_name = $email;
				} else {
					$strip_name = $first_name." ".$last_name;
				}
			?>
			
			<div class="nav-collapse collapse">

				<?php
				/*
					NOTE
					All li items must be float right
				*/
				?>
				
				<ul class="nav small">
					<li class="menu"><?php echo $this->Html->link('Logout', '/users/logout');?></li>
					<li class="menu"><?php echo $this->Html->link('Contact', '#');?></li>
					<li class="menu"><a href="#faqContent" class="fancybox">FAQ</a></li>
					<li class="menu bolda special" style="color:black;padding: 10px 15px 10px;">Welcome <?php echo $this->Html->link($strip_name, '/users/edit_profile');?></li>
					<li class="menu">
						<span style="color:#777; margin-top: 14px; float:left; font-weight: bold;">View As:</span>&nbsp;
						
						<form method="POST" action="/users/dashboard" id="SelectViewAs">
							<?php echo $this->Form->input('User.user_view', array('empty' => 'Select User', 'style' => 'margin-top: 8px;', 'selected' => $user_view_id, 'options' => $view_selection_list, 'label' => false, 'div' => false)); ?>
							<a href="../users/reset_view_as" class="btn btn-danger right">RESET</a>
						</form>
					</li>
				</ul>
				
				<ul class="nav secondary-nav big">
					<li class="menu special">
						<a href="javascript:void(0);" onclick="ZoomPage('up');" title="Adjust fonts smaller" class="fontchangesmall">T-</a>
						<a href="javascript:void(0);" onclick="ZoomPage('down');" title="Adjust fonts bigger" class="fontchangebig">T+</a>
					</li>
					<li class="menu"><a class="fancybox" href="#nutricheckProfile"><img src="/img/topmenu_about.jpg" />About</a></li>					
					
					<?php if($group_id == 2) { ?>
						<li class="menu">
							<a class="sb-toggle-submenu"><img src="/img/topmenu_widgets.jpg" />Widgets<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/qgroups">List Widgets</a></li>
								<li><a href="/qgroups/add">Create Widgets</a></li>
							</ul>
						</li>
					<?php } ?>					
					
					<?php if($group_id == 1) { ?>
						<li class="menu">
							<a class="sb-toggle-submenu"><img src="/img/topmenu_nutriguide.jpg" />Nutritional Guides<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/nutritional_guides">List Nutritional Guides</a></li>
								<li><a href="/nutritional_guides/add">Create Nutritional Guide</a></li>
							</ul>
						</li>
					<?php } ?>
					
					<?php if($group_id != 3) { ?>
						<li class="menu">
							<a class="sb-toggle-submenu"><img src="/img/topmenu_users.jpg" />Users<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/admin/users">List Users</a></li>
								
								<?php if($group_id != 3) { ?>
									
									<li><a href="/admin/users/add">New Users</a></li>
									
									<?php if($group_id == 1) { ?>
										<li><a href="/admin/user_permissions">User Permissions</a></li>
									<?php } ?>
								<?php } ?>
							</ul>
						</li>
					<?php } ?>
					
					<?php if($group_id == 3) { ?>
						<li class="menu"><?php echo $this->Html->link('NutriCheck', '/questions/nutrient_check');?></li>
					<?php } else if($group_id == 2) { ?>
						<li class="menu">
							<a class="sb-toggle-submenu"><img src="/img/topmenu_questions.jpg" />Questions<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/questions/nutrient_check">NutriCheck</a></li>
								<li><a href="/questions/nutrient_check/factors">Question by Disturbance</a></li>
							</ul>
						</li>
					<?php } ?>
					
					<?php if($group_id == 1) { ?>
					
						<li class="menu">
							<a class="sb-toggle-submenu"><img src="/img/topmenu_questions.jpg" />Questions<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/questions">List Questions</a></li>
								<li><a href="/questions/add">New Question</a></li>
								<li><a href="/FactorsQuestions">Associate Questions</a></li>
							</ul>
						</li>
					
						<li class="menu">
							<a class="sb-toggle-submenu">Settings<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/factors">Factors</a></li>
								<li><a href="/factor_types">Factor Types</a></li>
								<li><a href="/prescriptions">Prescriptions</a></li>
							</ul>
						</li>
						
						<li class="menu">
							<a class="sb-toggle-submenu" href="/videos">Videos</a>
						</li>
					<?php } ?>
					
					<?php if($user_info['User']['group_id'] == 2) { ?>						
						<li class="menu"><a id="quickEntry" class="fancybox fancybox.iframe iframefancybox" data-width="450" data-height="590" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/questions/quickentry_iframe"><img src="/img/topmenu_quick.jpg" />Quick Entry</a></li>
						<li><a target="_blank" href="/questions/print_question_list"><img src="/img/topmenu_print.jpg" />Print Question List</a></li>
					<?php } ?>			
					
					<li class="menu">
						<a href="/users/dashboard/"><img src="/img/topmenu_dashboard.jpg" />Dashboard</a>					
					</li>
				</ul>

				<ul class="nav">
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>

<div class="hidden">
	<div id="faqContent" style="width: 800px;">
		
		<h2>NutriCheck FAQ</h4>

		<p>
			<h4>What is NutriCheck?</h4>
			NutriCheck is a support tool designed to help practitioners and pharmacists understand their patients’ probable nutrient status and common metabolic disturbances that affect health. 
		</p>

		<p>
			<h4>What do the results tell you?</h4>
			The results will provide you with your patient’s probable nutrient needs, what they’re getting enough of, and what they’re missing out on. This information can help you make better decisions about their diet and nutritional supplement purchases.
		</p>

		<p>
			<h4>Can a patient complete NutriCheck without a Pharmacist or Doctor?</h4>
			No. NutriCheck recommends patients seek the advice of a Pharmacist, Doctor or healthcare practitioner. We know that these professionals can provide patients with more information about the importance of nutrition, a good diet and nutritional supplements, if required. 
		</p>

		<p>
			<h4>Can I charge patients to complete NutriCheck?</h4>
			Yes you can. Good nutrition is a key to good health and nutrition is an issue that affects every patient. NutriCheck can provide your practice with an additional revenue stream for the Nutrition consultations you provide. 
		</p>

		<p>
			<h4>Who invented NutriCheck?</h4>
			<strong>NutriCheck was invented by Dr. Melvyn A Sydney-Smith KGSJ.</strong><br />
			<p>MBBS. PhD. MHMS(prov). Grad Dip Clin Nutrit. Mast Pract NLP. Grad Dip Gestalt Ther. Grad Cert Hypnosis. FACNEM.</p>
		</p>

		<p>
			In addition to patient care in private practice, Mel is a respected Medical Educator, being extensively involved for thirty years in both Undergraduate and Postgraduate Medical Nutrition Education in Australia, China and Asia. He was a Visiting Professor at the Open International University for Complementary Medicine and, in 1992, was inducted into the Knights of Malta (Asia) for his contribution to Graduate Medical Education in China and Asia. 
		</p>

		<p>Mel is an Adjunct Associate Professor (Nutrition Medicine) at Southern Cross University (NSW) and was Adjunct Professor (Nutrition Medicine) at RMIT University (Melbourne), where he authored, coordinated and taught the Master of Nutrition Medicine degree program.</p>
		<p>Mel continues to write for and present at national and international medical seminars, whilst continuing in clinical practice in Doolandella, Brisbane.</p>

		<h4>How do I find out more?</h4>
		Talk to us on the NutriCheck website.

		<p>
			URL: www.nutricheck.com.au,<br />
			Email: info@nutricheck.com.au,<br />
			Tel: 617 3279 8137
		</p>
	</div>
</div>

<script>
	var curzoom = 1;
	function ZoomPage(upordown){
		if (curzoom>=1.2 && upordown=="down"){
			console.log("Zoom up not allowed");
		}
		else if (curzoom<=0.8 && upordown=="up"){
			console.log("Zoom down not allowed");
		}
		else{
			if (upordown=="up"){
				curzoom = (curzoom-0.1);
				console.log("Zoom up set to : " + curzoom);
				$('body').css({
					'zoom':curzoom,
					'-moz-transform':'scale('+curzoom+')'			
				});
				//zoom:1;-moz-transform:scale(1);
			}
			else{
				curzoom = (curzoom+0.1);
				console.log("Zoom down set to : " + curzoom);
				$('body').css({
					'zoom':curzoom,
					'-moz-transform':'scale('+curzoom+')'			
				});
			}
		}
		
	}
</script>

<div class="hidden">
	<div id="nutricheckProfile" style="width:600px;">
		<div class="left span12">	
			<div class="left span3">
				<div id="logoHolder">
					<a class="homeLink" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/dashboard">
						<img src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/img/nutricheck-logo.png" alt="Slidebars">
					</a>
				</div>
			</div>
			<div class="left span9" style="border-left: 1px solid #ddd;padding-left: 20px;">
				<h4>NutriCheck:</h4>
				<strong>Version: 1.0 September 2014 </strong>
				<br>
				<strong>Copyright: Nimrose Pty Ltd (Inc in Qld) ACN: 010952271 Ph: (07)3879 6555 Fax: (07)32789776</strong>
				<br>
				<br>
				<strong>This program is licensed to:</strong>
				<br>
				<span>This program is licensed to: 
					NutriCheck - 961 Blunder Road, Doolandella, Q. 4077 Ph: (07) 3279 8137 Fax: (07)32789776
					email: info@nutricheck.com.au
				</span>
				<br><br>
				<strong>Distributor</strong><br>
				<span>NutriCheck - 961 Blunder Road, Doolandella, Q. 4077 Ph: (07) 3279 8137 Fax: (07)32789776
				email: info@nutricheck.com.au
			</span>
			</div>
			<hr>
			<div class="left span12" style="border-top: 1px solid #ddd;">
				<h4>NutriCheck:</h4>
				<span>
					Nutricheck is protected by copyright law. Unauthorized reproduction or distribution of this program, or any portion of it, may result in a breach of this copyright which will be prosecuted to the maximum extent possible of the law.
				</span>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		SetMobileMenu();
		$(window).resize( function () {
			SetMobileMenu();
		});
		
		$('#UserUserView').change( function () {
			$('#SelectViewAs').submit();
		});
	});
	
	function SetMobileMenu(){
		var getw = $(window).width();
		console.log('getw : ' + getw);
		if (getw<995){		
			ul = $('.small'); // your parent ul element
			ul.children().each(function(i,li){ul.prepend(li)})
			ul = $('.big'); // your parent ul element
			ul.children().each(function(i,li){ul.prepend(li)})		
			ul = $('.nav-collapse'); // your parent ul element
			ul.children().each(function(i,li){ul.prepend(li)})
		}
	}
</script>