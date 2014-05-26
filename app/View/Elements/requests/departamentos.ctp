<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$departamentos = $this->requestAction('admin/Departamentos/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="icon-road"></i>
									DEPARTAMENOS
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-departamentosadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Departamentos/add', '#departamentosadd')">Nuevo departamento</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Departamento</th>
											<th>C&oacute;digo POMA</th>
											<th>Pa&iacute;s</th>
											<th>Creado</th>
											<th>Modificado</th>
											<th>Creado por</th>
											<th>Modificado por</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($departamentos as $departamento): ?>
										<tr>

											<td><?php echo h($departamento['Departamento']['name']); ?>&nbsp;</td>
											<td><?php echo h($departamento['Departamento']['coddepartamento_sql']); ?>&nbsp;</td>
											<td><?php echo h($departamento['Paise']['name']); ?>&nbsp;</td>
											<td><?php echo h($departamento['Departamento']['created']); ?>&nbsp;</td>
											<td><?php echo h($departamento['Departamento']['modified']); ?>&nbsp;</td>
											<td><?php echo h($departamento['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($departamento['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($departamento['Departamento']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $departamento['Departamento']['id']; ?>,'<?php echo $this->webroot;?>admin\/Departamentos\/view\/<?php echo $departamento['Departamento']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-departamentosedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Departamentos/edit/<?php echo $departamento['Departamento']['id']; ?>', '#departamentosedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar el departamento?', '<?php echo $this->webroot; ?>admin/Departamentos/updatedelete/<?php echo $departamento['Departamento']['id']; ?>','#departamentostable')">
													<i class='icon-remove-sign'></i> ¿Inactivo?
												</a>
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				  </div>
				</div>