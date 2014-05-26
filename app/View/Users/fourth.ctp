<?php
echo $this->Html->script('plugins/ckeditor/ckeditor');
if ($total == 100 && $read != 'disabled') {
  echo $this->Headerdefault->display(4, 1);
}else{
  echo $this->Headerdefault->display(4);
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

<script type="text/javascript">
      var info;
      $(document).ready(function(){
        var options = {
          'maxCharacterSize': -2,
          'originalStyle': 'originalTextareaInfo',
          'warningStyle' : 'warningTextareaInfo',
          'warningNumber': 40,
          'displayFormat': '#input caracteres | #words palabras'
        };
        $('#editor1').textareaCount(options);

      });
</script>
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
                            AYUDA: PARTE 4
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

      
       <?php
            echo $this->Paginacion->display(4);
          ?>

<br>
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
      <form action="#" method="POST" class='form-horizontal'>
       <div id="row">
            <div class="col-lg-12">
              <div style="background-color:#2E4975; color:#F9F9F9">
                <h3>
                  <span style="padding-left:10px">L.</span>ENSAYO
                </h3>
              </div>
            </div>
          </div>
      <br/><br/>
      <div class="row">
        <div class="span12">
          <p>Instrucciones</p>
          <p>Elije uno de los dos temas de ensayo y desarróllalo en el espacio asignado.</p>
        </div>
      </div>
      <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Informaci&oacute;n!</strong> No hay l&iacute;mite de tiempo para escribir el ensayo. Recuerda que puedes guardarlo y continuar posteriormente. El ensayo debe contener como m&iacute;nimo 200 y m&aacute;ximo 250 palabras, de lo contrario no se validar&aacute; como completado.
      </div>
      <br/><br/>
      <?php 
      for ($i=0; $i < count($temas) ; $i++) { 
      ?>
         <div class="row">
            <div class="span12">
              <p><?php echo $temas[$i]['temas']['name']; ?> </p>
              <p>
                <?php echo $temas[$i]['temas']['contenido']; ?>
              </p>
            </div>
          </div>
          <br/><br/>
      <?php
      }
      ?>
     
        <div class="row">
            <div class="span3">
              Tema del ensayo
            </div>
            <?php 
            if (isset($datos[0]['aplicaciones']['tema_id'])) {
              $igual = $datos[0]['aplicaciones']['tema_id'];
            }else{
              $igual = 99999999;
            }
            for ($i=0; $i < count($temas) ; $i++) 
            {
            ?>
            <div class="span3">
              <div class="check-line">
                  <input type="radio" class='icheck-me c7' name="same23" data-skin="square" data-color="blue" value="<?php echo $temas[$i]['temas']['id']; ?>" <?php echo ($temas[$i]['temas']['id']== $igual) ? "checked" : ""; ?> <?php echo $read; ?>> 
                  <label class='inline' for="c7">
                    <?php echo $temas[$i]['temas']['name']; ?>
                  </label>
              </div>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        if (isset($post) && !isset($datos[0]['aplicaciones']['tema_id'])) {
          $estilo = '';
        }else{
          $estilo = 'style="display:none"';
        }
        ?>
        <div class="alert alert-error" <?php echo $estilo; ?>>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
        </div>
        <div class="row-fluid">
            <div class="span12">
              <div class="box">
                <div class="box-title">
                  <h3><i class="icon-edit"></i> ENSAYO</h3>
                </div>
                <div class="box-content nopadding">
                  <div>
                    <textarea name="ck1" class='span12' rows="5" id="editor1" <?php echo $read; ?>><?php  if (isset($datos[0]['aplicaciones']['ensayo']) && strlen(trim($datos[0]['aplicaciones']['ensayo'])) > 0) { echo trim($datos[0]['aplicaciones']['ensayo']); } ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        if (isset($post) && !isset($datos[0]['aplicaciones']['ensayo'])) {
          $estilo = '';
        }else{
          $estilo = 'style="display:none"';
        }
        ?>
        <div class="alert alert-error" <?php echo $estilo; ?>>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Completa la informaci&oacute;n!</strong> Campo requerido.
        </div>
        <?php
        if (isset($post) && isset($cuenta)) {
          if ($cuenta < 200 || $cuenta > 250 || $cuenta == 0) {
              $estilo = '';
          }else{
              $estilo = 'style="display:none"';
          }
        }else{
          $estilo = 'style="display:none"';
        }
        ?>

        <div class="alert alert-error" <?php echo $estilo; ?>>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Invalido!</strong> Ensayo no cumple con el rango permitio de palabras. N&uacute;mero de palabras: <?php echo isset($cuenta) ? $cuenta : ''; ?>
        </div>

       <hr class="featurette-divider">
                 <?php if($read != 'disabled'){ ?>
                 <div class="form-actions">
                      <button type="submit" class="btn btn-primary" id="submit">Guardar</button>
                 </div>
                 <?php } ?>
        </form>
      <hr class="featurette-divider">

      <?php
        echo $this->Paginacion->display(4);
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
    //CKEDITOR.replace('editor1');
</script>

