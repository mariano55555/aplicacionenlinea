$(document).ready(function(){
	 // left menu
	 $("#usuariosMenu").click(function(event){
	 	event.preventDefault();
		var link = $(this).attr('href');
		var root = $(this).attr('imgroot');
    	var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
	 });


   

    
    
    // Support for AJAX loaded modal window.
    // Focuses on first input textbox after it loads the window.

	 $("#logsMenu").click(function(event){
		event.preventDefault();
		var link = $(this).attr('href');
        var root = $(this).attr('logsroot');
    	var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
	 });

     

	 $("#accesosMenu").click(function(event){
		event.preventDefault();
		var link = $(this).attr('href');
        var root = $(this).attr('accesosroot');
    	var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
	 });

     $("#generales").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var root = $(this).attr('root');
        var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
     });

     $("#generalesgeo").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var root = $(this).attr('rootgeo');
        var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
     });


     // REPORTES
     $("#rpostulantes").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var root = $(this).attr('rpostulantesroot');
        var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
     });

      $("#rinstituciones").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var root = $(this).attr('rinstitucionesroot');
        var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
     });

      $("#ravance").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var root = $(this).attr('ravanceroot');
        var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
     });

      $("#rdepartamentos").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var root = $(this).attr('rdepartamentosroot');
        var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
     });

    $("#rcomparar").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var root = $(this).attr('rcompararroot');
        var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
     });

    $("#rproyeccion").click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var root = $(this).attr('rproyeccionroot');
        var html = '<div id="dvLoading"><img src="'+ root +'img/294.gif" class="loading"/><h4>Cargando...</h4></div>';
        $.ajax({
                type: "POST",
                url: link,
                beforeSend: function(){
                    $('#here').html(html);
                },
                success: function(respuesta) {
                       $('#here').html(respuesta);
                }
        });
     });
       



    
});

// alertas
   function confirmation (mensaje, link, target) {
    bootbox.confirm(mensaje, function(result) {
      if (result == true) {
        $.ajax({
                type: "POST",
                url: link,
                success: function(respuesta) {
                       $(target).html(respuesta);
                }
        });
      };
    });     
  }

  

  function ajaxadd(link,target) {
      $.ajax({
            url: link,
            success: function(respuesta) {
                $(target).html(respuesta);
                 $(".daterangepicker").css("z-index","9999999");
             }
        });
  }
 function ajaxsubmitaddmessage(webroot){
        $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Información!',
            // (string | mandatory) the text inside the notification
            text: 'El registro ha sido guardado exitosamente',
            image: webroot + 'img/info_48.png',
            });
    }
  function ajaxsubmiterrormessage(webroot){
    $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Error!',
        // (string | mandatory) the text inside the notification
        text: 'El registro no ha sido guardado. Intente nuevamete',
        image: webroot + 'img/warning_48.png',
    });
  }

