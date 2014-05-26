<script type="text/javascript">
//$(document).ready(function() {
	$('#generar').click(function(event) {
		var proceso  = $('#selectprocesoavance').val();
		var anio1    = $('#selectaniouno').val();
		var anio2    = $('#selectaniodos').val();
		var rango    = $("input[type='checkbox']:checked").val();

		$.ajax({
			url: '<?php echo $this->webroot; ?>admin/Aplicaciones/rcomparargrid',
			type: 'POST',
			data: {proceso: proceso, anio1: anio1, anio2: anio2, rango: rango},
		})
		.done(function(response) {
			$('#subgridcomparar').html(response);
		})
		.fail(function() {
			alert("No se pudieron cargar los datos, consulte con el depto técnico");
		})
			
	});
//});
</script>


				<?php
				echo $this->Header->display("PORCENTAJE DE AVANCE POR PERIODO");
				echo $this->Breadcrumb->create(array(
					array(
						'title' => 'Dashboard',
						'url' => array('controller' => 'Users','action' => 'dashboard'),
						'class' => ''
					),
					array(
						'title' => '% de Avance por período',
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
											<label for="textfield" class="control-label">Selecciona A&ntilde;o 1</label>
											<div class="controls">
												<div class="input-xlarge">
													<select name="select" id="selectaniouno" class='chosen-select' data-placeholder="Selecciona un año">
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
											<label for="textfield" class="control-label">Selecciona A&ntilde;o 2</label>
											<div class="controls">
												<div class="input-xlarge">
													<select name="select" id="selectaniodos" class='chosen-select' data-placeholder="Selecciona un año">
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
													<select name="select" id="selectprocesoavance" class='chosen-select' data-placeholder="Selecciona un proceso">
														<option value="0"></option>
														<?php foreach ($procesos as $key => $value) { ?>
															<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
														<?php } ?>
														<option value="999999">Todos</option>
													</select>
											</div>
											</div>
										</div>
										<div class="control-group">
											<label for="textfield" class="control-label">¿Rango?</label>
											<div class="controls">
												<div class="check-demo-col">
													<div class="check-line">
														<input type="checkbox" id="c5" class='icheck-me' data-skin="square" data-color="blue" name="rango" value="1"> 
													</div>
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

<div id="subgridcomparar"></div>