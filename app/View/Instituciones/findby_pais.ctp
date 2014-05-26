<div class="input-xlarge">
	<select name="select3" id="select3" class='chosen-select' data-placeholder="Selecciona una instituci&oacute;n">
    	<option value=""></option>
    	<?php foreach($instituciones as $key => $value){ ?>
		<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
    	<?php } ?>
    </select>
</div>
<script type="text/javascript">
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
   $("#alertanombreinstitucion").hide();
</script>