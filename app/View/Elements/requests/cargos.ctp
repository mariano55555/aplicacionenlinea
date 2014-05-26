<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$cargos = $this->requestAction('admin/Cargos/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-sitemap"></i>
									CARGOS
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-cargosadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Cargos/add', '#cargosadd')">Nuevo cargo</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Cargo</th>
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
										foreach ($cargos as $cargo): ?>
										<tr>

											<td><?php echo h($cargo['Cargo']['name']); ?>&nbsp;</td>
											<td><?php echo h($cargo['Cargo']['created']); ?>&nbsp;</td>
											<td><?php echo h($cargo['Cargo']['modified']); ?>&nbsp;</td>
											<td><?php echo h($cargo['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($cargo['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($cargo['Cargo']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="viewindex('<?php echo $this->webroot;?>admin\/Cargos\/view\/<?php echo $cargo['Cargo']['id']; ?>', '#here')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-cargosedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Cargos/edit/<?php echo $cargo['Cargo']['id']; ?>', '#cargoseditajax')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar el cargo?', '<?php echo $this->webroot; ?>admin/Cargos/updatedelete/<?php echo $cargo['Cargo']['id']; ?>','#cargostable')">
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
				