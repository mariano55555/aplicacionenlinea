<?php
if ($porcentaje1 >= 0 && $porcentaje1 <=30) {
  $progress1 = '<div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="'.number_format($porcentaje1).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje1).'%">';
}elseif ($porcentaje1 > 30 && $porcentaje1 <=60) {
  $progress1 = '<div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="'.number_format($porcentaje1).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje1).'%">';
}elseif ($porcentaje1 >= 60 && $porcentaje1 <100) {
  $progress1 = '<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="'.number_format($porcentaje1).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje1).'%">';
}else{
  $progress1 = '<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="'.number_format($porcentaje1).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje1).'%">';
}

if ($porcentaje5 >= 0 && $porcentaje5 <=30) {
  $progress5 = '<div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="'.number_format($porcentaje5).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje5).'%">';
}elseif ($porcentaje5 > 30 && $porcentaje5 <=60) {
  $progress5 = '<div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="'.number_format($porcentaje5).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje5).'%">';
}elseif ($porcentaje5 >= 60 && $porcentaje5 <100) {
  $progress5 = '<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="'.number_format($porcentaje5).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje5).'%">';
}else{
  $progress5 = '<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="'.number_format($porcentaje5).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje5).'%">';
}


if ($porcentaje4 >= 0 && $porcentaje4 <=30) {
  $progress4 = '<div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="'.number_format($porcentaje4).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje4).'%">';
}elseif ($porcentaje4 > 30 && $porcentaje4 <=60) {
  $progress4 = '<div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="'.number_format($porcentaje4).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje4).'%">';
}elseif ($porcentaje4 >= 60 && $porcentaje4 <100) {
  $progress4 = '<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="'.number_format($porcentaje4).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje4).'%">';
}else{
  $progress4 = '<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="'.number_format($porcentaje4).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje4).'%">';
}

if ($porcentaje2 >= 0 && $porcentaje2 <=30) {
  $progress2 = '<div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="'.number_format($porcentaje2).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje2).'%">';
}elseif ($porcentaje2 > 30 && $porcentaje2 <=60) {
  $progress2 = '<div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="'.number_format($porcentaje2).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje2).'%">';
}elseif ($porcentaje2 >= 60 && $porcentaje2 <100) {
  $progress2 = '<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="'.number_format($porcentaje2).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje2).'%">';
}else{
  $progress2 = '<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="'.number_format($porcentaje2).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje2).'%">';
}

if ($porcentaje3 >= 0 && $porcentaje3 <=30) {
  $progress3 = '<div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="'.number_format($porcentaje3).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje3).'%">';
}elseif ($porcentaje3 > 30 && $porcentaje3 <=60) {
  $progress3 = '<div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="'.number_format($porcentaje3).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje3).'%">';
}elseif ($porcentaje3 >= 60 && $porcentaje3 <100) {
  $progress3 = '<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="'.number_format($porcentaje3).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje3).'%">';
}else{
  $progress3 = '<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="'.number_format($porcentaje3).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje3).'%">';
}

$porcentaje3total = ($porcentaje1 + $porcentaje2 + $porcentaje3 + $porcentaje4 + $porcentaje5)/5;
if ($porcentaje3total >= 0 && $porcentaje3total <=30) {
  $progresstotal = '<div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="'.number_format($porcentaje3total).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje3total).'%">';
}elseif ($porcentaje3total > 30 && $porcentaje3total <=60) {
  $progresstotal = '<div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="'.number_format($porcentaje3total).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje3total).'%">';
}elseif ($porcentaje3total >= 60 && $porcentaje3total <100) {
  $progresstotal = '<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="'.number_format($porcentaje3total).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje3total).'%">';
}else{
  $progresstotal = '<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="'.number_format($porcentaje3total).'" aria-valuemin="0" aria-valuemax="100" style="width:'. number_format($porcentaje3total).'%">';
}

?>

<style>
  
.navbar-inner {
min-height: 40px;
padding-right: 20px;
padding-left: 20px;
background-color: #fafafa;
background-image: -moz-linear-gradient(top,#fff,#f2f2f2);
background-image: -webkit-gradient(linear,0 0,0 100%,from(#fff),to(#f2f2f2));
background-image: -webkit-linear-gradient(top,#fff,#f2f2f2);
background-image: -o-linear-gradient(top,#fff,#f2f2f2);
background-image: linear-gradient(to bottom,#fff,#f2f2f2);
background-repeat: repeat-x;
border: 1px solid #d4d4d4;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#fff2f2f2',GradientType=0);
-webkit-box-shadow: 0 1px 4px rgba(0,0,0,0.065);
-moz-box-shadow: 0 1px 4px rgba(0,0,0,0.065);
box-shadow: 0 1px 4px rgba(0,0,0,0.065);
}
  .navbar {
    font-family: 'Open Sans', sans-serif;
font-size: 13px !important;
line-height: 20px;
color: #333;
margin-bottom: 20px;
overflow: visible;
}
.navbar .brand {
display: block;
float: left;
padding: 10px 20px 10px;
margin-left: -20px;
font-size: 20px;
font-weight: 200;
color: #777;
text-shadow: 0 1px 0 #fff;
}
</style>
    <div class="navbar-wrapper">
      <div class="container">

         <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ESEN</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="#">Tu punto de partida</a>
              </li>
              <li><a href="<?php echo $this->webroot; ?>primera_parte">Parte 1</a></li>
              <li><a href="<?php echo $this->webroot; ?>segunda_parte">Parte 2</a></li>
              <li><a href="<?php echo $this->webroot; ?>tercera_parte">Parte 3</a></li>
              <li><a href="<?php echo $this->webroot; ?>cuarta_parte">Parte 4</a></li>
              <li><a href="<?php echo $this->webroot; ?>quinta_parte">Parte 5</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo $this->webroot;?>users/logout">Salir</a></li>
              <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi cuenta <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Cambiar credenciales</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo $this->webroot;?>users/logout">Salir</a></li>
                </ul>
              </li>-->
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:300px !important; margin-bottom:0px!important">
      <div class="carousel-inner">
        <div class="item active" style="height:300px !important">
          <?php  echo $this->Html->image('5.jpg', array('alt' => 'First slide')); ?>

        </div>

      </div>
    </div>
  
    <!-- /.carousel -->
   <!--<div class="jumbotron">
                  <?php  //echo $this->Html->image('5.jpg', array('alt' => 'First slide')); ?>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
        </p>
      </div>-->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <div class="row">
        <div class="col-lg-12">
           <h1>Bienvenido</h1>
           <h4>Solicitud de admisi&oacute;n</h4>
              <p>Para completar tu aplicaci&oacute;n debes llenar cada una de las secciones del formulario. Tu aplicaci&oacute;n podr&aacute; ser enviada hasta que el marcador de porcentaje global este completado.
              </p>

        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-lg-12">
          <span style="font-size:1.3em; color:#086A87; font-weight:bold">Porcentaje global: <?php echo ($porcentaje3total == 0.1) ? 0 : number_format($porcentaje3total,0); ?>%</span>
          <div class="progress progress-striped active">
           <?php echo $progresstotal; ?>
          </div>
        </div>
      </div>
      <br/><br/><br/><br/><br/><br/>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <!--parte 1 -->
        <div class="col-lg-4">
          
          <div class="progress progress-striped active">
              <?php echo $progress1; ?>
              <span class="sr-only">45% Complete</span>
            </div>
          </div>

          <h2>Parte 1</h2>
          <p>La primera parte consta de una serie de preguntas relacionadas a informaci&oacute;n personal, Educaci&oacute;n media, proceso al que se postular&aacute;, carrera que desea cursar, etc.</p>
          <p><a class="btn btn-info" href="<?php echo $this->webroot; ?>primera_parte" role="button">Ver &raquo;</a></p>
        
        </div><!-- /.col-lg-4 -->
        
        <!--parte 2 -->
        <div class="col-lg-4">
          
          <div class="progress progress-striped active">
            <?php echo $progress2; ?>
              <span class="sr-only">45% Complete</span>
            </div>
          </div>
          
          <h2>Parte 2</h2>
          <p>La secci&oacute;n 2 de la aplicaci&oacute;n requerie que se complete una serie de preguntas relacionadas a su ambiente familiar.
            Completar la informaci&oacute;n con datos veridicos.
          </p>
          <p><a class="btn btn-info" href="<?php echo $this->webroot; ?>segunda_parte" role="button">Ver &raquo;</a></p>

        </div><!-- /.col-lg-4 -->

        <!--parte 3 -->
        <div class="col-lg-4">
          
          <div class="progress progress-striped active">
             <?php echo $progress3; ?>
              <span class="sr-only">45% Complete</span>
            </div>
          </div>

          <h2>Parte 3</h2>
          <p>Los formularios presentados en la secci&oacute;n 3 est&aacute;n orientados a obtener mayor informaci&oacute;n sobre su educaci&oacute;n media; as&iacute; como las diferentes actividades extra curriculares que haya realizado.</p>
          <p><a class="btn btn-info" href="<?php echo $this->webroot; ?>tercera_parte" role="button">Ver &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->

      <div class="row">

        <!--parte 4 -->
        <div class="col-lg-4 col-lg-offset-2">

          <div class="progress progress-striped active">
            <?php echo $progress4; ?>
              <span class="sr-only">45% Complete</span>
            </div>
          </div>

          <h2>Parte 4</h2>
          <p>Consiste en realizar un ensayo seleccionando uno de dos temas que se describen en la secci&oacute;n 4. El ensayo debe contener como m&iacute;nimo 200 y m&aacute;ximo 250 palabras.</p>
          <p><a class="btn btn-info" href="<?php echo $this->webroot; ?>cuarta_parte" role="button">Ver &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <!--parte 5 -->
        <div class="col-lg-4">
          
          <div class="progress progress-striped active">
            <?php echo $progress5; ?>
              <span class="sr-only">45% Complete</span>
            </div>
          </div>


          <h2>Parte 5</h2>
          <p>Consiste en ingresar la informaci&oacute;n del recomendador que recibir&aacute; la solicitud de recomendaci&oacute;npara ser completada y entregada junto con la solicitud de admisi&oacute;n.
          </p>
          <p><a class="btn btn-info" href="<?php echo $this->webroot; ?>quinta_parte" role="button">Ver &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div>


      <!-- START THE FEATURETTES -->

      <!--<hr class="featurette-divider">

      

      <hr class="featurette-divider">-->

      <!-- /END THE FEATURETTES -->
      <style>
      

      </style>

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Principio</a></p>
        <p>&copy; 2014 ESEN &middot; <a href="http://www.esen.edu.sv" target="_blank">Sitio web</a> </p>
      </footer>

    </div><!-- /.container -->


