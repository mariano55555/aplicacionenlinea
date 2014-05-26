<!DOCTYPE HTML>

<html>

<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>ESEN</title>
	<meta name="description" content="ESEN">
	<meta name="author" content="ESEN">
	
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <!-- Fav and touch icons
	================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="52x52" href="img/apple-touch-icon-57x57.png">
    
	<!-- Custom styles 
	================================================== -->
	<?php
	echo $this->Html->css(array(
			 'login/style',
			 'login/color/blue',
			 'login/slider/jquery.bxslider',
             'login/bootstrap/bootstrap'
			));
	?>
	
    <!--Slider Styles-->
	<!--[if IE 8 ]><link href="css/ie8.css" rel="stylesheet" media="screen"><![endif]-->
	
	<!-- Scripts Libs 
	================================================== -->
	    <?php
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		
	//	echo $this->Js->writeBuffer(array('cache' => TRUE, 'clear' => TRUE));
	?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements 
	================================================== -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
        <div id="content" url="<?php echo $this->webroot; ?>">

            <?php #echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
   

    <!--Footer-->
    <footer>
    	<div class="container">
        
        	<div class="row-fluid">
            	<div class="span6">
                	<h6>© <?php echo date("Y"); ?> Derechos reservados. ESEN  /  <a href="http://www.esen.edu.sv" target="_blank">Sitio web oficial</a></h6>
                </div>
                
                <div class="span6">
                	<ul class="social">
                    	<li title="Linkedin" class="tooltip_hover"><a href="#" class="linkedin socialicon"></a></li>
                        <li title="Youtube" class="tooltip_hover"><a href="#" class="youtube socialicon"></a></li>
                        <li title="Facebook" class="tooltip_hover"><a href="#" class="facebook socialicon"></a></li>
                        <li title="Twitter" class="tooltip_hover"><a href="#" class="twitter socialicon"></a></li>                       
                    </ul>
                </div>
                
            
            </div>
            
        </div>
    
    </footer>
    
    

    <!--End Footer-->

	<!-- ======================= JQuery libs =========================== -->                 
    
	
	<!-- ======================= End JQuery libs =========================== --> 


    <?php
        echo $this->Html->script(array(
             'https://code.jquery.com/jquery-1.10.2.min.js',
             'login/jquery.fitvids.min',
             'login/jquery.placeholder.min',
             'login/slider/jquery.bxslider',
             'login/jquery.easing.1.3',
             'login/jquery.mousewheel.min',
             'login/jcarousellite_1.0.1.pack',
             'login/scripts',
             'login/bootstrap',
             'outside/eakrokoforselect'
            ));
        echo $this->fetch('script');
    ?>
   
    <script type="text/javascript">
    $(document).ready(function() {
      $('#contrasenia').click(function(event) {
        var img = '<img src="<?php echo $this->webroot;?>img/loading1.gif"></img>';
        $('#restablecerid').html(img);
        $.ajax({
          url: '<?php echo $this->webroot; ?>Users/reset',
        })
        .done(function(response) {
          $('#restablecerid').html(response);
          $('#email123').focus(); // pone el foco en el textbox de email
        })
        .fail(function() {
          $('#restablecerid').html('No se pudo cargar los datos. Intente más tarde');
        })
      }); 
    });
    </script>
    <script>
    $(document).ready(function() {
     $('#RegistroLink').click(function(event) {
        var img = '<img src="<?php echo $this->webroot;?>img/loading1.gif"></img>';
        $('#registerform').html(img);
        $.ajax({
          url: '<?php echo $this->webroot; ?>Users/registro',
        })
        .done(function(response) {
          $('#registerform').html(response);
        })
        .fail(function() {
          $('#registerform').html('No se pudo cargar los datos. Intente más tarde');
        })
      }); 
     });
    </script>
   

  </body>
</html>
