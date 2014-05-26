<label for="data[Otraubicacione][name]" class="control-label">Ciudad</label>
<div class="controls">
	<input type="text" name="data[Otraubicacione][name]" id="nombreubicacion" class="input-xlarge">
</div>

<script type="text/javascript">
  $(document).ready(function() {

   // procesos para la parte E de hermanos

    $( "input:radio[name=same10]" ).change(function(event) {
        var responsable = $( "input:radio[name=same10]:checked" ).val();
        if (responsable == 4) {
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