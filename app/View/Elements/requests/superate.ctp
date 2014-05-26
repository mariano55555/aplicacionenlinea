<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$superates = $this->requestAction('admin/Superates/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="icon-group"></i>
									SUPERATE
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-superateadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Superates/add', '#superateadd')">Nueva Sede</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Sede</th>
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
										foreach ($superates as $superate): ?>
										<tr>

											<td><?php echo h($superate['Superate']['name']); ?>&nbsp;</td>
											<td><?php echo h($superate['Superate']['created']); ?>&nbsp;</td>
											<td><?php echo h($superate['Superate']['modified']); ?>&nbsp;</td>
											<td><?php echo h($superate['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($superate['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($superate['Superate']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $superate['Superate']['id']; ?>,'<?php echo $this->webroot;?>admin\/Superates\/view\/<?php echo $superate['Superate']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-superateedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Superates/edit/<?php echo $superate['Superate']['id']; ?>', '#superateedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar la sede?', '<?php echo $this->webroot; ?>admin/Superates/updatedelete/<?php echo $superate['Superate']['id']; ?>','#superatetable')">
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