<script type="text/javascript">
$(document).ready(function() {
	$('#generar').click(function(event) {
		var proceso = $('#selectprocesodepto').val();
		var anio    = $('#selectaniodepto').val();

		$.ajax({
			url: '<?php echo $this->webroot; ?>admin/Aplicaciones/rdepartamentosgrid',
			type: 'POST',
			data: {proceso: proceso, anio: anio},
		})
		.done(function(response) {
			$('#subgriddepartamentos').html(response);
		})
		.fail(function() {
			alert("No se pudieron cargar los datos, consulte con el depto técnico");
		})
			
	});
});
</script>


				<?php
				echo $this->Header->display("DEPARTAMENTOS / CIUDADES POR PERIODO");
				echo $this->Breadcrumb->create(array(
					array(
						'title' => 'Dashboard',
						'url' => array('controller' => 'Users','action' => 'dashboard'),
						'class' => ''
					),
					array(
						'title' => 'Departamentos / Ciudades por período',
						'url' => array('controller' => 'Users','action' => 'index'),
						'class' => 'current'
					)
					)
				   );
				 ?>
				<br><br>
				<div class="row-fluid">
				<div class="span12">
							<div class="box box-color box-bordered">
								<div class="box-title">
									<h3><i class="icon-th-list"></i>REPORTE</h3>
								</div>
								<div class="box-content nopadding">
									<form action="#" method="POST" class='form-horizontal form-bordered' enctype='multipart/form-data'>
										<div class="control-group">
											<label for="textfield" class="control-label">Selecciona A&ntilde;o</label>
											<div class="controls">
												<div class="input-xlarge">
													<select name="select" id="selectaniodepto" class='chosen-select' data-placeholder="Selecciona un año">
														<option value="0"></option>
														<?php
														for ($i=date("Y"); $i >= $anio ; $i--) { 
														?>
															<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label for="textfield" class="control-label">Selecciona Proceso</label>
											<div class="controls">
												<div class="input-xlarge">
													<select name="select" id="selectprocesodepto" class='chosen-select' data-placeholder="Selecciona un proceso">
														<option value="0"></option>
														<?php foreach ($procesos as $key => $value) { ?>
															<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
														<?php } ?>
														<option value="999999">Todos</option>
													</select>
											</div>
											</div>
										</div>
										<div class="form-actions">
											<button type="button" class="btn btn-primary" id="generar">Generar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
</div>

<div id="subgriddepartamentos"></div>