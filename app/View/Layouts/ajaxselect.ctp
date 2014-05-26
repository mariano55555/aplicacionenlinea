
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(
			// 'bootstrap.min',
			 //'bootstrap-responsive.min',
			 //'plugins/jquery-ui/smoothness/jquery-ui',
			 //'plugins/jquery-ui/smoothness/jquery.ui.theme',
			 //'plugins/pageguide/pageguide',
			 //'plugins/fullcalendar/fullcalendar',
			 //'plugins/fullcalendar/fullcalendar.print',
			 'plugins/chosen/chosen',
			 'plugins/select2/select2',
			 //'style',
			 //'themes'
			));
		echo $this->Html->script(array(
			 'plugins/chosen/chosen.jquery.min',
			 'plugins/select2/select2.min',
			 'outside/eakrokoforicheck',
			));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Js->writeBuffer(array('cache' => TRUE, 'clear' => TRUE));
	?>

<?php echo $this->fetch('content'); ?>

