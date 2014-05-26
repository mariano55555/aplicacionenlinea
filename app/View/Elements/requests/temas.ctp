<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$temas = $this->requestAction('admin/Temas/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="glyphicon-table"></i>
									CARGOS
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-temasadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Temas/add', '#temasadd')">Nuevo Tema</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Tema</th>
											<th>Contenido</th>
											<th>Creado</th>
											<th>Creado por</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($temas as $tema): ?>
										<tr>

											<td><?php echo h($tema['Tema']['name']); ?>&nbsp;</td>
											<td><?php echo h($tema['Tema']['contenido']); ?>&nbsp;</td>
											<td><?php echo h($tema['Tema']['created']); ?>&nbsp;</td>
											<td><?php echo h($tema['CreatedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($tema['Tema']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $tema['Tema']['id']; ?>,'<?php echo $this->webroot;?>admin\/Temas\/view\/<?php echo $tema['Tema']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-temasedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Temas/edit/<?php echo $tema['Tema']['id']; ?>', '#temasedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar el tema?', '<?php echo $this->webroot; ?>admin/Temas/updatedelete/<?php echo $tema['Tema']['id']; ?>','#temastable')">
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