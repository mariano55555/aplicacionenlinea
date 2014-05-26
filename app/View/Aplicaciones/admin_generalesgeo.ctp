


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
							<div class="box box-bordered box-color">
								<div class="box-title">
									<h3><i class="icon-reorder"></i> Configuraci&oacute;n</h3>
								</div>
								<div class="box-content nopadding">
									<ul class="tabs tabs-inline tabs-top">
										<li class='active'>
											<a href="#departamentos" data-toggle='tab'><i class="icon-road"></i> Departamentos</a>
										</li>
										<li>
											<a href="#instituciones" data-toggle='tab'><i class="glyphicon-building"></i> Instituciones</a>
										</li>
										<li>
											<a href="#municipios" data-toggle='tab'><i class="glyphicon-road"></i> Municipios</a>
										</li>
										<li>
											<a href="#paises" data-toggle='tab'><i class="icon-globe"></i> Paises</a>
										</li>
										<li>
											<a href="#superate" data-toggle='tab'><i class="icon-group"></i> Superate</a>
										</li>
										<li>
											<a href="#familiares" data-toggle='tab'><i class="glyphicon-home"></i> Tipo familiares</a>
										</li>
									</ul>
									<div class="tab-content padding tab-content-inline tab-content-bottom">
										<div class="tab-pane active" id="departamentos">
											<div id="departamentostable">
												<?php echo $this->element('requests/departamentos'); ?>
											</div>
										</div>
										<div class="tab-pane" id="instituciones">
											 <div id="institucionestable">
												<?php echo $this->element('requests/instituciones'); ?>
											</div>
										</div>
										<div class="tab-pane" id="municipios">
											  <div id="municipiostable">
												<?php echo $this->element('requests/municipios'); ?>
											  </div>
										</div>
										<div class="tab-pane" id="paises">
											 <div id="paisestable">
												<?php echo $this->element('requests/paises'); ?>
											  </div>
										</div>
										
										<div class="tab-pane" id="superate">
											 <div id="superatetable">
												<?php echo $this->element('requests/superate'); ?>
											  </div>
										</div>
										
										<div class="tab-pane" id="familiares">
											 <div id="familiartable">
												<?php echo $this->element('requests/familiares'); ?>
											  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>


					<!--- formulario modal para nuevo cargo -->
					<div id="form-content-institucionesadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: INSTITUCIONES</h3>
						</div>
						<div>
							<div class="modal-body" id ="institucionesadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar cargo -->
					<div id="form-content-institucionesedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: INSTITUCIONES</h3>
					        </div>
						<div>
							<div class="modal-body" id ="institucionesedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>


					<!--- formulario modal para nueva carrera-->
					<div id="form-content-municipiosadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: MUNICIPIOS</h3>
						</div>
						<div>
							<div class="modal-body" id ="municipiosadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar carrera -->
					<div id="form-content-municipiosedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: MUNICIPIOS</h3>
					        </div>
						<div>
							<div class="modal-body" id ="municipiosedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

					<!--- formulario modal para nueva departamentos-->
					<div id="form-content-departamentosadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: DEPARTAMENTOS</h3>
						</div>
						<div>
							<div class="modal-body" id ="departamentosadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar departamentos -->
					<div id="form-content-departamentosedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: DEPARTAMENTOS</h3>
					        </div>
						<div>
							<div class="modal-body" id ="departamentosedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

					<!--- formulario modal para nueva departamentos-->
					<div id="form-content-paisesadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: PAISES</h3>
						</div>
						<div>
							<div class="modal-body" id ="paisesadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar departamentos -->
					<div id="form-content-paisesedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: PAISES</h3>
					        </div>
						<div>
							<div class="modal-body" id ="paisesedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

					<!--- formulario modal para nueva departamentos-->
					<div id="form-content-superateadd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: SUPERATE</h3>
						</div>
						<div>
							<div class="modal-body" id ="superateadd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar departamentos -->
					<div id="form-content-superateedit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: SUPERATE</h3>
					        </div>
						<div>
							<div class="modal-body" id ="superateedit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

					<!--- formulario modal para nueva departamentos-->
					<div id="form-content-familiaradd" class="modal hide fade in" style="display: none;">
					    <div class="modal-header">
					        <a class="close" data-dismiss="modal">×</a>
					        <h3><i class="icon-edit"></i> FORMULARIO: TIPO FAMILIAR</h3>
						</div>
						<div>
							<div class="modal-body" id ="familiaradd">
								  <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>

	
					<!--- formulario modal para editar departamentos -->
					<div id="form-content-familiaredit" class="modal hide fade in" style="display: none;">
					        <div class="modal-header">
					              <a class="close" data-dismiss="modal">×</a>
					              <h3><i class="icon-edit"></i> FORMULARIO: TIPO FAMILIAR</h3>
					        </div>
						<div>
							<div class="modal-body" id ="familiaredit">
							      <div class="guardando" style="display:none">Cargando...</div>
							</div>
						</div>
					</div>