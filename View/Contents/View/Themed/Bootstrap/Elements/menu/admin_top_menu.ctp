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
					<li class="menu"><?php echo $this->Html->link('My Profile', '/users/edit_profile');?></li>
					<li class="menu"><?php echo $this->Html->link('Logout', '/users/logout');?></li>
				</ul>

				<ul class="nav">
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>