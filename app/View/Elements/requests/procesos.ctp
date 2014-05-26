<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$procesos = $this->requestAction('admin/Procesos/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-refresh"></i>
									PROCESOS
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-procesosadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Procesos/add', '#procesosadd')">Nuevo Proceso</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Proceso</th>
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
										foreach ($procesos as $proceso): ?>
										<tr>

											<td><?php echo h($proceso['Proceso']['name']); ?>&nbsp;</td>
											<td><?php echo h($proceso['Proceso']['created']); ?>&nbsp;</td>
											<td><?php echo h($proceso['Proceso']['modified']); ?>&nbsp;</td>
											<td><?php echo h($proceso['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($proceso['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($proceso['Proceso']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $proceso['Proceso']['id']; ?>,'<?php echo $this->webroot;?>admin\/Procesos\/view\/<?php echo $proceso['Proceso']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-procesosedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Procesos/edit/<?php echo $proceso['Proceso']['id']; ?>', '#procesosedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar el proceso?', '<?php echo $this->webroot; ?>admin/Procesos/updatedelete/<?php echo $proceso['Proceso']['id']; ?>','#procesostable')">
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