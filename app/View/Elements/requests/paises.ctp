<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$paises = $this->requestAction('admin/Paises/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="icon-globe"></i>
									PAISES
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-paisesadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Paises/add', '#paisesadd')">Nuevo pa&iacute;s</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
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
										foreach ($paises as $paise): ?>
										<tr>

											<td><?php echo h($paise['Paise']['name']); ?>&nbsp;</td>
											<td><?php echo h($paise['Paise']['created']); ?>&nbsp;</td>
											<td><?php echo h($paise['Paise']['modified']); ?>&nbsp;</td>
											<td><?php echo h($paise['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($paise['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($paise['Paise']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $paise['Paise']['id']; ?>,'<?php echo $this->webroot;?>admin\/Paises\/view\/<?php echo $paise['Paise']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-paisesedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Paises/edit/<?php echo $paise['Paise']['id']; ?>', '#paisesedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar el país?', '<?php echo $this->webroot; ?>admin/Paises/updatedelete/<?php echo $paise['Paise']['id']; ?>','#paisestable')">
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