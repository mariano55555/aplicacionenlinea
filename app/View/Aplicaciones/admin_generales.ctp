


<div class="container-fluid">
				<?php
				echo $this->Header->display("CONFIGURACION");
				echo $this->Breadcrumb->create(array(
					array(
						'title' => 'Dashboard',
						'url' => array('controller' => 'Users','action' => 'dashboard'),
						'class' => ''
					),
					array(
						'title' => 'Configuración',
						'url' => array('controller' => 'Users','action' => 'index'),
						'class' => 'current'
					)
					)
				   );
				 ?>
				<br><br>
					<div class="row-fluid">
						<div class="span12">
							<div class="box box-bordered box-color satblue">
								<div class="box-title">
									<h3><i class="icon-reorder"></i> Configuraci&oacute;n</h3>
								</div>
								<div class="box-content nopadding">
									<ul class="tabs tabs-inline tabs-top">
										<li class='active'>
											<a href="#cargos" data-toggle='tab'><i class="icon-sitemap"></i>Cargos</a>
										</li>
										<li>
											<a href="#carreras" data-toggle='tab'><i class="glyphicon-book"></i>Carreras</a>
										</li>
										<li>
											<a href="#evaluaciones" data-toggle='tab'><i class="icon-edit"></i> Evaluaciones</a>
										</li>
										<li>
											<a href="#examenes" data-toggle='tab'><i class="icon-pencil"></i> Examenes</a>
										</li>
										<li>
											<a href="#procesos" data-toggle='tab'><i class="icon-refresh"></i> Procesos</a>
										</li>
										<li>
											<a href="#temas" data-toggle='tab'><i class="glyphicon-table"></i> Temas</a>
										</li>
									</ul>
									<div class="tab-content padding tab-content-inline tab-content-bottom">
										<div class="tab-pane active" id="cargos">
											<div id="cargostable">
												<?php echo $this->element('requests/cargos'); ?>
											</div>
										</div>
										<div class="tab-pane" id="carreras">
											<div id="carrerastable">
												<?php echo $this->element('requests/carreras'); ?>
											</div>
										</div>
										<div class="tab-pane" id="evaluaciones">
											 <div id="evaluacionestable">
												<?php echo $this->element('requests/evaluaciones'); ?>
											</div>
										</div>
										<div class="tab-pane" id="examenes">
											 <div id="examenestable">
												<?php echo $this->element('requests/examenes'); ?>
											</div>
										</div>
										
										<div class="tab-pane" id="procesos">
											 <div id="procesostable">
												<?php echo $this->element('requests/procesos'); ?>
											</div>
										</div>
										<div class="tab-pane" id="temas">
											 <div id="temastable">
												<?php echo $this->element('requests/temas'); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>


					<!--- formulario modal para nuevo cargo -->
					<div id="form-content-cargosadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: CARGOS</h3>
						</div>
						<div>
							<div class="modal-body" id ="cargosadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar cargo -->
					<div id="form-content-cargosedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: CARGOS</h3>
					        </div>
						<div>
							<div class="modal-body" id ="cargoseditajax">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>


					<!--- formulario modal para nueva carrera-->
					<div id="form-content-carrerasadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: CARRERAS</h3>
						</div>
						<div>
							<div class="modal-body" id ="carrerasadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar carrera -->
					<div id="form-content-carrerasedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: CARRERAS</h3>
					        </div>
						<div>
							<div class="modal-body" id ="carrerasedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

					

					<!--- formulario modal para nueva departamentos-->
					<div id="form-content-evaluacionesadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: EVALUACIONES</h3>
						</div>
						<div>
							<div class="modal-body" id ="evaluacionesadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar departamentos -->
					<div id="form-content-evaluacionesedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: EVALUACIONES</h3>
					        </div>
						<div>
							<div class="modal-body" id ="evaluacionesedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>


					<!--- formulario modal para nueva departamentos-->
					<div id="form-content-temasadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: TEMAS</h3>
						</div>
						<div>
							<div class="modal-body" id ="temasadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar departamentos -->
					<div id="form-content-temasedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: TEMAS</h3>
					        </div>
						<div>
							<div class="modal-body" id ="temasedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

					<!--- formulario modal para nueva departamentos-->
					<div id="form-content-examenesadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: EXAMENES</h3>
						</div>
						<div>
							<div class="modal-body" id ="examenesadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar departamentos -->
					<div id="form-content-examenesedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: EXAMENES</h3>
					        </div>
						<div>
							<div class="modal-body" id ="examenesedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

					<!--- formulario modal para nueva departamentos-->
					<div id="form-content-procesosadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: PROCESOS</h3>
						</div>
						<div>
							<div class="modal-body" id ="procesosadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar departamentos -->
					<div id="form-content-procesosedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: PROCESOS</h3>
					        </div>
						<div>
							<div class="modal-body" id ="procesosedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
				    function viewindex(link,target) {
					      $.ajax({
					          url: link,
					      })
					      .done(function(response) {
					          $(target).html(response);
					      })
					      .fail(function() {
					          alert("No se pudo cargar los datos. Consulta al depto de informatica");
					      })
					  }
				</script>