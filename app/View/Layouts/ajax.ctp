<?php
		echo $this->Html->script(array('outside/customdatatable','outside/fordashboard', 'outside/eakrokoforselect'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
?>
<?php echo $this->Js->writeBuffer(array('cache' => TRUE, 'clear' => TRUE)); ?>
<?php echo $this->fetch('content'); ?>