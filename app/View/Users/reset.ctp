<style type="text/css" media="screen">
	.successbox {
	 color: #4F8A10;
	 background-color:#EDFCED;
 	 padding:5px;
	}
	.warningbox {
	 color: #c09853;
	 background-color:#FAF9C9;
	 padding:5px;
	}
	.errormsgbox {
	 color: #D8000C;
	 background-color:#FDD5CE;
	 padding:5px;
	}
</style>
<div class="row-fluid">
					<div class="col-md-12"> 
						<div class="successbox" style="display:none">
							<p style="padding:10px">Se ha enviado informaci&oacute;n para restablecer las credenciales al correo ingresado.</p>
						</div>
						<div class="warningbox" style="display:none">
							<p style="padding:10px">El email ingresado no se encuentra registrado en nuestra base, Intenta nuevamente o crea una nueva cuenta.</p>
						</div>
						<div class="errormsgbox" style="display:none">
							<p style="padding:10px">Ingresa una cuenta de correo.</p>
						</div>
						<div class="errormsgbox1" style="display:none">
							<p style="padding:10px">Ingresa una cuenta de correo v&aacute;lida.</p>
						</div>
						<br/>
						<div class="box box-bordered box-color">
								<?php 
								echo $this->Form->create('User', array("class" => "form-horizontal form-bordered form-wysiwyg", 'inputDefaults' => array('label' => false, 'div'=>false))); 
								?>
									<div class="control-group">
											<label for="textfield" class="control-label">Email</label>
											<div class="controls">
												<?php echo $this->Form->input('email', array("id"=>"email123", 'class' => 'input-xlarge')); ?>
											</div>
									</div>
								</form>
							
						</div>
					</div>
				</div>


 <script>


  $('#rrestablecer').click(function(event) {
  	
		var email      = $('#email123').val();
		var validacion = validar(email);
  		if (validacion == true) 
  		{
  			checkmail(email);
			
  		} 
  });

	function validar(email){
		var valido = true;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(email == '') {
	      $(".errormsgbox").show();
		  setTimeout( " $('.errormsgbox').hide();",5000);
		  valido = false;
	    }
        else if(!emailReg.test(email)) {
         $(".errormsgbox1").show();
		  setTimeout( " $('.errormsgbox1').hide();",5000);
		  valido = false;
	    }
	    return valido;
	}

	function checkmail(email){
		$.ajax({
  				url: '<?php echo $this->webroot; ?>Users/checkmail/' + email,
  			})
  			.done(function(response) {
	  				if(response == 0){
					  $(".warningbox").show();
						  setTimeout( " $('.warningbox').hide();",5000);
					}else if(response == 1){
						  $(".successbox").show();
						  setTimeout( " $('.successbox').hide();",5000);
						  setTimeout( " $('#Reset').modal('hide');",5000);
					}else{
						alert("Ha ocurrido un error. Favor intente más tarde");
					}
  			})
  			.fail(function() {
  				alert("Error: no se pudo ejecutar el proceso. Intenta nuevamente");
  			})
	}


	
    </script>