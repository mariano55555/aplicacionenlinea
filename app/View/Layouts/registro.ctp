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
       'http://fonts.googleapis.com/css?family=PT+Sans:400,700',
       'http://fonts.googleapis.com/css?family=Oleo+Script:400,700',
       'registro/bootstrap/css/bootstrap.min.css',
       'registro/style',
       'plugins/icheck/all',
       'style',
       'themes'
      ));
  
      echo $this->Html->script(array(
       'outside/jquery.min',
       'outside/bootstrap.min',
       'registro/jquery.backstretch.min',
       'registro/scripts',
  //     'validate',
       'outside/jquery.min',
       'plugins/nicescroll/jquery.nicescroll.min',
       'plugins/validation/jquery.validate.min',
       'plugins/validation/additional-methods.min',
       'plugins/icheck/jquery.icheck.min',
       'outside/bootstrap.min',
       'outside/eakroko.min',
       'validate'
      ));
    echo $this->fetch('script');


    echo $this->fetch('meta');
    echo $this->fetch('css');
   
  ?>
</head>
<body  >
    <!--<div class="wrapper">-->
    <span id="content" url="<?php echo $this->webroot; ?>"></span>
    <div class="header">
            <div class="container">
                <div class="row">
                    <div class="logo span4">
                        <h1><a href=""><img src="<?php echo $this->webroot; ?>img/logo2.png" alt=""> <!--<span class="red">.</span>--></a></h1>
                    </div>
                    <div class="links span8">
                        <a class="home" href="" rel="tooltip" data-placement="bottom" data-original-title="Home"></a>
                        <a class="blog" href="" rel="tooltip" data-placement="bottom" data-original-title="Blog"></a>
                    </div>
                </div>
            </div>
        </div>
    <div class="register-container container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
    </div>
  <?php
  ?>
  <script type="text/javascript">
      $('.message').delay(5000).fadeOut('slow');
    </script>
</body>

</html>

