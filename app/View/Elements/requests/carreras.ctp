<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$carreras = $this->requestAction('admin/Carreras/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="glyphicon-book"></i>
									CARRERAS
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-carrerasadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Carreras/add', '#carrerasadd')">Nueva carrera</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Carrera</th>
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
										foreach ($carreras as $carrera): ?>
										<tr>

											<td><?php echo h($carrera['Carrera']['name']); ?>&nbsp;</td>
											<td><?php echo h($carrera['Carrera']['created']); ?>&nbsp;</td>
											<td><?php echo h($carrera['Carrera']['modified']); ?>&nbsp;</td>
											<td><?php echo h($carrera['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($carrera['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($carrera['Carrera']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												
												<a class="btn" onclick="viewindex('<?php echo $this->webroot;?>admin\/Carreras\/view\/<?php echo $carrera['Carrera']['id']; ?>', '#here')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-carrerasedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Carreras/edit/<?php echo $carrera['Carrera']['id']; ?>', '#carrerasedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar la carrera?', '<?php echo $this->webroot; ?>admin/Carreras/updatedelete/<?php echo $carrera['Carrera']['id']; ?>','#carrerastable')">
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