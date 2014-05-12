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
		echo $this->Html->css('chosen');
		echo $this->Html->css('bootstrap-iframe-theme');
		echo $this->Html->css('smoothness/jquery-ui-1.9.2.custom.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		
		echo $this->Html->script('libs/jquery');
	?>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<link href="//vjs.zencdn.net/4.5/video-js.css" rel="stylesheet">
	<script src="//vjs.zencdn.net/4.5/video.js"></script>
	
	<style>
		input[type=text], input[type=password], input[type=email] {
			border-radius: 4px;
			padding: 10px 10px 10px 10px;
			height: 40px;
			width: 300px;
		}
		
		body { background: transparent; }
		#content { background: transparent; }
	</style>
	
</head>
<body>
	<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->fetch('content'); ?>
		
		<?php if($_GET['action'] == "login") { ?>
			<div class="users form">
				<?php echo $this->Form->create('User'); ?>
					<fieldset>
						<legend>
							<?php echo __('Please enter your username and password'); ?>
						</legend>
						<?php echo $this->Form->input('username', array('div' => false, 'autocomplete' => 'off'));
						echo $this->Form->input('password', array('div' => false, 'autocomplete' => 'off'));
					?>
					</fieldset>
					
					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/users/remote_register">Signup</a>
					
				<?php echo $this->Form->end(__('Login')); ?>
			</div>
		<?php } else if($_GET['action'] == "register"){ ?>
			<div class="userProfiles form">
				<?php echo $this->Form->create('Users', array('action' => '/remote_register?answered=true&status=temp')); ?>
					<fieldset>
						<legend><?php echo __('Sign Up'); ?></legend>
						
						
						<div class="left span12"><?php echo $this->Form->input('UserProfile.first_name', array('div' => false, 'label' => false, 'placeholder' => 'Firstname')); ?></div>
						<div class="left span12"><?php echo $this->Form->input('UserProfile.last_name', array('div' => false, 'label' => false, 'placeholder' => 'Lastname')); ?></div>
						<div class="left span12"><?php echo $this->Form->input('User.email', array('div' => false, 'label' => false, 'placeholder' => 'Username')); ?></div>
						<div class="left span12"><?php echo $this->Form->input('User.password', array('div' => false, 'label' => false, 'placeholder' => 'Password')); ?></div>
						<div class="left span12"><?php echo $this->Form->input('User.repeat_password', array('type' => 'password', 'div' => false, 'label' => false, 'placeholder' => 'Repeat Password')); ?></div>
					
					
					</fieldset>
					<input type="submit" class="btn btn-success">
				<?php echo $this->Form->end(); ?>
				</div>

				<script>
					$(document).ready( function () {
						$( "#UserProfileBirthday" ).datepicker({
							dateFormat : 'yy-mm-dd',
							changeMonth : true,
							changeYear : true
						});
					});
				</script>
		<?php } ?>
		
	</div>
	<footer class="container"></footer><!-- /container -->


	<?php // echo '<pre>'.$this->element('sql_dump').'</pre>'; ?>
	<?php
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
	$(document).ready(function() {
		
		var document_height = $(document).height();
		
		var $container = $('#mainContentWrapper');
		
		// Slidebars Submenus
		$('.sb-toggle-submenu').off('click').on('click', function() {
			$submenu = $(this).parent().children('.sb-submenu');
			$(this).add($submenu).toggleClass('sb-submenu-active'); // Toggle active class.
			
			if ($submenu.hasClass('sb-submenu-active')) {
				$submenu.slideDown(200);
			} else {
				$submenu.slideUp(200);
			}
		});
		
	});		
</script>