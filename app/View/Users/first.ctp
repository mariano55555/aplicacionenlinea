<?php
if (isset($datos[0]["users"]["nacimiento"]) && !empty($datos[0]["users"]["nacimiento"])) 
{
    $custom_date                     = str_replace("/", "-", trim($datos[0]["users"]["nacimiento"]));
    $datos[0]["users"]["nacimiento"] = DateTime::createFromFormat("Y-m-d", $custom_date)->format("d/m/Y");

}else{
   $datos[0]["users"]["nacimiento"] = '';
}

if ($total == 100 && $read != 'disabled') {
  echo $this->Headerdefault->display(1, 1);
}else{
  echo $this->Headerdefault->display(1);
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

  


      <br>
      <section class="sliderbox">
      </secction>

<?php
//debug($datos);
?>
    <div class="container">

       <!-- information -->
     <section class="information generic-section">
      <div class="container" id="menu-info">
          <div class="row-fluid">
              <div class="span5 offset2">
                  <img src="<?php echo $this->webroot; ?>img/info-image.png" alt="image">
                </div>
                <div class="span5">
                    <div class="box">
                        <div class="box-title">
                          <h3>
                            <i class="icon-reorder"></i>
                            AYUDA: PARTE 1
                          </h3>
                        </div>
                        
                        <div class="box-content">
                          <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle open" data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                                    Carrera y proceso <i class="icon-minus"></i>
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <p>
                                        En el literal A, deber&aacute; seleccionar la carrera que desea cursar.<br/>
                                        En el literal B, seleccione el proceso de postulaci&oacute;n.
                                     </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                    Formulario: Datos personales <i class="icon-plus"></i>
                                </a>
                            </div>
                            <div id="collapse2" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>
                                        Es necesario completar los cuatro campos que componen el formulario. El campo de g&eacute;nero esta preestablecido por lo que deber&aacute; seleccionar su g&eacute;nero, en caso de no ser el valor preconfigurado.
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
            echo $this->Paginacion->display(1);
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
        
      
      <!-- aca comienza el formulaario -->
      <!--<form action="#" method="POST" class='form-horizontal'>-->

      <div id="row">
        <div class="col-lg-12">
          <div style="background-color:#2E4975; color:#F9F9F9">
            <h3>
              <span style="padding-left:10px">A.</span>CARRERA QUE DESEA CURSAR
            </h3>
          </div>
        </div>
      </div>
      <br/>
       <form action="#" method="POST" class='form-horizontal'>
      <div class="row-fluid">
        <?php
        foreach ($carreras as $key => $value) {
           if (isset($datos[0]['aplicaciones']['carrera_id'])) 
            {
              $carreraid = $datos[0]['aplicaciones']['carrera_id'];
            }else{
              $carreraid = 0;
            }
        ?>
           <div class="span4">
            <div class="check-line">
                <input type="radio" class='icheck-me c4' name="same2" data-skin="square" data-color="blue" value="<?php echo $key; ?>"  <?php echo ($carreraid == $key) ? "checked" : ""; ?> <?php echo $read; ?>> 
                <label class='inline' for="c4"><?php echo $value; ?></label>
            </div>
          </div>
        <?php
        }
        ?>
        
      </div>
      <?php
      if (isset($post) && !isset($datos[0]['aplicaciones']['carrera_id'])) {
         $estilo = '';
      }else{
         $estilo = 'style="display:none"';
      }
      ?>
      <div class="row" <?php echo $estilo; ?>>
        <div class="alert alert-error" style="margin-left:25px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Completa la secci&oacute;n!</strong> Campo requerido.
        </div>
      </div>
        

      <hr class="featurette-divider">

      <div id="row">
      	<div class="col-lg-12">
      		<div style="background-color:#2E4975; color:#F9F9F9">
      			<h3>
      				<span style="padding-left:10px">B.</span>PROCESO AL QUE DESEA POSTULAR
      			</h3>
      		</div>
      	</div>
      </div>
      <br/>
      <div class="row">
        <?php 
        foreach ($procesos as $key => $value) { 
          if (isset($datos[0]['aplicaciones']['proceso_id'])) 
          {
            $procesoid = $datos[0]['aplicaciones']['proceso_id'];
          }else{
            $procesoid = 0;
          }
        ?>

          <div class="span4">
            <div class="check-line">
                <input type="radio" class='icheck-me c7' name="same3" data-skin="square" data-color="blue" value="<?php echo $key; ?>"  <?php echo ($procesoid == $key) ?"checked" : ""; ?> <?php echo $read; ?>> 
                <label class='inline' for="c7">
                  <?php echo $value; ?>  
                </label>
            </div>
          </div>
        <?php } ?>
      </div>
      <?php
          if (isset($post) && !isset($datos[0]['aplicaciones']['proceso_id'])) {
             $estilo = '';
          }else{
             $estilo = 'style="display:none"';
          }
          ?>
      <div class="row" <?php echo $estilo; ?>>
        <div class="alert alert-error" style="margin-left:25px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Completa la secci&oacute;n!</strong> Campo requerido.
        </div>
      </div>

      <hr class="featurette-divider">

      <div id="row">
      	<div class="col-lg-12">
      		<div style="background-color:#2E4975; color:#F9F9F9">
      			<h3>
      				<span style="padding-left:10px">C.</span>DATOS PERSONALES
      			</h3>
      		</div>
      	</div>
      </div>
      <div class="row-fluid">
          <div class="span12">
            <div class="box">
              <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: DATOS PERSONALES</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>
                  <!-- Primer campo -->
                  <div class="control-group">
                    <label for="nombrecompleto" class="control-label">Nombre completo</label>
                    <div class="controls">
                      <input type="text" name="nombrecompleto" id="nombrecompleto" class="input-xlarge" value="<?php echo $datos[0]['users']['name']; ?>" <?php echo $read; ?>>
                    </div>
                  </div>
                   <?php
                    if (isset($post) && !isset($datos[0]['users']['name']) && strlen(trim($datos[0]['users']['name'])) == 0) {
                       $estilo = '';
                    }else{
                       $estilo = 'style="display:none"';
                    }
                    ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- Fin Primer campo -->

                  <!-- Segundo campo -->
                  <div class="control-group">
                    <label for="same5" class="control-label">Sexo</label>
                    <div class="controls">
                      <div class="check-line">
                          <input type="radio" id="c10" class='icheck-me' name="same5" data-skin="square" value="1" data-color="blue" <?php echo ($datos[0]['users']['genero'] == 1) ? 'checked':''; ?> <?php echo $read; ?>> <label class='inline' for="c10">Masculino</label>
                      </div>
                      <div class="check-line">
                          <input type="radio" id="c11" class='icheck-me' name="same5" data-skin="square" value="0" data-color="blue" <?php echo ($datos[0]['users']['genero'] == 0) ? 'checked':''; ?> <?php echo $read; ?>> <label class='inline' for="c11">Femenino</label>
                      </div>
                    </div>
                  </div>

                  <!-- FIN Segundo campo -->
                  
                  <!-- Tercer campo -->
                  <div class="control-group">
                    <label for="nacimiento" class="control-label">Fecha de nacimiento</label>
                    <?php
                    if ($read == 'disabled') {
                    ?>
                      <div class="controls">
                              <input class="input-medium" name="nacimiento" type="text" value ='<?php echo $datos[0]["users"]["nacimiento"]; ?>' readonly>
                      </div>
                    <?php
                    }else{
                    ?>
                      <div class="controls">
                          <div class="input-append date" id="dp3" data-date-format="dd/mm/yyyy" data-date="<?php echo date('d/m/Y', strtotime("-18 year")); ?>">
                            <input class="input-medium" name="nacimiento" type="text" value ='<?php echo $datos[0]["users"]["nacimiento"]; ?>' readonly>
                            <span class="add-on"><i class="icon-calendar"></i></span>
                          </div>
                      </div>

                    <?php
                    }
                    ?>
                  </div>
                   <?php
                    if (isset($post) && strlen(trim($datos[0]["users"]["nacimiento"])) == 0) {
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

                  <!-- Cuarto campo -->
                  <?php
                  if (isset($datos[0]['users']['pais_id'])) {
                    $paisid = $datos[0]['users']['pais_id'];
                  }else{
                    $paisid = 9874561;
                  }

                  ?>
                  <div class="control-group">
                    <label for="selectnacionalidad" class="control-label">Nacionalidad</label>
                      <div class="controls">
                        <div class="input-xlarge">
                          <select name="selectnacionalidad" id="selectnacionalidad" class='chosen-select' data-placeholder="Selecciona un pais" <?php echo $read; ?>>
                            <option value=""></option>
                            <?php foreach($pais as $key => $value){ ?>
                            <option value="<?php echo $key; ?>" <?php echo($paisid == $key) ? 'selected' : '' ?>><?php echo $value; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <?php
                    if (isset($post) && !isset($datos[0]['users']['pais_id'])) {
                       $estilo = '';
                    }else{
                       $estilo = 'style="display:none"';
                    }
                    ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

                  <!--fin cuarto campo -->

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
      				<span style="padding-left:10px">D.</span>NOMBRE DE INSTITUCION EDUCATIVA DE PROCEDENCIA
      			</h3>
      		</div>
      	</div>
      </div>
      <div class="row-fluid">
          <div class="span12">
            <div class="box">
              <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: EDUCACION MEDIA</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>
                  
                  <!--Primer campo -->

                  <?php
                  if (isset($datos[0]['instituciones_adicionales']['pais_id'])) {
                    $paisinstitucionid = $datos[0]['instituciones_adicionales']['pais_id'];
                  }elseif(isset($datos[0]['instituciones']['pais_id'])){
                    $paisinstitucionid = $datos[0]['instituciones']['pais_id'];
                  }else{
                    $paisinstitucionid = 9874561;
                  }
                  ?>
                  <div class="control-group">
                    <label for="select2" class="control-label">Pa&iacute;s de la Instituci&oacute;n de procedencia</label>
                      <div class="controls">
                        <div class="input-xlarge">
                          <select name="select2" id="select2" class='chosen-select' data-placeholder="Selecciona un pais" <?php echo $read; ?>>
                            <option value=""></option>
                            <?php foreach($pais as $key => $value){ ?>
                            <option value="<?php echo $key; ?>" <?php echo ($paisinstitucionid == $key) ? "selected" : ''; ?>><?php echo $value; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                  </div>
                   <?php
                    if ((isset($post) && $paisinstitucionid == 9874561)) {
                       $estilo = '';
                    }else{
                       $estilo = 'style="display:none"';
                    }
                    ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- Fin del primer campo -->

                  <!--Segundo campo -->
                  <?php
                  if (isset($datos[0]['users']['institucion_id'])) {
                    $institucionid = $datos[0]['users']['institucion_id'];
                  }else{
                    $institucionid = 9874561;
                  }


                  if (isset($datos[0]['instituciones_adicionales']['name'])) {
                     $estilo = 'style="display:none"';
                  }else{
                     $estilo = "";
                  }
                  ?>
                  <div class="control-group" id="nombreelsalvador" <?php echo $estilo; ?>>
                    <label for="select3" class="control-label">Instituci&oacute;n de procedencia</label>
                      <div class="controls" id="comboinstituciones">
                        <div class="input-xlarge">
                          <select name="select3" id="select3" class='chosen-select' data-placeholder="Selecciona una instituci&oacute;n" <?php echo $read; ?>>
                            <option value=""></option>
                            <?php foreach($instituciones as $key => $value) {
                              if ($key == $institucionid) {
                            ?>
                            <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php }
                              } ?>
                          </select>
                        </div>
                      </div>
                  </div>

                    <?php
                    if (isset($post) && !isset($datos[0]['users']['institucion_id']) && !isset($datos[0]['instituciones_adicionales']['pais_id'])) {
                       $estilo = '';
                    }else{
                       $estilo = 'style="display:none"';
                    }
                    ?>

                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- Fin del segundo campo -->

                  <!--Tercer campo -->
                  <?php
                   if (isset($datos[0]['instituciones_adicionales']['pais_id'])) {
                     $estilo = "";
                  }else{
                    $estilo = 'style="display:none"';
                  }
                  ?>

                  <div>
                        <div class="control-group" <?php echo $estilo; ?> id="nombrecasocontrario">
                          <label for="nombreinstitucion" class="control-label">Nombre de la instituci&oacute;n</label>
                          <div class="controls">
                            <input type="text" name="nombreinstitucion" id="nombreinstitucion" class="input-xlarge" value="<?php echo isset($datos[0]['instituciones_adicionales']['name']) ? trim($datos[0]['instituciones_adicionales']['name']): ''; ?>" <?php echo $read; ?>>
                          </div>
                        </div>

                        <?php
                         if (isset($post) &&  !isset($datos[0]['instituciones_adicionales']['name']) && isset($datos[0]['instituciones_adicionales'])) {
                           $estilo = "";
                        }else{
                          $estilo = 'style="display:none"';
                        }
                        ?>

                        <div class="alert alert-error" <?php echo $estilo; ?> id="alertanombreinstitucion">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                        </div>

                  </div>
                  <!--Fin tercer campo -->

                   <!--cuarto campo -->
                  <?php
                  if (isset($datos[0]['aplicaciones']['examen_id'])) {
                    $examenid = $datos[0]['aplicaciones']['examen_id'];
                  }else{
                    $examenid = 9874561;
                  }
                  ?>

                  <div class="control-group">
                    <label for="same6" class="control-label">Tipo de examen</label>
                    <?php foreach($examenes as $key => $value) { ?>
                          <div class="span2">
                            <div class="check-line">
                                <input type="radio" class='icheck-me c12' name="same6" data-skin="square" data-color="blue" value="<?php echo $key; ?>" <?php echo ($examenid == $key) ? 'checked' : ''; ?> <?php echo $read; ?>> 
                                  <label class='inline' for="c12"><?php echo $value ?></label>
                            </div>
                          </div>
                    <?php } ?>
                  </div>

                  <?php
                    if (isset($post) && !isset($datos[0]['aplicaciones']['examen_id'])) {
                      $estilo = "";
                    }
                    else{
                       $estilo = 'style="display:none"';
                    }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!--Fin cuarto campo -->


                  <?php
                  if (isset($datos[0]['aplicaciones']['examen_id']) && $datos[0]['aplicaciones']['examen_id'] != 1) 
                  {
                      $estilo = "";
                   }else{
                       $estilo = 'style="display:none"';
                    }
                  ?>

                  <!--Quinto campo -->
                  <div class="control-group" <?php echo $estilo; ?> id="calificacionotra">
                    <label for="calificacion" class="control-label">Calificaci&oacute;n obtenida</label>
                    <div class="controls">
                      <input type="text" name="calificacion" id="calificacion" class="input-xlarge" value="<?php echo isset($datos[0]['aplicaciones']['calificacion']) ? $datos[0]['aplicaciones']['calificacion'] : ''; ?>" <?php echo $read; ?>>
                    </div>
                  </div>
                  
                  <?php
                     if (isset($post) && $datos[0]['aplicaciones']['examen_id'] != 1 && !isset($datos[0]['aplicaciones']['calificacion']) && isset($datos[0]['aplicaciones']['examen_id'])) {
                      $estilo = "";
                     }else{
                      $estilo = 'style="display:none"';
                     }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

                   <!--Fin quinto campo -->



                  <!--Sexto campo -->
                  <p>Si se encuentra dentro de un programa especial de estudios, por favor indique la sede:</p>

                  <?php
                  if (isset($datos[0]['users']['superate_id'])) {
                    $superateid = $datos[0]['users']['superate_id'];
                  }else{
                    $superateid = 9874561;
                  }
                  ?>

                  <div class="control-group">
                    <label for="select4" class="control-label">Programa</label>
                      <div class="controls">
                        <div class="input-xlarge">
                          <select name="select4" id="select4" class='chosen-select' data-placeholder="Selecciona una opci&oacute;n" <?php echo $read; ?>>
                            <option value=""></option>
                            <?php foreach($superates as $key => $value) { ?>
                            <option value="<?php echo $key; ?>" <?php echo ($key == $superateid) ? 'selected' : ''; ?>><?php echo $value; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <?php
                     if (isset($post) && !isset($datos[0]['users']['superate_id'])) {
                      $estilo = "";
                     }else{
                      $estilo = 'style="display:none"';
                     }
                  ?>
                   <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

                  <!--Fin sexto campo -->


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
      				<span style="padding-left:10px">E.</span>¿TIENE ALG&Uacute;N HERMANO ESTUDIANTE O GRADUADO DE LA ESEN?
      			</h3>
      		</div>
      	</div>
      </div>
       <div class="row-fluid">
          <div class="span12">
            <div class="box">
              <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: HERMANO</h3>
              </div>
              <div class="box-content">
                <div class='form-horizontal'>
                  
                  <div class="control-group">
                    <!--<label for="textfield" class="control-label">Tipo de examen realizado</label>-->
                      <div class="span2">
                        <div class="check-line">
                            <input type="radio" id="c15" class='icheck-me' name="same7" data-skin="square" data-color="blue" value="1" <?php echo isset($datos[0]['hermanos']) ? 'checked' :''; ?> <?php echo $read; ?>> 
                            <label class='inline' for="c15">SI</label>
                        </div>
                      </div>
                      <div class="span2">
                        <div class="check-line">
                            <input type="radio" id="c16" class='icheck-me' name="same7" data-skin="square" data-color="blue" value="2" <?php echo !isset($datos[0]['hermanos']) ? 'checked' :''; ?> <?php echo $read; ?>> 
                            <label class='inline' for="c16">NO</label>
                        </div>
                     </div>
                  </div>

                  <!-- PRIMER CAMPO DE HERMANO -->
                  <div class="control-group hermanosver" <?php echo isset($datos[0]['hermanos']) ? '' :'style="display:none"'; ?>>
                    <label for="hermanonombre" class="control-label">Nombre del hermano</label>
                    <div class="controls">
                      <input type="text" name="hermanonombre" id="hermanonombre" class="input-xlarge" value="<?php echo isset($datos[0]['hermanos']['name']) ? $datos[0]['hermanos']['name'] :''; ?>" <?php echo $read; ?>>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['hermanos']['name']) && isset($datos[0]['hermanos'])) {
                    $estilo = '';
                  }else{
                     $estilo = 'style="display:none"';
                  }

                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- FIN PRIMER CAMPO DE HERMANO -->

                  <!-- sEGUNDO CAMPO DE HERMANO -->
                  <?php
                  if (isset($datos[0]['hermanos']['year'])) {
                    $anioid = $datos[0]['hermanos']['year'];
                  }else{
                    $anioid = 9874561;
                  }
                  ?>
                  <div class="control-group hermanosver" <?php echo isset($datos[0]['hermanos']) ? '' :'style="display:none"'; ?>>
                    <label for="textfield" class="control-label">A&ntilde;o de estudio</label>
                      <div class="controls">
                        <div class="input-xlarge">
                          <select name="select5" id="select5" class='chosen-select' data-placeholder="Selecciona una opci&oacute;n" <?php echo $read; ?>>
                            <option value=""></option>
                            <?php for($i=date('Y'); $i >= 1994; $i--){ ?>
                            <option value="<?php echo $i; ?>"<?php echo ($anioid == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                  </div>
                   <?php
                  if (isset($post) && !isset($datos[0]['hermanos']['year']) && isset($datos[0]['hermanos'])) {
                    $estilo = '';
                  }else{
                     $estilo = 'style="display:none"';
                  }

                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- SEGUNDO CAMPO DE HERMANO -->
                  <?php 
                  if ($read != "disabled") {
                  ?>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary" id="submit">Guardar</button>
                  </div>
                  <?php 
                  }
                  ?>            
                  </div>
                </form>

              

              </div>
            </div>
          </div>
      </div>
      
       <hr class="featurette-divider">
    
      <?php
        echo $this->Paginacion->display(1);
      ?>

     <div class="footer">
        <p>&copy; ESEN <?php echo date('Y'); ?></p>
      </div>


    </div> <!-- /container -->

 <!-- Site footer -->
      
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript">
  $(document).ready(function() {

   //capturar el pais id para buscar el departamento
   $('#select2').change(function(event) {
    var valor = $(this).val();
    var link = '<?php echo $this->webroot; ?>Instituciones/findbyPais/' + valor;
          $.ajax({
            url: link,
          })
          .done(function(respuesta) {
            if (respuesta == 0) {
              $('#nombreelsalvador').hide('fast', function() {
            
              });
              $('#nombrecasocontrario').show('fast', function() {
            
              });
            } else{
               $('#nombreelsalvador').show('fast', function() {
            
              });
              $('#nombrecasocontrario').hide('fast', function() {
            
              });
              $('#comboinstituciones').html(respuesta);
            };
          })
          .fail(function() {
            alert("No se cargaron los datos.Intente Nuevamente o comuniquenos el error");
          })
          
   });



    // procesos para la parte E de hermanos

    $( "input:radio[name=same7]" ).change(function(event) {
        var hermanos = $( "input:radio[name=same7]:checked" ).val();
        if (hermanos == 1) {
          $('.hermanosver').show('400', function() {
            
          });
        }else{
          $('.hermanosver').hide('400', function() {
            
          });
        }
    });

    // SI EL EXAMEN NO ES PAA. DESPLEGAR INPUT PARA INTRODUCIR DATA

   $( "input:radio[name=same6]" ).change(function(event) {
        var examen = $( "input:radio[name=same6]:checked" ).val();
        if (examen == 1) {
          $('#calificacionotra').hide('400', function() {
            
          });
        }else{
          $('#calificacionotra').show('400', function() {
            
          });
        }
    });

  });
</script>
    
    

