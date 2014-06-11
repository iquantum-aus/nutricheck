<?php
	$group_id = $this->Session->read('Auth.User.group_id');
?>

<div class="sb-slidebar sb-left">
	
	<div id="logoHolder">
		<img src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/img/nutricheck-logo.png" alt="Slidebars">
		<h1 class="siteName">NutriCheck</h1>
		<h4 class="slogan">Slogan Here</h4>
	</div>
	
	<?php if($group_id == 1) { ?>
		<nav>
			<ul id="sidebar-main-menu" class="sb-menu">
				<li class="active-sidebar-item"><a href="/users/dashboard"><div class="sideIco" id="dashboardIco"></div>Dashboard<div class="active-sidebar-menu"></div></a></li>
				
				<li>
					<a class="sb-toggle-submenu"><div class="sideIco" id="widgetsIco"></div>Widgets<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
					<ul class="sb-submenu">
						<li><a href="/qgroups">List Widgets</a></li>
						<li><a href="/qgroups/add">Create Widgets</a></li>
					</ul>
				</li>
				
				
				<li>
					<a class="sb-toggle-submenu"><div class="sideIco" id="questionsIco"></div>Questions<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
					<ul class="sb-submenu">
						<li><a href="/questions">List Questions</a></li>
						<li><a href="/questions/add">New Question</a></li>
						<li><a href="/FactorsQuestions">Associate Questions</a></li>
						<li><a href="/questions/nutrient_check">Nutrient Check</a></li>
						<li><a href="/questions/nutrient_check/factors">Question by Disturbance</a></li>
					</ul>
				</li>
				<li><a a href="/users/nutricheck_activity"><div class="sideIco" id="reportsIco"></div>Reports<div class="active-sidebar-menu"></div></a></li>
				<li>
					<a class="sb-toggle-submenu"><div class="sideIco" id="usersIco"></div>Users<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
					<ul class="sb-submenu">
						<li><a href="/admin/users">List Users</a></li>
						<li><a href="/admin/users/add">New Users</a></li>
					</ul>
				</li>
				<li>
					<a class="sb-toggle-submenu"><div class="sideIco" id="settingsIco"></div>Settings<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
					<ul class="sb-submenu">
						<li><a href="/factors">Factors</a></li>
						<li><a href="/prescriptions">Prescriptions</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	<?php } else { ?>
		<nav>
			<ul id="sidebar-main-menu" class="sb-menu">
				<li class="active-sidebar-item"><a href="/users/dashboard"><div class="sideIco" id="dashboardIco"></div>Dashboard<div class="active-sidebar-menu"></div></a></li>
				
				<?php if($group_id == 2) { ?>
				<li>
					<a class="sb-toggle-submenu"><div class="sideIco" id="widgetsIco"></div>Widgets<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
					<ul class="sb-submenu">
						<li><a href="/qgroups">List Widgets</a></li>
						<li><a href="/qgroups/add">Create Widgets</a></li>
					</ul>
				</li>
				
				<li>
					<a class="sb-toggle-submenu"><div class="sideIco" id="widgetsIco"></div>Users<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
					<ul class="sb-submenu">
						<li><a href="/admin/users">List Users</a></li>
						<li><a href="/admin/users/add">Create Users</a></li>
					</ul>
				</li>
				<?php } ?>
				
				<li>
					<a class="sb-toggle-submenu"><div class="sideIco" id="questionsIco"></div>Questions<div class="active-sidebar-menu"></div><span class="sb-caret"></span></a>
					<ul class="sb-submenu">
						<li><a href="/questions/nutrient_check">Nutrient Check</a></li>
						<li><a href="/questions/nutrient_check/factors">Question by Disturbance</a></li>
					</ul>
				</li>
				<li><a a href="/users/nutricheck_activity"><div class="sideIco" id="reportsIco"></div>Reports<div class="active-sidebar-menu"></div></a></li>
			</ul>
		</nav>
	<?php } ?>
</div>