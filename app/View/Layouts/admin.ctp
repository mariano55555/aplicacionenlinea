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
		echo $this->Html->meta(
                    'favicon.ico',
                    'img/favicon.ico',
                    array('type' => 'icon')
                );

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
			 'plugins/gritter/jquery.gritter',
			 'style',
			 'themes',
			 'loading',
			 'plugins/elfinder/elfinder.min',
			 'plugins/multiselect/multi-select',
			 'plugins/daterangepicker/daterangepicker'
			));

		echo $this->Html->script(array(
			 'outside/jquery.min',
			 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js',
			 'plugins/nicescroll/jquery.nicescroll.min',
			 'plugins/jquery-ui/jquery.ui.core.min',
			 'plugins/jquery-ui/jquery.ui.widget.min',
			 'plugins/jquery-ui/jquery.ui.mouse.min',
			 'plugins/jquery-ui/jquery.ui.draggable.min',
			 'plugins/jquery-ui/jquery.ui.resizable.min',
			 'plugins/jquery-ui/jquery.ui.sortable.min',
			 'plugins/touch-punch/jquery.touch-punch.min',
			 'plugins/slimscroll/jquery.slimscroll.min',
			 'outside/bootstrap.min',
			 'plugins/vmap/jquery.vmap.min',
			 'plugins/vmap/jquery.vmap.world',
			 'plugins/vmap/jquery.vmap.sampledata',
			 'plugins/bootbox/jquery.bootbox',
			 'plugins/flot/jquery.flot.min',
			 'plugins/flot/jquery.flot.bar.order.min',
			 'plugins/flot/jquery.flot.pie.min',
			 'plugins/flot/jquery.flot.resize.min',
			 'plugins/imagesLoaded/jquery.imagesloaded.min',
			 'plugins/pageguide/jquery.pageguide',
			 'plugins/fullcalendar/fullcalendar.min',
			 'plugins/chosen/chosen.jquery.min',
			 'plugins/select2/select2.min',
			 'plugins/icheck/jquery.icheck.min',
			 'plugins/elfinder/elfinder.min',
			 'outside/eakrokoforselect',
			 'outside/application.min',
			 'outside/demonstration',
			 'plugins/datepicker/bootstrap-datepicker',
			 'plugins/gritter/jquery.gritter.min',
			 'plugins/datatable/jquery.dataTables.min',
			 'plugins/datatable/TableTools.min',
			 'plugins/datatable/ColReorderWithResize',
			 'plugins/datatable/ColVis.min',
			 'plugins/datatable/jquery.dataTables.columnFilter',
			 'plugins/datatable/jquery.dataTables.grouping',
			 'plugins/highcharts/highcharts',
			 'plugins/highcharts/modules/exporting',
			 'plugins/datepicker/bootstrap-datepicker',
			 'plugins/daterangepicker/daterangepicker',
			 'plugins/daterangepicker/moment.min',
			 'outside/ajax'
			));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Js->writeBuffer(array('cache' => TRUE, 'clear' => TRUE));
		
	?>
</head>
<body>
	<?php #echo $this->element('layout/common/datatablecommon'); ?>
	<div id="container">
		<?php echo $this->element('layout/admin/header'); ?>
		<?php echo $this->element('layout/admin/leftpanel'); ?>
			<div id="main">
				<div class="container-fluid" id="here">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		<div id="footer">
			
		</div>
	</div>
	
</body>
</html>