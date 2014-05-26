<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php echo $this->Html->charset(); ?>
        <title>
                <?php echo __('ESEN: Aplicación en línea:'); ?>
                <?php echo $title_for_layout; ?>
        </title>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
        <?php
                //echo $this->Html->meta('icon');
                echo $this->Html->meta(
                    'favicon.ico',
                    'img/favicon.ico',
                    array('type' => 'icon')
                );

                echo $this->Html->css(array(
                         'default/bootstrap/style',
                         'default/bootstrap/color/blue',
                         'default/bootstrap/slider/jquery.bxslider',
                         'default/carousel',
            			 'default/bootstrap/bootstrap'
                        ));

                echo $this->fetch('meta');
                echo $this->fetch('css');
        ?>
</head>
<body>
        <div id="container">
                <div id="content">

                        <?php echo $this->Session->flash(); ?>

                        <?php echo $this->fetch('content'); ?>
                </div>
                <div id="footer">
                   
                </div>
        </div>
        <?php 
            echo $this->Html->script(array(
             'https://code.jquery.com/jquery-1.10.2.min.js',
             'default/holder',
             'default/bootstrap.min'
            ));
                echo $this->fetch('script');
               // echo $this->element('sql_dump'); 
        ?>
</body>
</html>