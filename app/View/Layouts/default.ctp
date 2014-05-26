<!DOCTYPE HTML>
<html>
<head>
<head>
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
       'style',
       'themes',
       'plugins/jquery-ui/smoothness/jquery-ui',
       'plugins/jquery-ui/smoothness/jquery.ui.theme',
       'plugins/tagsinput/jquery.tagsinput',
       'plugins/pageguide/pageguide',
       'plugins/fullcalendar/fullcalendar',
       'plugins/fullcalendar/fullcalendar.print',
       'plugins/chosen/chosen',
       'plugins/select2/select2',
       'plugins/icheck/all',
       'plugins/gritter/jquery.gritter',
       'plugins/elfinder/elfinder.min',
       'plugins/multiselect/multi-select',
       'plugins/daterangepicker/daterangepicker',
       'plugins/datepicker/datepicker',
       'default/textarea',
       'inside/styles',
       //'inside/fontello',
       'inside/media-queries'
       /*'style/avgrund',
       'style/style'*/
      ));
echo $this->Html->script(array(
       'https://code.jquery.com/jquery-1.10.2.min.js',
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
       'plugins/tagsinput/jquery.tagsinput.min',
       'outside/bootstrap.min',
       'plugins/vmap/jquery.vmap.min',
       'plugins/vmap/jquery.vmap.world',
       'plugins/vmap/jquery.vmap.sampledata',
       'plugins/bootbox/jquery.bootbox',
       'plugins/imagesLoaded/jquery.imagesloaded.min',
       'plugins/pageguide/jquery.pageguide',
       'plugins/fullcalendar/fullcalendar.min',
       'plugins/chosen/chosen.jquery.min',
       'plugins/select2/select2.min',
       'plugins/icheck/jquery.icheck.min',
       'plugins/elfinder/elfinder.min',
       'outside/application.min',
       'outside/demonstration.min',
       'outside/ajax',
       /*'plugins/datepicker/bootstrap-datepicker',*/
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
       'plugins/datepicker/locales/bootstrap-datepicker.es',
       'plugins/daterangepicker/moment.min',
       'validate',
       'outside/eakrokoforselect',
       'plugins/contador/jquery.textareaCounter.plugin',
       'plugins/jquery.pulsate/jquery.pulsate.min',
       /*'jquery.textareaCounter.plugin',*/
       'outside/script'
      ));
    echo $this->fetch('script');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->Js->writeBuffer(array('cache' => TRUE, 'clear' => TRUE));
    
  ?>
  <script>
    $(function () {
     $(".pulse2").pulsate({color:"#09f"});
   });
  </script>
</head>
<body>
  <div id="container">
          <?php echo $this->Session->flash(); ?>
          <?php echo $this->fetch('content'); ?>
          <div id="footer"></div>
  </div>
    <!-- end footer -->
  <div id="modal-4" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel" style="color:#368ee0; font-weight:bold">¡Felicidades! Informaci&oacute;n completa</h3>
      </div>
      <div class="modal-body">
        <p>Felicidades! Has completado el formulario de aplicaci&oacute;n en l&iacute;nea, para terminar da click al bot&oacute;n  "Finalizar" ubicado en la parte superior derecha en la barra de men&uacute;.
        </p>
        <p>Ten en consideraci&oacute;n que finalizando la aplicaci&oacute;n en l&iacute;nea no podras editarla nuevamente.</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true" style="display:inline; padding: 5px 9px; background:#eee">Cerrar</button>
      </div>
    </div>


    <script>
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
    //  window.prettyPrint && prettyPrint();
      $('#dp3').datepicker({
        language: 'es'
      });
    });
  </script>
  <script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-106117-1";
urchinTracker();
</script>
</body>
</html>