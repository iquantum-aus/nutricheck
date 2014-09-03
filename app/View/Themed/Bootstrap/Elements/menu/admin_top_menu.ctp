<?php
	$current_plugin = $this->params['plugin'];
	$current_page = $this->params['action'];
?>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
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
			
			<div id="headerScript">
			<!--Welcome <strong><?php //echo $strip_name; ?></strong>-->
			<img src="/img/nutricheck-logo.png" style="max-height:80px;">
			</div>
			
			<div class="nav-collapse collapse">

				<?php
				/*
					NOTE
					All li items must be float right
				*/
				?>
				<ul class="nav small">
					<li class="menu"><?php echo $this->Html->link('Logout', '/users/logout');?></li>
					<li class="menu"><?php echo $this->Html->link('Contact', '/users/edit_profile');?></li>
					<li class="menu"><?php echo $this->Html->link('FAQ', '/users/edit_profile');?></li>
					<li class="menu bolda" style="color:black;padding: 10px 15px 10px;">Welcome <?php echo $this->Html->link($strip_name, '/users/edit_profile');?></li>
				</ul>
				
				<ul class="nav secondary-nav big">
					<li class="menu">
						<a href="javascript:void(0);" onclick="ZoomPage('up');" title="Adjust fonts smaller" class="fontchangesmall">T-</a>
						<a href="javascript:void(0);" onclick="ZoomPage('down');" title="Adjust fonts bigger" class="fontchangebig">T+</a>
					</li>
					<li class="menu"><a class="fancybox" href="#nutricheckProfile">About</a></li>
					<li class="menu"><?php echo $this->Html->link('Widgets', '/users/edit_profile');?></li>
					<li class="menu"><?php echo $this->Html->link('Nutrition Guides', '/users/edit_profile');?></li>
					<li class="menu"><?php echo $this->Html->link('Customers', '/users/edit_profile');?></li>
					<li class="menu"><?php echo $this->Html->link('NutriCheck', '/users/edit_profile');?></li>
					<li class="menu"><?php echo $this->Html->link('Dashboard', '/users/dashboard');?></li>
					
					<?php if($user_info['User']['group_id'] == 2) { ?>						
						<li class="menu"><a class="fancybox" href="#quickEntry">Quick Entry</a></li>
						<li><a target="_blank" href="/questions/print_question_list">Print Question List</a></li>
					<?php } ?>			
				</ul>

				<ul class="nav">
				</ul>
			</div><!--/.nav-collapse -->
		</div>
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
						<h1 class="siteName">NutriCheck</h1>
						<h4 class="slogan">Slogan Here</h4>
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