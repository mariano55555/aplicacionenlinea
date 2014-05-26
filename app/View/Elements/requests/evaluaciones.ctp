<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$evaluaciones = $this->requestAction('admin/Evaluaciones/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="icon-edit"></i>
									EVALUACIONES
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-evaluacionesadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Evaluaciones/add', '#evaluacionesadd')">Nueva evaluaci&oacute;n</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Evaluaci&oacute;n</th>
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
										foreach ($evaluaciones as $evaluacione): ?>
										<tr>

											<td><?php echo h($evaluacione['Evaluacione']['name']); ?>&nbsp;</td>
											<td><?php echo h($evaluacione['Evaluacione']['created']); ?>&nbsp;</td>
											<td><?php echo h($evaluacione['Evaluacione']['modified']); ?>&nbsp;</td>
											<td><?php echo h($evaluacione['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($evaluacione['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($evaluacione['Evaluacione']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

													<a class="btn" onclick="viewindex('<?php echo $this->webroot;?>admin\/Evaluaciones\/view\/<?php echo $evaluacione['Evaluacione']['id']; ?>', '#here')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-evaluacionesedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Evaluaciones/edit/<?php echo $evaluacione['Evaluacione']['id']; ?>', '#evaluacionesedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar la evaluación?', '<?php echo $this->webroot; ?>admin/Evaluaciones/updatedelete/<?php echo $evaluacione['Evaluacione']['id']; ?>','#evaluacionestable')">
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