<!DOCTYPE HTML>
<html>
<head>
<!--<meta charset="UTF-8">-->
<head>
	<!--<script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script>-->
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('ESEN:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(
			 'bootstrap.min',
			 'bootstrap-responsive.min',
			 'plugins/jquery-ui/smoothness/jquery-ui',
			 'plugins/jquery-ui/smoothness/jquery.ui.theme',
			 'plugins/pageguide/pageguide',
			 'plugins/fullcalendar/fullcalendar',
			 'plugins/fullcalendar/fullcalendar.print',
			 'plugins/chosen/chosen',
			 'plugins/select2/select2',
			 'plugins/icheck/all',
			 'style',
			 'themes',
			));

		/*echo $this->Html->script(array(
			 'outside/jquery.min',
			 'outside/bootstrap.min',
			 'outside/eakroko.min',
			 'outside/application'
			));*/
		/*echo $this->Html->script(array(
			 'outside/jquery.min',
			 'outside/eakroko.min',
			));*/
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Js->writeBuffer(array('cache' => TRUE, 'clear' => TRUE));
	?>
<?php echo $this->fetch('content'); ?>
