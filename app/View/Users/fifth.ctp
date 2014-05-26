<?php
 if ($total == 100 && $read != 'disabled') {
  echo $this->Headerdefault->display(5, 1);
}else{
  echo $this->Headerdefault->display(5);
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
    <br/>
    <section class="sliderbox">
    </secction>

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
                            AYUDA: PARTE 5
                          </h3>
                        </div>
                        
                        <div class="box-content">
                          <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle open" data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                                    Formulario: Datos de recomendante<i class="icon-minus"></i>
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <p>
                                        Todos los campos son requeridos. El recomendante deber&aacute; de pertenecer a la &uacute;ltima instituci&oacute;n de educaci&oacute;n media donde realiz&oacute; sus estudios.<br/>
                                        El campo "Lugar de trabajo", se autocompleta en base a la instituci&oacute;n de procedencia ingresada previamente en la parte 1.
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

      
       <?php echo $this->Paginacion->display(5); ?>
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






          <div id="row">
            <div class="col-lg-12">
              <div style="background-color:#2E4975; color:#F9F9F9">
                <h3>
                  <span style="padding-left:10px">M.</span>RECOMENDACION
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br/><br/>
       <div class="row">
        <div class="span12">
          <p>La recomendaci&oacute;n debe ser completada por el engargado(a) de bachillerato o por un profesor(a) de matemáticas que sea tambi&eacute;n de bachillerato.</p>
        </div>
      </div>
      <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Informaci&oacute;n!</strong>  El lugar de trabajo es tomado automáticamente de la sección "D. Nombre de institución educativa de procedencia", y no puede ser agregado ni modificado desde esta sección.
      </div>
      <br/><br/>
<div class="row-fluid">              
          <div class="span12">            
            <div class="box">
             <div class="box-title">
                <h3><i class="icon-edit"></i> FORMULARIO: DATOS DE RECOMENDANTE</h3>
              </div>
              <div class="box-content">
                <form action="#" method="POST" class='form-horizontal'>
                  <?php
                  if (isset($datos[0]['recomendadores']['name'])) {
                    $nombre = $datos[0]['recomendadores']['name'];
                  }else{
                    $nombre = '';
                  }
                  ?>
                  <!-- Primer campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Nombre completo</label>
                    <div class="controls">
                      <input type="text" name="data[Recomendadore][name]" id="textfield" class="input-xlarge" value="<?php echo $nombre;?>" <?php echo $read; ?>>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['recomendadores']['name'])) {
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

                  <!-- Segundo campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Lugar de Trabajo</label>
                    <div class="controls">
                      <?php
                      if (isset($datos[0]['instituciones']['name']) && strlen(trim($datos[0]['instituciones']['name']))> 0) {
                        echo $datos[0]['instituciones']['name'];
                      }elseif (isset($datos[0]['instituciones_adicionales']['name']) && strlen(trim($datos[0]['instituciones_adicionales']['name']))> 0) {
                        echo $datos[0]['instituciones_adicionales']['name'];
                      }else{
                        echo "";
                      }
                      ?>

                    </div>
                  </div>


                  <!-- Fin Segundo campo -->

                  <!-- Tercer campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Cargo del recomendador</label>
                      <div class="controls">
                        <div class="input-xlarge">
                          <select name="data[Recomendadore][cargo_id] " id="departamento" class='chosen-select' data-placeholder="Selecciona un cargo" <?php echo $read; ?>>
                            <?php
                            if (isset($datos[0]['recomendadores']['cargo_id'])) 
                            {
                              $igual = $datos[0]['recomendadores']['cargo_id'];
                            }else{
                              $igual = 10000000000;
                            }
                            ?>
                            <option value=""></option>
                            <?php
                            foreach ($cargos as $key => $value) {
                            ?>
                            <option value="<?php echo $key; ?>" <?php echo ($igual == $key)? 'selected':'';?>><?php echo $value; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['recomendadores']['cargo_id'])) {
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
                    <label for="textfield" class="control-label">Celular</label>
                    <div class="controls">
                      <input type="text" name="data[Recomendadore][celular]" id="textfield" class="input-xlarge" value="<?php echo isset($datos[0]['recomendadores']['celular']) ? $datos[0]['recomendadores']['celular']: '';?>" <?php echo $read; ?>>
                    </div>
                  </div>
                  <?php
                  if (isset($post) && !isset($datos[0]['recomendadores']['celular'])) {
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


                 
                   <!--Quinto campo -->
                  <div class="control-group">
                    <label for="textfield" class="control-label">Correo electr&oacute;nico</label>
                    <div class="controls">
                      <input type="text" name="data[Recomendadore][email]" id="textfield" class="input-xlarge" value="<?php echo isset($datos[0]['recomendadores']['email']) ? $datos[0]['recomendadores']['email']: '';?>" <?php echo $read; ?>>
                    </div>
                  </div>
                   <?php
                  if (isset($post) && !isset($datos[0]['recomendadores']['email'])) {
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

                   <hr class="featurette-divider">
      

                 <div class="form-actions">
                    <?php if($read != 'disabled'){ ?>
                      <button type="submit" class="btn btn-primary" id="submit">Guardar</button>
                    <?php } ?>
                 </div>

                </form>
              </div>
            </div>
          </div>
  
      </div>

     

      <hr class="featurette-divider">

      <?php
        echo $this->Paginacion->display(5);
      ?>

      <!-- Site footer -->
      <div class="footer">
        <p>&copy; ESEN <?php echo date('Y'); ?></p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

