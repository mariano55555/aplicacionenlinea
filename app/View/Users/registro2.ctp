
<style type="text/css" media="screen">
.cake-error, .error-message {
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

#name-notEmpty, #email-notEmpty, #username-notEmpty, #password-notEmpty, #password2-notEmpty, #gender-notEmpty, #not-gender {
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

.successbox {
 color: #4F8A10;
 background-color:#EDFCED;
 padding:10px;
}
 .errormsgbox {
   color: #D8000C;
   background-color:#FDD5CE;
   padding:10px;
  }
</style>
            <style>
            #submit label{
                display:inline;
                width: 0px !important;
            }
            .submit label{
                display:inline;
                width: 0px !important;
            }
            </style>
        
            <div class="row">
                <!--<div class="iphone span5">
                    <img src="assets/img/iphone.png" alt="">
                </div>-->
                <div class="register span6 offset3">
                    <div class="errormsgbox" style="display:none">
                        <p style="padding:10px; text-align: center"><?php echo isset($mensaje) ? $mensaje : ""; ?></p>
                    </div>
                    <form action="" method="post" id="serializethis">
                        <p class="pull-right"><a href="<?php echo $this->webroot; ?>">Ingreso de usuario</a></p>
                        <br/>
                        <h2>REGISTRO DE <span class="red"><strong>USUARIOS</strong></span> <i class="icon-edit"></i></h2>
                        <?php echo $this->Form->input('name', array("id"=>"name",  'required' => true, 'label' => "Nombre completo", 'placeholder' => "Ingrese su nombre completo")); ?>
                        <label for="">Seleccione su genero</label>
                          <div class="row">
                              <div class="span2">
                                <div class="check-line">
                                    <input type="radio" class='icheck-me c7' name="genero" data-skin="square" data-color="blue" value="0"> 
                                    <label class='inline' for="c7">
                                      Femenino
                                    </label>
                                </div>
                              </div>
                              <div class="span2">
                                <div class="check-line">
                                    <input type="radio" class='icheck-me c7' name="genero" data-skin="square" data-color="blue" value="1"> 
                                    <label class='inline' for="c7">
                                     Masculino
                                    </label>
                                </div>
                              </div>
                          </div>
                          <div id="not-gender" style="display:none">Seleccione su genero.Campo requerido</div>

                        <?php echo $this->Form->input('email', array("id"=>"email", 'required' => true, 'placeholder' => "Ingrese su correo electrónico", "label" => "Correo electrónico")); ?>
                        <?php echo $this->Form->input('username', array('id' => 'username', 'required' => true, 'placeholder' => "Ingrese su nombre de usuario", 'label' => "Nombre de usuario")); ?>
                        <?php echo $this->Form->input('password', array('id' => 'password', 'required' => true, 'label' => "Contraseña", "placeholder" => "Ingrese una contraseña")); ?>
                        <?php echo $this->Form->input('password_confirmation', array("id"=>"password_confirmation",'type' => 'password', 'autocomplete'=>'off',  'required' => true, "label" => "Confirme su contraseña", "placeholder" => "Confirme la contraseña")); ?>
                        <button type="submit" id="registroboton">REGISTRO</button>
                    </form>
                </div>
            </div>

            <script>
            $(document).ready(function() {
                $('#registroboton').click(function(event) {
                    if ($("input[name=genero]").is(":checked")) {
                       
                    }else{
                         $('#not-gender').show();
                        return false;
                    }
                });

                $(".c7").on( "click", function( event ) {
                      $('#not-gender').hide();
                });

            });

            </script>