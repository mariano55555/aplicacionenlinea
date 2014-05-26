<style type="text/css" media="screen">
.message, .cake-error, .error-message {
    clear: both;
    color: #fff;
    background: #008DC4;
    border: 1px solid rgba(0, 0, 0, 0.5);
    background-repeat: repeat-x;
    background-image: -moz-linear-gradient(top, #008DC4, #008DC0);
    background-image: -ms-linear-gradient(top, #008DC4, #008DC0);
    background-image: -webkit-gradient(linear, left top, left bottom, from(#008DC4), to(#008DC0));
    background-image: -webkit-linear-gradient(top, #008DC4, #008DC0);
    background-image: -o-linear-gradient(top, #008DC4, #008DC0);
    background-image: linear-gradient(top, #008DC4b, #008DC0);
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
    font-size: 32px;
    padding: 10px;
}

#name-notEmpty, #email-notEmpty, #username-notEmpty, #password-notEmpty, #password2-notEmpty, #gender-notEmpty {
    padding: 8px 35px 8px 14px;
    margin-bottom: 20px;
    text-shadow: 0 1px 0 rgba(255,255,255,0.5);
    background-color: #fcf8e3;
    border: 1px solid #fbeed5;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    color: #b94a48;
    background-color: #f2dede;
    border-color: #eed3d7;
    font-family: 'Open Sans', sans-serif;
    font-size: 13px !important;
}





.forget{
    margin-top: 50px;
}
.forget a span{line-height:30px;margin-bottom:10px;position:relative}
.forget a:hover{background:#ddd}
.forget a span{
    line-height: 30px;
}
.forget a{
    background: #eee;
    padding: 10px 0;
    text-align: center;
    display: block;
    text-decoration: none;
    color: #555;
    /* general typography*/
    h3 small, h2 small, h5 small 
    {
        color: #868686;
    }

 
}
#titulo 
{
    font-weight: normal;
    font-family: "MyriadPro-Light";
}

h1.block, h2.block, h3.block, h4.block, h5.block, h6.block 
{
    padding-bottom: 10px;
}

.error1{
    color:#ffffff;
    background-color: #8A0808;
    padding:10px;
    }
#RegistroLink a{
    font-size: 1.2em;
}
#RegistroLink a:hover{
    text-decoration: none
}
</style>

<script>
$(document).ready(function() {
   if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    function showPosition(position)
    {
        $('#latitud').val(position.coords.latitude);
        $('#longitud').val(position.coords.longitude);
    }
});
</script>
<!--<div class="wrapper" style="top:40%; !important">-->
        <h1>
            <a href="#">
                <img src="<?php echo $this->webroot; ?>img/esen_header.png" alt="" class='retina-ready'>
            </a>
        </h1>
        <div class="login-body">
            <div class="remember" id="RegistroLink">
                <p data-toggle="modal" data-target="#Registro" id="RegistroLink" class="pull-right">
                    <a href="<?php echo $this->webroot; ?>Users/registros" title="">¿No tienes cuenta de usuario? <span style="text-decoration:underline">Registrate ac&aacute;.</span></a>
                </p>
            </div>
            <br/>
            <h2>Sistema de admisi&oacute;n en l&iacute;nea</h2>
            <?php echo $this->Form->create('User', array('action' => 'login', 'class'=>'form-validate', 'id'=>'test')); ?>
                <div class="control-group">
                    <div class="email controls">
                        <input type="text" name="data[User][username]" minlength="5" placeholder="Usuario" class='input-block-level' data-rule-required="true" data-rule-username="true">
                    </div>
                </div>
                <div class="control-group">
                    <div class="pw controls">
                        <input type="password"  name="data[User][password]" minlength="5" placeholder="Contraseña" class='input-block-level' data-rule-required="true" data-rule-username="true">
                    </div>
                </div>
                <div class="control-group" style="display:none">
                    <div class="pw controls">
                        <input type="text"  name="latitud" minlength="5"  class='input-block-level' val="" id="latitud">
                    </div>
                </div>
                <div class="control-group" style="display:none">
                    <div class="pw controls">
                        <input type="text"  name="longitud" minlength="5"  class='input-block-level' val="" id="longitud">
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" value="Ingresar" class='btn btn-primary'>
                </div>
            </form>
            <div class="forget">
                <a href="#"><span>Restablecer contrase&ntilde;a</span></a>
            </div>
        </div>
    </div>

     <div id="forgetModal" class="modal hide fade" tabindex="-1" role="dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h1 id="titulo">Restablece tu contrase&ntilde;a</h1>
        </div>
        <div class="modal-body">
            <p style="margin-left:30px">
                Ingresa tu cuenta de correo y te enviaremos informaci&oacute;n para restablecer tu contrase&ntilde;a
            </p>
            <p>
                <div class="control-group">
                    <label class="control-label" style="margin-left:30px">Email: </label>
                        <div class="controls span4">
                          <div class="input-icon left">
                                      <i class="icon-envelope"></i>
                                        <p>
                                         <input type="email" class="span3" placeholder="Dirección de Email" id="UserEmail">
                                        </p>
                           </div>
                        </div>
                </div>
            </p>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" data-dismiss="modal" id="restablecer" value="restablecer">
            <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>


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



<script type="text/javascript">
$(document).ready(function(){
    $(".forget").click(function(){
        $('#forgetModal').modal({show:true});
     });
    $('#restablecer').click(function(event){
        
        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
     //   var emailblockReg =
       //  /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!hotmail.com)([\w-]+\.)+[\w-]{2,4})?$/;
     
        var emailaddressVal = $("#UserEmail").val();
        if(emailaddressVal == '') {
          $("#UserEmail").after('<p><span class="error1">Ingresa tu dirección de correo electrónico.</span></p>');
          hasError = true;
        }
     
        if(!emailReg.test(emailaddressVal)) {
          $("#UserEmail").after('<p><span class="error1">Ingresa un formato de email válido.</span></gap>');
          hasError = true;
        }
     
        /*else if(!emailblockReg.test(emailaddressVal)) {
          $("#UserEmail").after('<span class="error">No yahoo, gmail or hotmail emails.</span>');
          hasError = true
        } */
     
        if(hasError == true) 
        { 
             return false; 
        }else{
            var email = $('#UserEmail').val();
            var link  = '<?php echo $this->webroot; ?>users/resetpass/' + email;
            $(location).attr('href',link);
        }
    });
})

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

    <script type="text/javascript">
//validaciones
//$(document).ready(function() {
    $('#ccuenta').click(function(event) {
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

        
    }); 
    
//});
</script>