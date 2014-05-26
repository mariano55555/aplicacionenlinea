<!DOCTYPE HTML>
<html>
<head>
<!--<meta charset="UTF-8">-->
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
       'plugins/icheck/all',
       'style',
       'themes'
      ));
  
    echo $this->Html->script(array(
       'outside/jquery.min',
       'plugins/nicescroll/jquery.nicescroll.min',
       'plugins/validation/jquery.validate.min',
       'plugins/validation/additional-methods.min',
       'plugins/icheck/jquery.icheck.min',
       'outside/bootstrap.min',
       'outside/eakroko.min',
       'validate'
      ));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
</head>
<body  class="login" style="background-color:white !important">
   <?php echo $this->Session->flash(); ?>
    <div class="wrapper" style="background-color:white !important">
    <span id="content" url="<?php echo $this->webroot; ?>"></span>
    <?php echo $this->fetch('content'); ?>
    </div>
  
  <script type="text/javascript">
      $('.message').delay(5000).fadeOut('slow');
      $('.flash-sendemail').delay(5000).fadeOut('slow');
    </script>
</body>

</html>
