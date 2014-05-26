<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$municipios = $this->requestAction('admin/Municipios/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="glyphicon-road"></i>
									INSTITUCIONES
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-municipiosadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Municipios/add', '#municipiosadd')">Nueva instituci&oacute;n</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Municipio</th>
											<th>Departamento</th>
											<th>C&oacute;digo POMA</th>
											<th>Creado</th>
											<th>Creado por</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($municipios as $municipio): ?>
										<tr>

											<td><?php echo h($municipio['Municipio']['name']); ?>&nbsp;</td>
											<td><?php echo h($municipio['Departamento']['name']); ?>&nbsp;</td>
											<td><?php echo h($municipio['Municipio']['codsql_municipio']); ?>&nbsp;</td>
											<td><?php echo h($municipio['Municipio']['created']); ?>&nbsp;</td>
											<td><?php echo h($municipio['CreatedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($municipio['Municipio']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $municipio['Municipio']['id']; ?>,'<?php echo $this->webroot;?>admin\/Municipios\/view\/<?php echo $municipio['Municipio']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-municipiosedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Municipios/edit/<?php echo $municipio['Municipio']['id']; ?>', '#municipiosedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar el municipio?', '<?php echo $this->webroot; ?>admin/Municipios/updatedelete/<?php echo $municipio['Municipio']['id']; ?>','#municipiostable')">
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