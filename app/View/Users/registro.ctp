<?php
    echo $this->Html->script(array(
        'validate'
    ));
?>


<style type="text/css" media="screen">
  .successbox123 {
   color: #4F8A10;
   background-color:#EDFCED;
   padding:10px;
  }
  .warningbox123 {
   color: #c09853;
   background-color:#FAF9C9;
   padding:10px;
  }
  .errormsgbox123 {
   color: #D8000C;
   background-color:#FDD5CE;
   padding:10px;
  }
  .noguardarbox123 {
   color: #D8000C;
   background-color:#FDD5CE;
   padding:10px;
  }
</style>
	<div class="row-fluid">
		<a href="" id="loginback">Sign in</a>
					<div class="span12">
						   <div class="successbox123" style="display:none">
                              <p>Se ha enviado un correo con las instrucciones para activar tu cuenta de usuario y comenzar el proceso de aplicaci&oacute;n en l&iacute;nea</p>
                            </div>
                            <div class="errormsgbox123" style="display:none">
                              <p>Existen errores en el formulario. Corrigelos e intenta crear la cuenta nuevamente</p>
                            </div>
                            <div class="warningboxbox123" style="display:none">
                              <p>No se ha podido crear la cuenta. Contactanos al correo admision@esen.edu.sv</p>
                            </div>
                            <div class="noguardarbox123" style="display:none">
                              <p>Existen errores en el formulario. Corrigelos e intenta crear la cuenta nuevamente!!!</p>
                            </div>

						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-sitemap"></i>REGISTRO</h3>
							</div>
							<div class="box-content nopadding">
								<?php 
								echo $this->Form->create('User', array( "class" => "form-horizontal form-bordered form-wysiwyg", 'inputDefaults' => array('label' => false, 'div'=>false))); 
								?>
								<div class="control-group">
										<label for="textfield" class="control-label">Nombre completo</label>
										<div class="controls">
											<?php echo $this->Form->input('name', array("id"=>"name", 'class' => 'input-xlarge', 'required' => true)); ?>
										</div>
								</div>
								<div class="control-group">
											<label for="textfield" class="control-label">Email</label>
											<div class="controls">
												<?php echo $this->Form->input('email', array("id"=>"email", 'class' => 'input-xlarge', 'required' => true)); ?>
											</div>
								</div>
								<div class="control-group">
				                    <label for="same5" class="control-label">Genero</label>
				                    <div class="controls">
				                      <div class="check-line">
				                          <input type="radio" id="c10" class='icheck-me' name="same5" data-skin="square" value="1" data-color="blue"> <label class='inline' for="c10" required>Masculino</label>
				                      </div>
				                      <div class="check-line">
				                          <input type="radio" id="c11" class='icheck-me' name="same5" data-skin="square" value="0" data-color="blue"> <label class='inline' for="c11">Femenino</label>
				                      </div>
				                      <div id="gender-notEmpty">
		                              	<p>Selecciona el genero. Campo requerido!</p>
		                              </div>
				                    </div>
				                    
                  				</div>
								<div class="control-group">
										<label for="textfield" class="control-label">Nombre de usuario</label>
										<div class="controls">
											<?php echo $this->Form->input('username', array('id' => 'username', 'class' => 'input-xlarge', 'required' => true)); ?>
										</div>
								</div>
								<div class="control-group">
										<label for="textfield" class="control-label">Contrase&ntilde;a</label>
										<div class="controls">
											<?php echo $this->Form->input('password', array('id' => 'password', 'class' => 'input-xlarge', 'required' => true)); ?>
										</div>
								</div>
									<div class="control-group">
										<label for="password2" class="control-label">Confirmaci&oacute;n de Password</label>
										<div class="controls">
											<?php echo $this->Form->input('password_confirmation', array("id"=>"password_confirmation",'type' => 'password', 'autocomplete'=>'off', 'class' => 'input-xlarge', 'required' => true)); ?>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
<script type="text/javascript">
//validaciones
//$(document).ready(function() {
	/*$('#ccuenta').click(function(event) {
		var name                  = $('#name').val();
		var password              = $('#password').val();
		var password_confirmation = $('#password_confirmation').val();
		var email                 = $('#email').val();
		var username              = $('#username').val();

		$.ajax({
			url: '<?php echo $this->webroot; ?>Users/validateregister',
			type: 'POST',
			data: {name: name, password: password, password_confirmation: password_confirmation,email: email, username: username},
		})
		.done(function(response) {
			if (response == 1) {
				guardar(name,password,email,username)
			}else if(response == 2){
				$(".errormsgbox123").show();
				setTimeout( "$('.errormsgbox123').hide();",3000);
			}else{
				$(".warningbox123").show();
				setTimeout( "$('.warningbox123').hide();",3000);
			}
		})
		.fail(function() {
			alert("No se pudo realizar la operación. Contactanos al correo admision@esen.edu.sv");
		})
		
		function guardar(name, password, email, username) {
			$.ajax({
				url: '<?php echo $this->webroot; ?>Users/registrar',
				type: 'POST',
				data: {name: name, password: password, email: email, username: username},
			})
			.done(function(response) {
				if (response == 1) {
					$(".successbox123").show();
					setTimeout( "$('.successbox123').hide();",3000);
					setTimeout( "$('#Registro').modal('hide');",3000);
				}else{
					$(".noguardarbox123").show();
					setTimeout( "$('.noguardar123').hide();",3000);
				}
			})
			.fail(function() {
				alert("No se pudo realizar la operación. Contactanos al correo admision@esen.edu.sv");
			})
			
		}

		
	});	*/
	
//});


</script>

