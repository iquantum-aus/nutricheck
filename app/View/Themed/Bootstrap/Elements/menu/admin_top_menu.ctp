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
			
			<div class="sb-toggle-left navbar-left">
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
			</div>
			
			<div class="nav-collapse collapse">
				<ul class="nav secondary-nav pull-right">
					<li class="menu"><a class="fancybox" href="#nutricheckProfile">About Nutricheck</a></li>
					<li class="menu"><?php echo $this->Html->link('My Profile', '/users/edit_profile');?></li>
					<li class="menu"><?php echo $this->Html->link('Logout', '/users/logout');?></li>
				</ul>

				<ul class="nav">
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>

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
			</div12>
		</div>
	</div>
</div>