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
.flash{
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
    font-size: 16px;
    padding: 10px;

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
.successbox {
color: #3a87ad;
background-color: #d9edf7;
border-color: #bce8f1;
}
</style>


<div class='login' style="background-color:#ffffff">
        <h1>
            <a href="#">
                <img src="<?php echo $this->webroot; ?>img/esen_header.png" alt="" class='retina-ready'>
            </a>
        </h1>
        <div class="login-body">
            <div class="remember" id="RegistroLink">
                <p   class="pull-right">
                    <a href="<?php echo $this->webroot; ?>registro" title="" >¿No tienes cuenta de usuario? <span style="text-decoration:underline">Registrate ac&aacute;.</span></a>
                </p>
            </div>
            <br/>
            <h2>Sistema de admisi&oacute;n en l&iacute;nea</h2>
            <?php echo $this->Form->create('User', array('action' => 'login', 'id'=>'test')); ?>
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
</div>
