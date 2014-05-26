<style type="text/css" media="screen">
  .warningbox {
   color: #c09853;
   background-color:#FAF9C9;
   padding:10px;
  }
  .errormsgbox {
   color: #D8000C;
   background-color:#FDD5CE;
   padding:10px;
  }
  .errormsgbox1 {
   color: #D8000C;
   background-color:#FDD5CE;
   padding:10px;
  }
} 
</style>
<!-- Header-->
    <header>
    		<!-- Top Bar -->
            <div class="top">
                <div class="container">
                    <div class="row-fluid">   
                    	<p class="animated fadeInRight"> (503) 2234-9292 / 2234-9275  <span>admision@esen.edu.sv</span></p>         
                    </div>
                    
                </div>
            </div>
            <!-- End Top Bar -->
            
            <!-- Nav-->
            <nav>
            	<div class="container">
                	<div class="row-fluid">
                        	
                            <!-- Logo-->
                        	<div class="span3">
                            	<?php
                            	echo $this->Html->image('login/blue/logo.png', array('alt' => 'ESEN', 'class'=>"logo animated delay1 fadeInDown"))
                            	?>
                            </div>
                            <!-- End Logo-->
                            
                            <!-- Intro Text-->
                            <div class="span9">
                            	<h1 class="animated delay2 fadeInDown">Be part of USA Nº1 University</h1>
                            </div>
                            <!-- End Intro Text-->
                	</div>
            	</div>            
            </nav>
            <!-- End Nav-->
            
            <!-- Slider -->
            <div class="slider multiple">
            	<div class="container">
                	<div class="row-fluid">
                    	<div class="span6">
                         
                        	<ul class="bxslider">
                              <li>
                              	<?php
                            	echo $this->Html->image('login/slider/1.png', array('alt' => 'ESEN'));
                            	?>
                              </li>
                              <li>
                              	<?php
                            	echo $this->Html->image('login/slider/2.png', array('alt' => 'ESEN'));
                            	?>
                              </li>
                              <li>
                              	<?php
                            	echo $this->Html->image('login/slider/3.png', array('alt' => 'ESEN'));
                            	?>
                              </li>
                              <li>
                              	<?php
                            	echo $this->Html->image('login/slider/4.png', array('alt' => 'ESEN'));
                            	?>
                              </li>
                            </ul>
                        </div>
                    	<div class="span6 right-form">
                        	<!-- Form -->
                        	<div class="form">
                            	<h2 class="animated delay3 bounceIn">Aplicaci&oacute;n en L&iacute;nea</h2>
                                
                                <div  id="loading" style="display: none" class='alert'>
					  				                 <a class='close' data-dismiss='alert'>×</a>
					  			                  	Cargando
							                 	</div>
                                <?php echo $this->Session->flash(); ?>
                                 <div class="errormsgbox1" style="display:none">
                                  <p style="padding:10px">Cuenta de usuario / Password incorrectos.</p>
                                </div>
								                <div id="response"></div>
                                 <div class="errormsgbox" style="display:none">
                                  <p style="padding:10px">La cuenta no se encuentra activa. Sigue las instrucciones enviadas a tu correo al momento de registrarte.</p>
                                </div>
                                <div class="errormsgbox1" style="display:none">
                                  <p style="padding:10px">Cuenta de usuario / Password incorrectos.</p>
                                </div>
                                <div class="pull-right">
                                  <a href="#" data-toggle="modal" data-target="#Reset" id="contrasenia">Reestablecer contrase&ntilde;a/usuario</a>
                                </div>
                                <br/><br/>
                                <!--<form method="post" action="<?php echo $this->webroot; ?>Users/login">-->
                                  <?php echo $this->Form->create('User', array('action' => 'login', 'inputDefaults' => array('label' => false, 'div'=>false))); ?>
                                  	<div class="row-fluid">
                                  		<div class="span12">
                                    		<!--<input type="text" name="data[User][username]" required placeholder="Usuario" name="Username" /> -->
                                        <?php echo $this->Form->input('username', array('placeholder' => 'Usuario')); ?>
                                    	</div>
                                    </div>
                                    <div class="row-fluid">
                                    	  <div class="span12">
                                    	    <!--<input type="password" name="data[User][password]" required placeholder="Contraseña" name="Password" />-->
                                          <?php echo $this->Form->input('password', array('placeholder' => 'Password')); ?>
                                   	    </div>
                                    </div>	
                                    <div class="row4">
                                    	<input type="submit" data-loading-text="Loading..." class="btn button animated bounceIn" value="Ingresar">
                                    </div>		
                                    
                                    <p data-toggle="modal" data-target="#Registro" id="RegistroLink">
                                      <a href="" title="">¿No tienes cuenta de usuario? Registrate aca.</a>
                                    </p>

                                </form>
                                <div class="clear"></div>                       
                            </div>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slider -->
    </header>
    <!-- End Header-->
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="Reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:99999999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Restablecer credenciales</h4>
      </div>
      <div class="modal-body" id="restablecerid">
          <?php echo $this->Html->image('loading1.gif', array('alt' => 'cargando')); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="rrestablecer">Restablecer</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Modal -->
<div class="modal fade" id="Registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:99999999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Formulario de Registro</h4>
      </div>
      <div class="modal-body" id="registerform">
          <?php echo $this->Html->image('loading1.gif', array('alt' => 'cargando')); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="ccuenta">Crear cuenta</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

