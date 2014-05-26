<?php

for ($i=0; $i < 6 ; $i++) 
{ 
    if (isset($datos[$i]['estudios']['institucion'])) 
    {
      $estudios['institucion'][$i] = $datos[$i]['estudios']['institucion'];
    }else{
      $estudios['institucion'][$i] = '';
    }
    if (isset($datos[$i]['estudios']['name'])) 
    {
      $estudios['name'][$i] = $datos[$i]['estudios']['name'];
    }else{
      $estudios['name'][$i] = '';
    }
    if (isset($datos[$i]['estudios']['periodo'])) 
    {
      $estudios['periodo'][$i] = $datos[$i]['estudios']['periodo'];
    }else{
      $estudios['periodo'][$i] = '';
    }
}
for ($i=0; $i < 4 ; $i++) 
{ 
    if (isset($datos[$i]['actividades']['name'])) 
    {
      $actividades['name'][$i] = $datos[$i]['actividades']['name'];
    }else{
      $actividades['name'][$i] = '';
    }
    if (isset($datos[$i]['actividades']['institucion'])) 
    {
      $actividades['institucion'][$i] = $datos[$i]['actividades']['institucion'];
    }else{
      $actividades['institucion'][$i] = '';
    }
    if (isset($datos[$i]['actividades']['fecha'])) 
    {
      $actividades['fecha'][$i] = $datos[$i]['actividades']['fecha'];
    }else{
      $actividades['fecha'][$i] = '';
    }
     if (isset($datos[$i]['actividades']['puesto'])) 
    {
      $actividades['puesto'][$i] = $datos[$i]['actividades']['puesto'];
    }else{
      $actividades['puesto'][$i] = '';
    }
    
}

$estudios1 = array();
$per1      = array();
$int1      = array();
$es1       = array();
for ($i=0; $i < count($datos) ; $i++) 
{ 
  if (isset($datos[$i]['estudios']) && isset($datos[$i]['estudios']['numero'])) 
  {

    if (in_array($datos[$i]['estudios']['numero'] ,$estudios1)) {
       # code...
     }else{
       $estudios1[] = $datos[$i]['estudios']['numero'];
       $es[]        = $datos[$i]['estudios']['name'];
       $int[]       = $datos[$i]['estudios']['institucion'];
       $per[]       = $datos[$i]['estudios']['periodo'];
     }
  }
 /* if (isset($datos[$i]['estudios']) && isset($datos[$i]['estudios']['institucion'])) 
  {

    if (in_array($datos[$i]['estudios']['institucion'] ,$int1)) {
       # code...
     }else{
       $int1[] = $datos[$i]['estudios']['institucion'];
       $int[]  = $datos[$i]['estudios']['institucion'];
     }
  }
  if (isset($datos[$i]['estudios']) && isset($datos[$i]['estudios']['periodo'])) 
  {

    if (in_array($datos[$i]['estudios']['periodo'] ,$per1)) {
       # code...
     }else{
       $per1[] = $datos[$i]['estudios']['periodo'];
       $per[]  = $datos[$i]['estudios']['periodo'];
     }
  }*/
}
$actividades1 = array();
$aint1        = array();
$afecha1      = array();
$apuesto1     = array();
for ($i=0; $i < count($datos) ; $i++) 
{ 
  if (isset($datos[$i]['actividades']) && (isset($datos[$i]['actividades']['numero']))) 
  {

     if (in_array($datos[$i]['actividades']['numero'] ,$actividades1)) {
       # code...
     }else{
        $actividades1[] = $datos[$i]['actividades']['numero'];
        $aint[]         = $datos[$i]['actividades']['institucion'];
        $aname[]        = $datos[$i]['actividades']['name'];
        $afecha[]       = $datos[$i]['actividades']['fecha'];
        $apuesto[]      = $datos[$i]['actividades']['puesto'];
     }
        

  }
   
}

if ($total == 100 && $read != 'disabled') {
  echo $this->Headerdefault->display(3, 1);
}else{
  echo $this->Headerdefault->display(3);
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
/*debug($datos);
debug($es);
debug($int);
debug($per);*/
?>
    
    <section class="sliderbox">
    </secction>


    <div class="container">

     <section class="information generic-section">
      <div class="container" id="menu-info">
          <div class="row-fluid">
              <div class="span7">
                  <img src="<?php echo $this->webroot; ?>img/campus.jpg" alt="image" style="border-radius:15px">
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
                                        En el literal A, deber&aacute;s seleccionar la carrera que deseas cursar.<br/>
                                        En el literal B, selecciona el proceso de postulaci&oacute;n.
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
                                        Es necesario completar los cuatro campos que componen el formulario. El campo de genero esta preestablecido por lo
                                        que deber&aacute; seleccionar su genero.
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
            echo $this->Paginacion->display(3);
       ?>
<br>
      <!-- Example row of columns -->
      <div id="row">
        <div class="col-lg-12">

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
      				<span style="padding-left:10px">I.</span> EVALUACION PERSONAL
      			</h3>
      		</div>
      	</div>
      </div>
      <br/><br/>
      <form action="#" method="POST" class='form-horizontal'>
      <div class="row">
        <div class="span12">
          <p>Compar&aacute;ndome con otros compañeros, me eval&uacute;o as&iacute;</p>
        </div>
      </div>
      <div class="row">
        
        <?php foreach ($evaluaciones as $key => $value) {
        ?>
          <div class="span2">
            <div class="check-line">
                <input type="radio" id="c4" class='icheck-me' name="same16" data-skin="square" data-color="blue" value="<?php echo $key; ?>" <?php echo (isset($datos[0]['aplicaciones']['evaluacion_id']) && $datos[0]['aplicaciones']['evaluacion_id'] == $key) ? 'checked ' : '' ; ?> <?php echo $read; ?>> 
                <label class='inline' for="c4"><?php echo $value; ?></label>
            </div>
          </div>
        <?php
        }
        ?>       
      </div>
      <br><br>
       <?php
          if (isset($post) && !isset($datos[0]['aplicaciones']['evaluacion_id'])) {
             $estilo = '';
          }else{
             $estilo = 'style="display:none"';
          }
       ?>
      <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

      <hr class="featurette-divider">

      <div id="row">
      	<div class="col-lg-12">
      		<div style="background-color:#2E4975; color:#F9F9F9;">
      			<h3>
      				<span style="padding-left:10px">J.</span>DATOS ACADEMICOS
      			</h3>
      		</div>
      	</div>
      </div>
      <br/><br/>
      <div class="row">
        <div class="span12">
          <p>Menciona las instituciones acad&eacute;micas donde has estudiado desde sexto grado hasta la fecha (incluyendo estudios universitarios). Si cuentas con estudios universitarios deber&aacute;s incluir las notas de los a&ntilde;os cursados.</p>
        </div>
      </div>

      <div class="row-fluid">
          <div class="span12">
            <div class="box">
              <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: DATOS ACADEMICOS</h3>
              </div>
              <div class="box-content">
                

                  <!-- Primer campo -->
                  <div class="row-fluid">
                    <div class="span12">
                      <div class="box box-color box-bordered">
                        <div class="box-title">
                          <h3>
                            <i class="icon-table"></i>
                            DATOS ACADEMICOS
                          </h3>
                        </div>
                        <div class="box-content nopadding">
                          <table class="table table-hover table-nomargin">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>INSTITUCION</th>
                                <th class='hidden-350'>GRADO</th>
                                <th class='hidden-1024'>PERIODO</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td><input type="text" name="data[Estudio][institucion][0]" class="input-large" value="<?php echo isset($int[0])? $int[0]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-350'><input type="text" name="data[Estudio][name][0]" class="input-large" value="<?php echo isset($es[0])? $es[0]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-1024'><input type="text" name="data[Estudio][periodo][0]"  class="input-large" value="<?php echo isset($per[0])? $per[0]:''; ?> " <?php echo $read; ?>></td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td><input type="text" name="data[Estudio][institucion][1]" class="input-large" value="<?php echo isset($int[1])? $int[1]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-350'><input type="text" name="data[Estudio][name][1]" class="input-large" value="<?php echo isset($es[1])? $es[1]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-1024'><input type="text" name="data[Estudio][periodo][1]"  class="input-large" value="<?php echo isset($per[1])? $per[1]:''; ?> " <?php echo $read; ?>></td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td><input type="text" name="data[Estudio][institucion][2]" class="input-large" value="<?php echo isset($int[2])? $int[2]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-350'><input type="text" name="data[Estudio][name][2]" class="input-large" value="<?php echo isset($es[2])? $es[2]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-1024'><input type="text" name="data[Estudio][periodo][2]"  class="input-large" value="<?php echo isset($per[2])? $per[2]:''; ?> " <?php echo $read; ?>></td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td><input type="text" name="data[Estudio][institucion][3]" class="input-large" value="<?php echo isset($int[3])? $int[3]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-350'><input type="text" name="data[Estudio][name][3]" class="input-large" value="<?php echo isset($es[3])? $es[3]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-1024'><input type="text" name="data[Estudio][periodo][3]"  class="input-large" value="<?php echo isset($per[3])? $per[3]:''; ?> " <?php echo $read; ?>></td>
                              </tr>
                              <tr>
                                <td>5</td>
                                <td><input type="text" name="data[Estudio][institucion][4]" class="input-large" value="<?php echo isset($int[4])? $int[4]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-350'><input type="text" name="data[Estudio][name][4]" class="input-large" value="<?php echo isset($es[4])? $es[4]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-1024'><input type="text" name="data[Estudio][periodo][4]"  class="input-large" value="<?php echo isset($per[4])? $per[4]:''; ?> " <?php echo $read; ?>></td>
                              </tr>
                              <tr>
                                <td>6</td>
                                <td><input type="text" name="data[Estudio][institucion][5]" class="input-large" value="<?php echo isset($int[5])? $int[5]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-350'><input type="text" name="data[Estudio][name][5]" class="input-large" value="<?php echo isset($es[5])? $es[5]:''; ?> " <?php echo $read; ?>></td>
                                <td class='hidden-1024'><input type="text" name="data[Estudio][periodo][5]"  class="input-large" value="<?php echo isset($per[5])? $per[5]:''; ?> " <?php echo $read; ?>></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php
                    if (isset($post) && !isset($datos[0]['estudios'])) {
                      $estilo = '';
                    }elseif (isset($post) && (!isset($datos[0]['estudios']['name']) || !isset($datos[0]['estudios']['institucion']) || !isset($datos[0]['estudios']['periodo']))) {
                      $estilo = '';
                    }
                    else{
                       $estilo = 'style="display:none"'; 
                    }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <br/><br/>

                  <!-- Primer campo -->
                   <div class="control-group">
                    <label for="textfield" class="control-label">A&ntilde;os de Bachillerato</label>
                    <div class="controls">
                      <div class="check-line">
                          <input type="radio" id="c18" class='icheck-me' name="same25" data-skin="square" data-color="blue" value="2" <?php echo (isset($datos[0]['users']['bachillerato']) && $datos[0]['users']['bachillerato'] == 2) ? 'checked ': ''; ?><?php echo $read; ?>>
                           <label class='inline' for="c18">2 a&ntilde;os</label>
                      </div>
                      <div class="check-line">
                          <input type="radio" id="c19" class='icheck-me' name="same25" data-skin="square" data-color="blue" value="3" <?php echo (isset($datos[0]['users']['bachillerato']) && $datos[0]['users']['bachillerato'] == 3) ? 'checked ': ''; ?><?php echo $read; ?>> 
                          <label class='inline' for="c19">3 a&ntilde;os</label>
                      </div>
                    </div>
                  </div>
                  <?php
                    if (isset($post) && !isset($datos[0]['users']['bachillerato'])) {
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
                    <label for="textfield" class="control-label">Ha obtenido algún tipo de beca durante sus estudios?</label>
                    <div class="controls">
                      <div class="check-line">
                          <input type="radio" id="c10" class='icheck-me' name="same55" data-skin="square" data-color="blue" value="1" <?php echo isset($datos[0]['becas']) ? 'checked ' :''; ?> <?php echo $read; ?>> 
                          <label class='inline' for="c10">Si</label>
                      </div>
                      <div class="check-line">
                          <input type="radio" id="c11" class='icheck-me' name="same55" data-skin="square" data-color="blue" value="2" <?php echo !isset($datos[0]['becas']) ? 'checked ' :''; ?> <?php echo $read; ?>>
                          <label class='inline' for="c11">No</label>
                      </div>
                    </div>
                  </div>
                   <?php
                    if (isset($post) && !isset($datos[0]['becas']) && $rbeca == 0) {
                     $estilo = '';
                    }else{
                       $estilo = 'style="display:none"';
                    }
                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

                  <div class="control-group becasver" <?php echo (isset($datos[0]['becas'])) ? '': 'style="display:none"'; ?>>
                    <label for="hermanonombre" class="control-label">Entidad que otorgo la beca:</label>
                    <div class="controls">
                      <input type="text" name="data[Beca][name]" id="hermanonombre" class="input-xlarge" value="<?php echo isset($datos[0]['becas']['name']) ? $datos[0]['becas']['name'] :''; ?> " <?php echo $read; ?>>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['becas']['name']) && isset($datos[0]['becas'])) {
                    $estilo = '';
                  }else{
                     $estilo = 'style="display:none"';
                  }

                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>

                   <div class="control-group becasver" <?php echo (isset($datos[0]['becas'])) ? '': 'style="display:none"'; ?>>
                    <label for="hermanonombre" class="control-label">Duraci&oacute;n:</label>
                    <div class="controls">
                      <input type="text" name="data[Beca][duracion]" id="hermanonombre" class="input-xlarge" value="<?php echo isset($datos[0]['becas']['duracion']) ? $datos[0]['becas']['duracion'] :''; ?> " <?php echo $read; ?>>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['becas']['duracion']) && isset($datos[0]['becas'])) {
                    $estilo = '';
                  }
                  else{
                     $estilo = 'style="display:none"';
                  }

                  ?>
                  <div class="alert alert-error" <?php echo $estilo; ?>>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
                  </div>
                  <!-- FIN Segundo campo -->

                  <!-- Tercer campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Dominio del idioma ingl&eacute;s:</label>
                    <div class="controls">
                      <div class="check-line">
                          <input type="radio" id="c20" class='icheck-me' name="same35" data-skin="square" data-color="blue" value="1" <?php echo (isset($datos[0]['users']['ingles']) && $datos[0]['users']['ingles']==1) ? 'checked ' :''; ?><?php echo $read; ?>> 
                          <label class='inline' for="c20">Nivel b&aacute;sico</label>
                      </div>
                      <div class="check-line">
                          <input type="radio" id="c21" class='icheck-me' name="same35" data-skin="square" data-color="blue" value="2" <?php echo (isset($datos[0]['users']['ingles']) && $datos[0]['users']['ingles']==2) ? 'checked ' :''; ?><?php echo $read; ?>> 
                          <label class='inline' for="c21">Nivel medio</label>
                      </div>
                      <div class="check-line">
                          <input type="radio" id="c21" class='icheck-me' name="same35" data-skin="square" data-color="blue" value="3" <?php echo (isset($datos[0]['users']['ingles']) && $datos[0]['users']['ingles']==3) ? 'checked ' :''; ?><?php echo $read; ?>> 
                          <label class='inline' for="c21">Nivel avanzado</label>
                      </div>
                    </div>
                  </div>
                   <?php
                  if (isset($post) && !isset($datos[0]['users']['ingles'])) {
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
                 <div class="control-group">
                      <label for="textfield" class="control-label">Otros idiomas:</label>
                      <div class="controls">
                        <div class="span12">
                          <?php 
                          if ($read != 'disabled') {
                          ?>
                          <input type="text" name="idiomas" id="textfield" class="tagsinput" value="<?php echo isset($datos[0]['users']['idiomas']) ? $datos[0]['users']['idiomas'] : ''; ?> ">
                          <?php
                          }else{
                            echo $datos[0]['users']['idiomas'];
                          }
                          ?>
                        </div>
                        <?php 
                        if ($read != 'disabled') {
                        ?>
                        <span class="help-block">
                          <code style="color:#007f7f !important">Escribe los idiomas separados por coma</code>
                        </span>
                        <?php
                        }
                        ?>
                      </div>
                  </div>


                  <!--fin cuarto campo -->

              </div>
            </div>
          </div>
      </div>

      <hr class="featurette-divider">

      <div id="row">
      	<div class="col-lg-12">
      		<div style="background-color:#2E4975; color:#F9F9F9">
      			<h3>
      				<span style="padding-left:10px">K.</span>ACTIVIDADES
      			</h3>
      		</div>
      	</div>
      </div>
      <br/><br/>
      <div class="row">
        <div class="span12">
          <p>Menciona las actividades extracurriculares que has realizado como trabajo, deportes, pertenencia a clubes u organizaciones de servicio, as&iacute; como honores y reconocimientos logrados.</p>
        </div>
      </div>
       <div class="row-fluid">
          <div class="span12">
            <div class="box box-color box-bordered">
              <div class="box-title">
                <h3>
                  <i class="icon-table"></i>
                 CUADRO DE ACTIVIDADES
                </h3>
              </div>
              <div class="box-content nopadding">
                <table class="table table-hover table-nomargin">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ACTIVIDAD</th>
                      <th class='hidden-350'>INSTITUCION</th>
                      <th class='hidden-1024'>FECHA</th>
                      <th class='hidden-480'>HONOR/PUESTO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><input type="text" name="data[Actividade][name][0] " id="textfield" class="input-large" value="<?php echo isset($aname[0])?$aname[0]:''; ?> " <?php echo $read; ?>></td>
                      <td class='hidden-350'><input type="text" name="data[Actividade][institucion][0]" id="textfield" class="input-large" value="<?php echo isset($aint[0])?$aint[0]:''; ?> " <?php echo $read; ?>></td>
                      <td class='hidden-1024'><input type="text" name="data[Actividade][fecha][0] " id="textfield" class="input-large" value="<?php echo isset($afecha[0]) ? $afecha[0] : ''; ?> " <?php echo $read; ?> ></td>
                      <td class='hidden-480'><input type="text" name="data[Actividade][puesto][0]" id="textfield" class="input-large" value="<?php echo isset($apuesto[0]) ? $apuesto[0] :''; ?> " <?php echo $read; ?> ></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><input type="text" name="data[Actividade][name][1] " id="textfield" class="input-large" value="<?php echo isset($aname[1])?$aname[1]:''; ?> " <?php echo $read; ?>></td>
                      <td class='hidden-350'><input type="text" name="data[Actividade][institucion][1]" id="textfield" class="input-large" value="<?php echo isset($aint[1])?$aint[1]:''; ?> " <?php echo $read; ?>></td>
                      <td class='hidden-1024'><input type="text" name="data[Actividade][fecha][1] " id="textfield" class="input-large" value="<?php echo isset($afecha[1]) ? $afecha[1] : ''; ?> " <?php echo $read; ?> ></td>
                      <td class='hidden-480'><input type="text" name="data[Actividade][puesto][1] " id="textfield" class="input-large" value="<?php echo isset($apuesto[1]) ? $apuesto[1] :''; ?> " <?php echo $read; ?> ></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>
                        <input type="text" name="data[Actividade][name][2] " id="textfield" class="input-large" value="<?php echo isset($aname[2])?$aname[2]:''; ?>" <?php echo $read; ?>>
                      </td>
                      <td class='hidden-350'>
                        <input type="text" name="data[Actividade][institucion][2]" id="textfield" class="input-large" value="<?php echo isset($aint[2])?$aint[2]:''; ?>" <?php echo $read; ?>>
                      </td>
                      <td class='hidden-350'>
                        <input type="text" name="data[Actividade][fecha][2]" id="textfield" class="input-large" value="<?php echo isset($afecha[2]) ? $afecha[2] : ''; ?>" <?php echo $read; ?> >
                      </td>
                      <td class='hidden-480'>
                        <input type="text" name="data[Actividade][puesto][2] " id="textfield" class="input-large" value="<?php echo isset($apuesto[2]) ? $apuesto[2] :''; ?>" <?php echo $read; ?> >
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><input type="text" name="data[Actividade][name][3] " id="textfield" class="input-large" value="<?php echo isset($aname[3])?$aname[3]:''; ?>" <?php echo $read; ?>></td>
                      <td class='hidden-350'><input type="text" name="data[Actividade][institucion][3]" id="textfield" class="input-large" value="<?php echo isset($aint[3])?$aint[3]:''; ?>"<?php echo $read; ?>></td>
                      <td class='hidden-1024'><input type="text" name="data[Actividade][fecha][3] " id="textfield" class="input-large" value="<?php echo isset($afecha[3]) ? $afecha[3] : ''; ?> "<?php echo $read; ?> ></td>
                      <td class='hidden-480'><input type="text" name="data[Actividade][puesto][3] " id="textfield" class="input-large" value="<?php echo isset($apuesto[3]) ? $apuesto[3] :''; ?> "<?php echo $read; ?> ></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
                <?php
                  if (isset($post) && !isset($datos[0]['actividades'])) {
                    $estilo = '';
                  }elseif (isset($post) && (!isset($datos[0]['actividades']['name']) || !isset($datos[0]['actividades']['institucion']) || !isset($datos[0]['actividades']['fecha']) || !isset($datos[0]['actividades']['puesto']))) {
                    $estilo = '';
                  }
                  else{
                     $estilo = 'style="display:none"';
                  }

                  ?>
         <div class="alert alert-error" <?php echo $estilo; ?>>
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
          </div>
        <br/><br/>
        <div class="row">
            <div class="span12">
              Describe cu&aacute;l de estas actividades (extracurriculares, personales o de trabajo) ha tenido m&aacute;s significado para ti, y por qu&eacute;.
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
              <div class="box">
                <div class="box-title">
                  <h3><i class="icon-edit"></i> ACTIVIDADES</h3>
                </div>
                <div class="box-content nopadding">
                  <div  class='form-wysiwyg'>
                    <textarea name="ck" rows="5" class='span12' id="editor" <?php echo $read; ?>><?php echo isset($datos[0]['aplicaciones']['actividad']) ? $datos[0]['aplicaciones']['actividad']:''; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <?php
              if (isset($post) && !isset($datos[0]['aplicaciones']['actividad'])) {
                $estilo = "";
              }elseif (isset($post) && strlen(trim($datos[0]['aplicaciones']['actividad'])) == 0){
                $estilo = "";
              }
              else{
                $estilo = "style='display:none'";
              }
          ?>
          <div class="alert alert-error" <?php echo $estilo; ?>>
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
          </div>
      
      <hr class="featurette-divider">
      <?php 
      if ($read != 'disabled') {
      ?>
      <div class="form-actions">
          <button type="submit" class="btn btn-primary" id="submit">Guardar</button>
      </div>
      <?php
      }
      ?>
      </form>
      <hr class="featurette-divider">
      <?php
        echo $this->Paginacion->display(3);
      ?>
      
  
      <!-- Site footer -->
      <div class="footer">
        <p>&copy; ESEN <?php echo date('Y'); ?></p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script>
    //CKEDITOR.replace('editor');
</script>


<script type="text/javascript">
 $( "input:radio[name=same55]" ).change(function(event) {
        var becas = $( "input:radio[name=same55]:checked" ).val();
        if (becas == 1) {
          $('.becasver').show('400', function() {
            
          });
        }else{
          $('.becasver').hide('400', function() {
            
          });
        }
    });
</script>
