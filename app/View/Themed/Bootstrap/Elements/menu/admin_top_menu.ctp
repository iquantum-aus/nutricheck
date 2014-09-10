<?php $group_id = $this->Session->read('Auth.User.group_id'); ?>

<?php
	$current_plugin = $this->params['plugin'];
	$current_page = $this->params['action'];
?>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			
			<div id="headerScript">
				<!--Welcome <strong><?php //echo $strip_name; ?></strong>-->
				<a href="/users/dashboard"><img src="/img/nutricheck-logo.png" style="max-height:80px;"></a>
			</div>
			
			<button type="button" style="position: relative;" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<!--<span style="color:black;position:absolute;left:-50px;top:4px;">MENU</span>-->
				<span>MENU</span>
				<div style="float:right;max-width:40px;margin-top:3px;">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</div>
			</button>			
			
			<!--<div class="sb-toggle-left navbar-left">
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
			</div>-->
			
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
					<li class="menu"><?php echo $this->Html->link('FAQ', '#');?></li>
					<li class="menu bolda special" style="color:black;padding: 10px 15px 10px;">Welcome <?php echo $this->Html->link($strip_name, '/users/edit_profile');?></li>
				</ul>
				
				<ul class="nav secondary-nav big">
					<li class="menu special">
						<a href="javascript:void(0);" onclick="ZoomPage('up');" title="Adjust fonts smaller" class="fontchangesmall">T-</a>
						<a href="javascript:void(0);" onclick="ZoomPage('down');" title="Adjust fonts bigger" class="fontchangebig">T+</a>
					</li>
					<li class="menu"><a class="fancybox" href="#nutricheckProfile">About</a></li>					
					
					<?php if($group_id == 2) { ?>
						<li class="menu">
							<a class="sb-toggle-submenu">Widgets<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/qgroups">List Widgets</a></li>
								<li><a href="/qgroups/add">Create Widgets</a></li>
							</ul>
						</li>
					<?php } ?>					
					
					<?php if($group_id != 3) { ?>
						<li class="menu">
							<a class="sb-toggle-submenu">Nutritional Guides<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/nutritional_guides">List Nutritional Guides</a></li>
								<li><a href="/nutritional_guides/add">Create Nutritional Guide</a></li>
							</ul>
						</li>
					<?php } ?>
					
					<?php if($group_id != 3) { ?>
						<li class="menu">
							<a class="sb-toggle-submenu">Users<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/admin/users">List Users</a></li>
								
								<?php if($group_id == 1) { ?>
									<li><a href="/admin/users/add">New Users</a></li>
									<li><a href="/admin/user_permissions">User Permissions</a></li>
								<?php } ?>
							</ul>
						</li>
					<?php } ?>
					
					<?php if($group_id == 3) { ?>
						<li class="menu"><?php echo $this->Html->link('NutriCheck', '/questions/nutrient_check');?></li>
					<?php } else if($group_id == 2) { ?>
						<li class="menu">
							<a class="sb-toggle-submenu">Questions<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/questions/nutrient_check">Nutrient Check</a></li>
								<li><a href="/questions/nutrient_check/factors">Question by Disturbance</a></li>
							</ul>
						</li>
					<?php } ?>
					
					<?php if($group_id == 1) { ?>
					
						<li class="menu">
							<a class="sb-toggle-submenu">Questions<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/questions">List Questions</a></li>
								<li><a href="/questions/add">New Question</a></li>
								<li><a href="/FactorsQuestions">Associate Questions</a></li>
								<!-- <li><a href="/questions/nutrient_check">Nutrient Check</a></li> -->
								<li><a href="/questions/nutrient_check/factors">Question by Disturbance</a></li>
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
							<a class="sb-toggle-submenu">Videos<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
							<ul class="sb-submenu">
								<li><a href="/videos">List Videos</a></li>
								<li><a href="/videos/add">Create Videos</a></li>
							</ul>
						</li>
					<?php } ?>
					
					<?php if($user_info['User']['group_id'] == 2) { ?>						
						<li class="menu"><a class="fancybox" href="#quickEntry">Quick Entry</a></li>
						<li><a target="_blank" href="/questions/print_question_list">Print Question List</a></li>
					<?php } ?>			
					
					<li class="menu"><?php echo $this->Html->link('Dashboard', '/users/dashboard');?></li>
				</ul>

				<ul class="nav">
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>

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
				<h3>NutriCheck:</h3>
				<strong>Version: 6.0 January, 1999</strong>
				<br>
				<strong>Copyright: Nimrose Pty Ltd(Inc in Qld) ACN: 010952271 trading as Nutricheck - 961 Blunder Road, Doolandella, Q. 4077 Ph: (07)3879 6555</strong>
				<br>
				<br>
				<strong>This program is licensed to:</strong>
				<br>
				<span>Unlicensed Copy - Contact The Holistic Medical Centre<br>211 Given Tce, Paddington Q4064 Tel:(07)33696555 Fax: (07)33670061</span>
				<br><br>
				<strong>Distributor</strong><br>
				<span>The Holistic Medical Centre Pty Ltd ACN: 010379209 Ph: (07)33696555<br>Fax: (07)33670061</span>
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
	
	<div id="quickEntry">
		<?php echo $this->element('quick_entry'); ?>
	</div>
</div>


<script>
	$(document).ready(function() {
		SetMobileMenu();
		$(window).resize( function () {
			SetMobileMenu();
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