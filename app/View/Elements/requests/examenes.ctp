<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$examenes = $this->requestAction('admin/Examenes/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-pencil"></i>
									EXAMEN
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-examenesadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Examenes/add', '#examenesadd')">Nuevo Examen</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Examen</th>
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
										foreach ($examenes as $examene): ?>
										<tr>

											<td><?php echo h($examene['Examene']['name']); ?>&nbsp;</td>
											<td><?php echo h($examene['Examene']['created']); ?>&nbsp;</td>
											<td><?php echo h($examene['Examene']['modified']); ?>&nbsp;</td>
											<td><?php echo h($examene['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($examene['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($examene['Examene']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $examene['Examene']['id']; ?>,'<?php echo $this->webroot;?>admin\/Examenes\/view\/<?php echo $examene['Examene']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-examenesedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Examenes/edit/<?php echo $examene['Examene']['id']; ?>', '#examenesedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar el examen?', '<?php echo $this->webroot; ?>admin/Examenes/updatedelete/<?php echo $examene['Examene']['id']; ?>','#examenestable')">
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