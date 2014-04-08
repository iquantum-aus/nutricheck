<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta(array("name"=>"viewport","content"=>"width=device-width,  initial-scale=1.0"));
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		// docs.css is only for this exapmple, remove for app dev
		echo $this->Html->css('backend');
		echo $this->Html->css('slidebars.min');
		echo $this->Html->css('slidebars-theme');
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<link href="//vjs.zencdn.net/4.5/video-js.css" rel="stylesheet">
	<script src="//vjs.zencdn.net/4.5/video.js"></script>
	
</head>
<body data-spy="scroll" data-target=".subnav" data-offset="50">
	<header>
		<?php echo $this->element("menu/admin_top_menu"); ?>
	</header>
	<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->element('sidebar'); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<footer class="container"></footer><!-- /container -->


	<?php // echo '<pre>'.$this->element('sql_dump').'</pre>'; ?>
	<?php
		echo $this->Html->script('libs/jquery');
		echo $this->Html->script('libs/modernizr.min');
		echo $this->Html->script('libs/bootstrap.min');
		echo $this->Html->script('slidebars.min');
		echo $this->Html->script('masonry.pkgd.min');
		echo $this->Html->script('Chart.min');
		echo $this->fetch('script');
 	?>
</body>
</html>

<script>
	(function($) {
		$(document).ready(function() {
			
			var sidebar_appear = 0;
			$.slidebars();
			
			var $container = $('#mainContentWrapper');
			
			// initialize
			$container.masonry({
				columnWidth: 20,
				itemSelector: '.item'
			});
			
			var pieData = [
				{ value : 46, color : "#d9d9d9" },
				{ value: 54, color:"#7bac00" }
			];

			var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);	
			
			
			var dashboardIcon_positionX = "0px";
			var competitionIcon_positionX = "-35px";
			var campaignIcon_positionX = "-75px";
			var reportIcon_positionX = "-150px";
			var userIcon_positionX = "-185px";
			var settingIcon_positionX = "-225px";
			
			$('ul.nav > li > a').mouseenter( function () {
				var icon_id = $(this).children('div.identyIcon').attr('id');
				
				if(!$(this).hasClass('active')) { 
					if(icon_id == "competitionIcon") {
						$('#'+icon_id).css("background-position", competitionIcon_positionX+" -46px");
					} else if(icon_id == "campaignIcon") {
						$('#'+icon_id).css("background-position", campaignIcon_positionX+" -46px");
					} else if(icon_id == "reportIcon") {
						$('#'+icon_id).css("background-position", reportIcon_positionX+" -46px");
					} else if(icon_id == "dashboardIcon") {
						$('#'+icon_id).css("background-position", dashboardIcon_positionX+" -46px");
					} else if(icon_id == "userIcon") {
						$('#'+icon_id).css("background-position", userIcon_positionX+" -46px");
					} else if(icon_id == "settingIcon") {
						$('#'+icon_id).css("background-position", settingIcon_positionX+" -46px");
					}
				}
			});
			
			$('#sidebar-main-menu li a').bind({
				mouseenter: function() {
					$(this).children('.sideIco').toggleClass('active');
					$(this).children('.active-sidebar-menu').toggleClass('active');
				},
				mouseleave: function() {
					$(this).children('.sideIco').toggleClass('active');
					$(this).children('.active-sidebar-menu').toggleClass('active');
				}
			});
			
		});
	}) (jQuery);
</script>