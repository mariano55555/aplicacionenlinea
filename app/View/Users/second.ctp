<?php
foreach ($tel as $key => $v) {
    if ($v['tipo'] == 1) 
    {
         $telfijo = $v['numero'];
    }elseif ($v['tipo'] == 2) {
         $telcel = $v['numero'];
    }
  }

$papa = array();
$mama = array();
$otro = array();

foreach ($fam as $key => $value) {
      if ($value['tipofamiliar_id'] == 1) { // es papa
        $papa['id']          = $value['id'];
        $papa['name']        = $value['name'];
        $papa['ocupacion']   = $value['ocupacion'];
        $papa['telefono']    = $value['telefono'];
        $papa['celular']     = $value['celular'];
        $papa['trabajo']     = $value['trabajo'];
        $papa['email']       = $value['email'];
        $papa['responsable'] = $value['responsable'];
      }elseif ($value['tipofamiliar_id'] == 2) { // es mama
        $mama['id']          = $value['id'];
        $mama['name']        = $value['name'];
        $mama['ocupacion']   = $value['ocupacion'];
        $mama['telefono']    = $value['telefono'];
        $mama['celular']     = $value['celular'];
        $mama['trabajo']     = $value['trabajo'];
        $mama['email']       = $value['email'];
        $mama['responsable'] = $value['responsable'];
      }elseif ($value['tipofamiliar_id'] == 3) { // es diferente de mama o papa
        $otro['id']          = $value['id'];
        $otro['name']        = $value['name'];
        $otro['ocupacion']   = $value['ocupacion'];
        $otro['telefono']    = $value['telefono'];
        $otro['celular']     = $value['celular'];
        $otro['trabajo']     = $value['trabajo'];
        $otro['email']       = $value['email'];
        $otro['responsable'] = $value['responsable'];
        $otro['parentesco']  = $value['parentesco'];
      }
}
    if ($total == 100 && $read != 'disabled') {
      echo $this->Headerdefault->display(2, 1);
    }else{
      echo $this->Headerdefault->display(2);
    }

    
if($total == 100 && $read != 'disabled'){
?>
<script type="text/javascript">
$(document).ready(function() {
        $('#modal-4').modal('show');
}); 
</script>
<?php
}
?>
    
   
  
   <section class="sliderbox">
   </secction>


    <div class="container">

       <!-- information -->
     <section class="information generic-section">
      <div class="container" id="menu-info">
          <div class="row-fluid">
              <div class="span7">
                <div class="box">
                  <img src="<?php echo $this->webroot; ?>img/campus.jpg" alt="image" style="border-radius:15px">
                </div>
               </div>
                 <div class="span5">
                    <div class="box">
                        <div class="box-title">
                          <h3>
                            <i class="icon-reorder"></i>
                            AYUDA: PARTE 2
                          </h3>
                        </div>
                        
                        <div class="box-content">
                          <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle open" data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                                    Formulario: Datos de contacto <i class="icon-minus"></i>
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <p>
                                        Luego de escribir la direcci&oacute;n de residencia, deber&aacute; seleccionar el pa&iacute;s en el campo de selecci&oacute;n, con lo cual se habilitar&aacute; el campo de selecci&oacute;n "Departamento" (en caso que ) o "Ciudad"<br/>
                                        Es necesario completar los campos de tel&eacute;fono.
                                        El campo de direcci&oacute;n deber&aacute; de incluir: colonia, calle y el simbolo # para el n&uacute;mero de casa/apto.
                                     </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                    Formulario: Datos familiares <i class="icon-plus"></i>
                                </a>
                            </div>
                            <div id="collapse2" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>
                                        Es necesario completar la informaci&oacute;n de la persona responsable (Padre, Madre, Ambos o Responsable)
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                    Formulario: Educaci&oacute;n media <i class="icon-plus"></i>
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>
                                        Complete los campos que forman el formulario. En el caso que no aparezca ninguna instituci&oacute;n de procedencia relacionada al pa&iacute;s donde 
                                        realiz&oacute; sus estudios, deber&aacute; ingresar la informaci&oacute;n de la instituci&oacute;n en el campo de texto que se mostrar&aacute;
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
                                    Formulario: Hermano <i class="icon-plus"></i>
                                </a>
                            </div>
                            <div id="collapse4" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>
                                        Los campos que componen el formulario de hermano son requeridos en caso que se seleccione "Si" en el literal E (¿TIENE ALGÚN HERMANO ESTUDIANTE O GRADUADO DE LA ESEN?), en caso contrario no será necesario completar la información del formulario.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
     </section>

        <?php
            echo $this->Paginacion->display(2);
        ?> 
        <div class="span12">
          <span style="font-size:1.3em; color:#086A87; font-weight:bold"><?php echo ($porcentaje == 0.1) ? 0 : number_format($porcentaje,0); ?>%</span>
           <?php
           if ($porcentaje >= 0 && $porcentaje <= 30) {
?>
            <div class="progress progress-danger progress-striped active">
<?php
           }elseif ($porcentaje > 30 && $porcentaje <= 60) {
?>
            <div class="progress progress-warning progress-striped active">
<?php
           }elseif($porcentaje > 60 && $porcentaje <100){
?>
            <div class="progress progress-info progress-striped active">
<?php
           }else{
?>
            <div class="progress progress-success progress-striped active">
<?php
           }
           ?>
              <div class="bar" style="width: <?php echo $porcentaje; ?>%"></div>
          </div>
      <!-- Example row of columns -->
      <div id="row">
        <div class="col-lg-12">
          <div style="background-color:#2E4975; color:#F9F9F9">
            <h3>
              <span style="padding-left:10px">F.</span>DATOS DE CONTACTO
            </h3>
          </div>
        </div>
      </div>
       <form action="#" method="POST" class='form-horizontal'>
      <div class="row-fluid">              
          <div class="span6">            
            <div class="box">
             <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: DATOS DE CONTACTO</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>

                  <!-- Primer campo -->
                  <div class="control-group">
                    <label for="data[User][direccion]" class="control-label">Direcci&oacute;n</label>
                    <div class="controls">
                      <input type="text" name="data[User][direccion]" id="data[User][direccion]" class="input-xlarge direccionmia" value="<?php echo isset($datos[0]['users']['direccion']) ? $datos[0]['users']['direccion']:'' ; ?>" <?php echo $read; ?>>
                        
                        <span class="help-block" id="ayuda" style="display:none">
                          <code style="color:#007f7f !important">Incluir las palabras/simbolos: colonia, calle y <br/> # (de casa o apartamento)</code>
                        </span>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['users']['direccion'])) {
                    $estilo = '';
                  }elseif (isset($post) && strlen(trim($datos[0]['users']['direccion'])) == 0) {
                    $estilo = '';
                  }else{
                    $estilo = 'style="display:none"';
                  }


                  // validar la direccion
                  if (isset($post) && isset($validardireccion)) {
                    $estilo1 = '';
                  }else{
                    $estilo1 = 'style="display:none"';
                  }

                  ?>

                  <!--<div class="alert alert-error mariano" <?php //echo $estilo1; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Palabras o simbolos requeridos:</strong> Calle, colonia y #.
                  </div>
                  <div class="alert alert-error missing" style="display:none">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Palabras o simbolos requeridos:</strong> Calle, colonia y #.
                  </div>
                  <div class="alert alert-error" <?php //echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>-->
                  <!-- Fin Primer campo -->

                  <!-- Tercer campo -->
                  <?php if(!isset($datos[0]['otraubicaciones']['name']) && !isset($datos[0]['otraubicaciones']['pais_id'])){ ?>
                  <div class="control-group" id = "cambiodepto">
                    <label for="textfield" class="control-label">Departamento</label>
                      <div class="controls">
                        <div class="input-xlarge">
                          <select name="departamento" id="departamento" class='chosen-select' data-placeholder="Selecciona un departamento" <?php echo $read; ?>>
                            <?php 
                            if (isset($post) && isset($datos[0]['users']['departamento_id'])) {
                               foreach ($deptos as $key => $value) {
                                  if ($key == $datos[0]['users']['departamento_id']) {
                                  ?>
                                  <option value="<?php echo $key; ?>" selected><?php echo $value; ?></option>  
                                  <?php 
                                  }else{
                                  ?>
                                  <option value="<?php echo $key; ?>"><?php echo $value; ?></option>  
                                  <?php
                                  }
                                }
                            }elseif(isset($datos[0]['users']['departamento_id'])){
                              foreach ($departamentoss as $key => $value) {
                                if ($key == $datos[0]['users']['departamento_id']) {
                            ?>
                                 <option value="<?php echo $key; ?>" selected><?php echo $value; ?></option>
                            <?php
                                }
                              }
                              
                            }else{
                            ?>
                                 <option value=""></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <?php }else{ ?>
                  <div class="control-group" id = "cambiodepto">
                    <label for="data[Otraubicacione][name]" class="control-label">Ciudad</label>
                    <div class="controls">
                      <input type="text" name="data[Otraubicacione][name]" id="nombreubicacion" class="input-xlarge" value="<?php echo($datos[0]['otraubicaciones']['name']) ? $datos[0]['otraubicaciones']['name']:''; ?>" <?php echo $read; ?>>
                    </div>
                  </div>
                  <?php } ?>


                  <?php
                  if (isset($post) && !isset($datos[0]['users']['departamento_id']) && !isset($datos[0]['users']['otraubicacion_id'])) {
                    $estilo = '';
                  }else{
                    $estilo = 'style="display:none"';
                  }

                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

                  <!-- FIN tercer campo -->
                  
                  <!--Quinto campo -->
                  <div class="control-group">
                    <label for="telefono" class="control-label">Tel&eacute;fono</label>
                    <div class="controls">
                      <input type="tel" name="telefono" id="textfield" pattern='[\(]\d{3}[\)]\d{4}[\-]\d{4}' title='Número de teléfono (Formato: (+999)9999-9999)' class="input-xlarge" value="<?php echo isset($telfijo) ? $telfijo: ''; ?>" <?php echo $read; ?>>
                       <span class="help-block" id="ayuda">
                          <code style="color:#007f7f !important">Formato: (999)9999-9999</code>
                        </span>
                    </div>
                  </div>
                   <?php
                  if (isset($post) && !isset($telfijo)) {
                    $estilo = '';
                  }else{
                    $estilo = 'style="display:none"';
                  }

                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!--fin quinto campo -->

                </div>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="box">
              <div class="box-title">
                <h3>&nbsp;&nbsp;<!--<i class="icon-edit"></i> FORMULARIO: DATOS DE CONTACTO--></h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>
                  
                  <!-- Segundo campo -->
                   <div class="control-group">
                    <label for="textfield" class="control-label">Pa&iacute;s</label>
                      <div class="controls">
                        <div class="input-xlarge">
                          <select name="pais" id="pais" class='chosen-select' data-placeholder="Selecciona un pais" <?php echo $read; ?>>
                            <option value=""></option>
                            <?php
                            foreach ($pais as $key => $value) {
                              if (isset($datos[0]['departamentos']['pais_id']) && $datos[0]['departamentos']['pais_id'] == $key || isset($datos[0]['otraubicaciones']['pais_id']) && $datos[0]['otraubicaciones']['pais_id'] == $key) {
                              ?>
                              <option value="<?php echo $key; ?>" selected><?php echo $value; ?></option>  
                              <?php
                              }else{
                              ?>
                              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>  
                              <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['departamentos']['pais_id']) && !isset($datos[0]['otraubicaciones']['pais_id'])) {
                    $estilo = '';
                  }else{
                     $estilo = "style='display:none'";
                  }

                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- FIN Segundo campo -->

                  <!-- Cuarto campo -->
                  <?php
                  if (!isset($datos[0]['users']['otraubicacion_id']) || strlen(trim($datos[0]['users']['otraubicacion_id'])) == 0) 
                  {
                    $estilo = '';
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                    <div class="control-group" id = "cambiomunicipio" <?php echo $estilo; ?>>
                    <label for="textfield" class="control-label">Municipio</label>
                      <div class="controls">
                        <div class="input-xlarge">
                          <select name="municipio" id="municipio" class='chosen-select' data-placeholder="Selecciona un municipio" <?php echo $read; ?>>
                            <?php 
                            if (isset($post) && isset($datos[0]['municipios']['id'])) {
                               foreach ($municipioss as $key => $value) {
                                  if ($key == $datos[0]['municipios']['id']) {
                                  ?>
                                  <option value="<?php echo $key; ?>" selected><?php echo $value; ?></option>  
                                  <?php 
                                  }else{
                                  ?>
                                  <option value="<?php echo $key; ?>"><?php echo $value; ?></option>  
                                  <?php
                                  }
                                }
                            }elseif (isset($datos[0]['municipios']['id'])) {
                              foreach ($municipioss as $key => $value){
                                if ($key == $datos[0]['municipios']['id']) {
                            ?>
                              <option value="<?php echo $key; ?>" selected><?php echo $value; ?></option> 
                            <?php
                                }
                              }
                            }elseif (isset($post) && !isset($datos[0]['municipios']['id']) && isset($datos[0]['users']['departamento_id'])) {
                             foreach ($muni as $k => $v) {
                                  ?>
                                  <option value=""></option>
                                  <option value="<?php echo $k; ?>"><?php echo $v; ?></option>  
                                  <?php
                                }
                            }elseif (!isset($datos[0]['municipios']['id']) && isset($datos[0]['users']['departamento_id'])) {
                             foreach ($muni as $k => $v) {
                                  ?>
                                  <option value=""></option>
                                  <option value="<?php echo $k; ?>"><?php echo $v; ?></option>  
                                  <?php
                                }
                            }else{
                              ?>
                            <option value=""></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['users']['municipio_id']) && !isset($datos[0]['users']['otraubicacion_id'])) 
                  {
                    $estilo = '';
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!--fin cuarto campo -->


                  <!--Sexto campo -->
                  <div class="control-group">
                    <label for="celular" class="control-label">Tel&eacute;fono celular</label>
                    <div class="controls">
                      <input type="tel" name="celular" id="celular" pattern='[\(]\d{3}[\)]\d{4}[\-]\d{4}' title='Número de teléfono móvil (Formato: (+999)9999-9999)' class="input-xlarge" value="<?php echo isset($telcel) ? $telcel:'' ;?>" <?php echo $read; ?>>
                        <span class="help-block" id="ayuda">
                          <code style="color:#007f7f !important">Formato: (999)9999-9999</code>
                        </span>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($telcel)) 
                  {
                    $estilo = '';
                  }else{
                    $estilo = "style='display:none'";
                  }

                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!--fin sexto campo -->

                </div>
              </div>
            </div>
          </div>
      </div>

      <hr class="featurette-divider">

      <div id="row">
        <div class="col-lg-12">
          <div style="background-color:#2E4975; color:#F9F9F9">
            <h3>
              <span style="padding-left:10px">G.</span>DATOS FAMILIARES
            </h3>
          </div>
        </div>
      </div>
      <!-- PADRE -->
      <div class="row-fluid">
          <div class="span6">
            <div class="box">
              <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: PADRE</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>

                  <!-- Primer campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Nombre completo del padre</label>
                    <div class="controls">
                      <input type="text" name="nombrepapa" id="textfield" class="input-xlarge" value="<?php echo isset($papa['name']) ? $papa['name']: ''; ?>" <?php echo $read; ?>>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($papa['name']) && isset($papa['responsable']) && $papa['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu padre.
                  </div>
                  <!-- Fin Primer campo -->


                  <!-- Tercer campo -->
                   <div class="control-group">
                    <label for="textfield" class="control-label">Lugar de Trabajo</label>
                    <div class="controls">
                      <input type="text" name="trabajopapa" id="textfield" class="input-xlarge" value="<?php echo isset($papa['trabajo']) ? $papa['trabajo'] : ''; ?>" <?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($papa['trabajo']) && isset($papa['responsable']) && $papa['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>

                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu padre.
                  </div>

                  <!-- FIN tercer campo -->

                  <!--Quinto campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Tel&eacute;fono Celular</label>
                    <div class="controls">
                      <input type="tel" name="celularpapa" id="textfield" pattern='[\(]\d{3}[\)]\d{4}[\-]\d{4}' title='Número de teléfono móvil (Formato: (+999)9999-9999)' class="input-xlarge" value="<?php echo isset($papa['celular']) ? $papa['celular'] : ''; ?>" <?php echo $read; ?>>
                      <span class="help-block" id="ayuda">
                          <code style="color:#007f7f !important">Formato: (999)9999-9999</code>
                        </span>
                    </div>
                  </div>

                 
                  <?php
                  if (isset($post) && !isset($papa['celular']) && isset($papa['responsable']) && $papa['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>

                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu padre.
                  </div>
                  <!--fin quinto campo -->

                </div>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="box">
              <div class="box-title">
                <h3>&nbsp;&nbsp;&nbsp;</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>

                  <!-- Segundo campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Ocupaci&oacute;n</label>
                    <div class="controls">
                      <input type="text" name="ocupacionpapa" id="textfield" class="input-xlarge" value="<?php echo isset($papa['ocupacion']) ? $papa['ocupacion'] : ''; ?>" <?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($papa['ocupacion']) && isset($papa['responsable']) && $papa['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>

                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu padre.
                  </div>
                  <!-- FIN Segundo campo -->

                  <!-- Cuarto campo -->
                 <div class="control-group">
                    <label for="textfield" class="control-label">Tel&eacute;fono</label>
                    <div class="controls">
                      <input type="tel" name="telefonopapa" id="textfield" pattern='[\(]\d{3}[\)]\d{4}[\-]\d{4}' title='Número de teléfono (Formato: (+999)9999-9999)' class="input-xlarge" value="<?php echo isset($papa['telefono']) ? $papa['telefono'] : ''; ?>" <?php echo $read; ?>>
                        <span class="help-block" id="ayuda">
                          <code style="color:#007f7f !important">Formato: (999)9999-9999</code>
                        </span>
                    </div>
                  </div>

                   <?php
                  if (isset($post) && !isset($papa['telefono']) && isset($papa['responsable']) && $papa['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>

                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu padre.
                  </div>

                  <!--fin cuarto campo -->

                  <!--Sexto campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Correo electr&oacute;nico</label>
                    <div class="controls">
                      <input type="email" name="emailpapa" id="textfield" class="input-xlarge" value="<?php echo isset($papa['email']) ? $papa['email'] : ''; ?>" <?php echo $read; ?>>
                    </div>
                  </div>

                   <?php
                  if (isset($post) && !isset($papa['email']) && isset($papa['responsable']) && $papa['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>

                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu padre.
                  </div>
                  <!--fin sexto campo -->

                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- MADRE -->
      <div class="row-fluid">
        <div class="span6">
            <div class="box">
              <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: MADRE</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>

                  <!-- Primer campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Nombre completo de la madre</label>
                    <div class="controls">
                      <input type="text" name="mamanombre" id="textfield" class="input-xlarge" value="<?php echo isset($mama['name'])?$mama['name']:'';?>" <?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($mama['name']) && isset($mama['responsable']) && $mama['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu madre.
                  </div>
                  <!-- Fin Primer campo -->

                  

                  <!-- Tercer campo -->
                   <div class="control-group">
                    <label for="textfield" class="control-label">Lugar de Trabajo</label>
                    <div class="controls">
                      <input type="text" name="trabajomama" id="textfield" class="input-xlarge" value="<?php echo isset($mama['trabajo'])?$mama['trabajo']:'';?>" <?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($mama['trabajo']) && isset($mama['responsable']) && $mama['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu madre.
                  </div>

                  <!-- FIN tercer campo -->

                

                  <!--Quinto campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Tel&eacute;fono Celular</label>
                    <div class="controls">
                      <input type="tel" name="celularmama" id="textfield" pattern='[\(]\d{3}[\)]\d{4}[\-]\d{4}' title='Número de teléfono móvil (Formato: (+999)9999-9999)' class="input-xlarge" value="<?php echo isset($mama['celular'])?$mama['celular']:'';?>" <?php echo $read; ?>>
                        <span class="help-block" id="ayuda">
                          <code style="color:#007f7f !important">Formato: (999)9999-9999</code>
                        </span>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($mama['celular']) && isset($mama['responsable']) && $mama['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu madre.
                  </div>
                  <!--fin quinto campo -->

                </div>
              </div>
            </div>
        </div>
        <div class="span6">
            <div class="box">
              <div class="box-title">
                <h3>&nbsp;&nbsp;&nbsp;</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>

                  <!-- Segundo campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Ocupaci&oacute;n</label>
                    <div class="controls">
                      <input type="text" name="ocupacionmama" id="textfield" class="input-xlarge" value="<?php echo isset($mama['ocupacion']) ? $mama['ocupacion'] : '';?>" <?php echo $read; ?>>
                    </div>
                  </div>

                   <?php
                  if (isset($post) && !isset($mama['ocupacion']) && isset($mama['responsable']) && $mama['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu madre.
                  </div>
                  <!-- FIN Segundo campo -->


                  <!-- Cuarto campo -->
                 <div class="control-group">
                    <label for="textfield" class="control-label">Tel&eacute;fono</label>
                    <div class="controls">
                      <input type="tel" name="telefonomama" id="textfield" pattern='[\(]\d{3}[\)]\d{4}[\-]\d{4}' title='Número de teléfono (Formato: (+999)9999-9999)' class="input-xlarge" value="<?php echo isset($mama['telefono']) ? $mama['telefono'] :''; ?>" <?php echo $read; ?>>
                      <span class="help-block" id="ayuda">
                          <code style="color:#007f7f !important">Formato: (999)9999-9999</code>
                        </span>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($mama['telefono']) && isset($mama['responsable']) && $mama['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }
                  else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu madre.
                  </div>


                  <!--Sexto campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Correo electr&oacute;nico</label>
                    <div class="controls">
                      <input type="email" name="emailmama" id="textfield" class="input-xlarge" value="<?php echo isset($mama['email']) ? $mama['email'] :''; ?>" <?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($mama['email']) && isset($mama['responsable']) && $mama['responsable'] == 1) 
                  {
                    $estilo = '';
                  }elseif(!isset($papa['id']) && !isset($mama['id']) && !isset($otro['id']) && isset($post)){
                    $estilo = '';
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido, en caso que selecciones como responsable a tu madre.
                  </div>
                  <!--fin sexto campo -->

                </div>
              </div>
            </div>
        </div>
      </div>
      
      <p>Marca qui&eacute;n de tus padres queda como responsable:</p>
      <div class="row">
        <div class="span2">
          <div class="check-line">
              <input type="radio" id="c14" class='icheck-me' name="same10" data-skin="square" data-color="blue" value="1"
              <?php 
              if (isset($papa['responsable']) &&  $papa['responsable'] == 1) {
                if (!isset($mama['responsable']) || $mama['responsable'] == 0) {
                  echo "checked "; 
                }
              }
              echo $read;
              ?>
              > 
              <label class='inline' for="c14">Padre</label>
          </div>
        </div>
        <div class="span2">
          <div class="check-line">
              <input type="radio" id="c15" class='icheck-me' name="same10" data-skin="square" data-color="blue" value="2"
              <?php 
              if (isset($mama['responsable']) &&  $mama['responsable'] == 1) {
                if (!isset($papa['responsable']) || $papa['responsable'] == 0) {
                  echo "checked"; 
                }
              }
              echo $read;
              ?>
              > 
              <label class='inline' for="c15">Madre</label>
          </div>
       </div>
        <div class="span2">
           <div class="check-line">
              <input type="radio" id="c16" class='icheck-me' name="same10" data-skin="square" data-color="blue" value="4"
              <?php 
              if (isset($mama['responsable']) && isset($papa['responsable']) && $papa['responsable'] == 1 && $mama['responsable'] == 1) 
              {
               echo "checked ";
              }
              echo $read;
              ?>
              > 
              <label class='inline' for="c16">Ambos</label>
          </div>
        </div>
        <div class="span2">
           <div class="check-line">
              <input type="radio" id="c17" class='icheck-me' name="same10" data-skin="square" data-color="blue" value="3" <?php
              if (isset($otro['responsable']) && $otro['responsable'] == 1) 
              {
                echo 'checked ';
              }
              echo $read;
              ?>
              > 
              <label class='inline' for="c17">Ninguno</label>
          </div>
        </div>
      </div>
    <?php
    if (isset($post) && !isset($papa['responsable']) && !isset($mama['responsable']) && !isset($otro['responsable'])){
      $estilo = "";
    }elseif (isset($post) && $responsable == 0){
      $estilo = "";
    }else{
      $estilo = "style='display:none'";
    }



    ?>
      <div class="row" <?php echo $estilo; ?>>
        <div class="alert alert-error" style="margin-left:25px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Completa la secci&oacute;n!</strong> Campo requerido.
        </div>
      </div>

      <?php
      if (isset($otro['responsable'])) 
      {
       $estilo = "";
      }else{
        $estilo = "style='display:none'";
      }
      ?>

      <!-- RESPONSABLE -->
       <div class="row-fluid responsable" <?php echo $estilo; ?>>
         <div class="span6">
            <div class="box">
              <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: RESPONSABLE</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>

                  <!-- Primer campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Nombre completo</label>
                    <div class="controls">
                      <input type="text" name="responsablenombre" id="textfield" class="input-xlarge" value="<?php echo isset($otro['name']) ? $otro['name'] :''; ?>"<?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($otro['name'])) 
                  {
                   $estilo = "";
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- Fin Primer campo -->

              

                  <!-- tercer campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Ocupaci&oacute;n</label>
                    <div class="controls">
                      <input type="text" name="responsableocupacion" id="textfield" class="input-xlarge" value="<?php echo isset($otro['ocupacion']) ? $otro['ocupacion'] :''; ?>"<?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($otro['ocupacion'])) 
                  {
                   $estilo = "";
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- FIN Segundo campo -->

                 

                  <!-- quinto campo -->
                 <div class="control-group">
                    <label for="textfield" class="control-label">Tel&eacute;fono</label>
                    <div class="controls">
                      <input type="text" name="telefonoresponsable" id="textfield" pattern='[\(]\d{3}[\)]\d{4}[\-]\d{4}' title='Número de teléfono (Formato: (999)9999-9999)' class="input-xlarge" value="<?php echo isset($otro['telefono']) ? $otro['telefono'] :''; ?>"<?php echo $read; ?>>
                      <span class="help-block" id="ayuda">
                          <code style="color:#007f7f !important">Formato: (999)9999-9999</code>
                        </span>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($otro['telefono'])) 
                  {
                   $estilo = "";
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

                  <!--fin cuarto campo -->


                  <!--septimo campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Correo electr&oacute;nico</label>
                    <div class="controls">
                      <input type="text" name="correoresponsable" id="textfield" class="input-xlarge" value="<?php echo isset($otro['email']) ? $otro['email'] :''; ?>"<?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($otro['email'])) 
                  {
                   $estilo = "";
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!--fin sexto campo -->

                </div>
              </div>
            </div>
         </div>
         <div class="span6">
            <div class="box">
              <div class="box-title">
                <h3>&nbsp;&nbsp;&nbsp;</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>

                 

                  <!-- Primer campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Parentesco</label>
                    <div class="controls">
                      <input type="text" name="responsableparentesco" id="textfield" class="input-xlarge" value="<?php echo isset($otro['parentesco']) ? $otro['parentesco'] :''; ?>"<?php echo $read; ?>>
                    </div>
                  </div>

                  <?php
                  if (isset($post) && !isset($otro['parentesco'])) 
                  {
                   $estilo = "";
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- Fin Primer campo -->

                 

                  <!-- Tercer campo -->
                   <div class="control-group">
                    <label for="textfield" class="control-label">Lugar de Trabajo</label>
                    <div class="controls">
                      <input type="text" name="responsabletrabajo" id="textfield" class="input-xlarge" value="<?php echo isset($otro['trabajo']) ? $otro['trabajo'] :''; ?>"<?php echo $read; ?>>
                    </div>
                  </div>

                 <?php
                  if (isset($post) && !isset($otro['trabajo'])) 
                  {
                   $estilo = "";
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

                  <!-- FIN tercer campo -->

                 

                  <!--Quinto campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Tel&eacute;fono Celular</label>
                    <div class="controls">
                      <input type="tel" name="celularresponsable" id="textfield" class="input-xlarge" pattern='[\(]\d{3}[\)]\d{4}[\-]\d{4}' title='Número de teléfono móvil (Formato: (+999)9999-9999)' value="<?php echo isset($otro['celular']) ? $otro['celular'] :''; ?>"<?php echo $read; ?>>
                        <span class="help-block" id="ayuda">
                          <code style="color:#007f7f !important">Formato: (999)9999-9999</code>
                        </span>
                    </div>
                  </div>

                 <?php
                  if (isset($post) && !isset($otro['celular'])) 
                  {
                   $estilo = "";
                  }else{
                    $estilo = "style='display:none'";
                  }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!--fin quinto campo -->


                </div>
              </div>
            </div>
          </div>
      </div>
       <hr class="featurette-divider">
      <?php
      if ($read != 'disabled') { ?>
          <div class="form-actions">
             <button type="submit" class="btn btn-primary" id="submit">Guardar</button>
          </div>
      <?php
        }
      ?>
        </form>
      <hr class="featurette-divider">

      <?php
        echo $this->Paginacion->display(2);
      ?>    


      <!-- Site footer -->
      <!--<div class="footer">
        <p>&copy; ESEN <?php #echo date('Y'); ?></p>
      </div>-->

      <!-- footer -->
       <div class="footer">
        <p>&copy; ESEN <?php echo date('Y'); ?></p>
    </div>

    </div> <!-- /container -->


   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript">
  $(document).ready(function() {
 /*   var error = 0;
    var exito = 0;
    $(".direccionmia").focusin(function(){
     $('#ayuda').show('400', function() {
            
      });
    });

    $(".direccionmia").focusout(function(){
     $('#ayuda').hide('400', function() { 

      });
       var direccion = $(".direccionmia").val().toLowerCase();
        //palabra calle
        if(direccion.search("calle") >= 0){
          exito = parseInt(exito) + 1;
        }else{
          error = parseInt(error) + 1; 
        }

        // palabra colonia
        if(direccion.search("colonia") >= 0){
          exito = parseInt(exito) + 1;
        }else{
          error = parseInt(error) + 1;
        }

        // simbolo #
        if(direccion.search("#") >= 0){
          exito = parseInt(exito) + 1;
        }else{
          error = parseInt(error) + 1; 
        }
*/
        //desplegar o no el cuadro de error
        /*console.log(error);
        console.log(exito);*/
       /* if(error > 0){
          $('.missing').show('400', function() {
                  
          });
        }else{
          if(exito == 3){
            $('.missing').hide('400', function() {
                  
            });
          }else{
             $('.missing').show('400', function() {
                  
            });
          }
        }*/

      //  error = 0;
       // exito = 0;
  //  });





  $('#departamento').change(function(event) {
    $('#cambiomunicipio').show();
    var valor = $(this).val();
    $.ajax({
      url: '<?php echo $this->webroot; ?>Municipios/getmunicipioajax',
      type: 'POST',
      data: {valor: valor},
    })
    .done(function(respuesta) {
      $('#cambiomunicipio').html(respuesta)
    })
    .fail(function() {
      alert("error");
    })

  });



   // procesos para la parte E de hermanos

    $( "input:radio[name=same10]" ).change(function(event) {
        var responsable = $( "input:radio[name=same10]:checked" ).val();
        if (responsable == 3) {
          $('.responsable').show('400', function() {
            
          });
        }else{
          $('.responsable').hide('400', function() {
            
          });
        }
    });
    $('#pais').change(function(event) {
       var pais = $(this).val();
       $.ajax({
         url: '<?php echo $this->webroot; ?>Departamentos/checkpais',
         type: 'POST',
         data: {id: pais},
       })
       .done(function(response) {
         if(response == 1){
            sendajaxdepto(pais);
            $('#cambiomunicipio').show();
         }else{
            changedeptotextbox(pais);
             $('#cambiomunicipio').hide();
         }
       })
       .fail(function() {
         alert("error");
       })
       
       
    });

  });


  function sendajaxdepto (paisid) {
    $.ajax({
      url: '<?php echo $this->webroot; ?>Departamentos/departamentosajax',
      type: 'POST',
      data: {paisid: paisid},
    })
    .done(function(response) {
      $('#cambiodepto').html(response);
    })
    .fail(function() {
         alert("error");
    })
  }

  function changedeptotextbox (paisid) {
    $.ajax({
      url: '<?php echo $this->webroot; ?>Departamentos/departamentostextboxajax',
      type: 'POST',
      data: {paisid: paisid},
    })
    .done(function(response) {
      $('#cambiodepto').html(response);
    })
    .fail(function() {
      console.log("error");
    })
        
  }
</script>