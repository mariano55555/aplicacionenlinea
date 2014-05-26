<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$instituciones = $this->requestAction('admin/Instituciones/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="glyphicon-building"></i>
									INSTITUCIONES
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-institucionesadd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Instituciones/add', '#institucionesadd')">Nueva instituci&oacute;n</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Instituci&oacute;n</th>
											<th>Tipo</th>
											<th>C&oacute;digo POMA</th>
											<th>Creado</th>
											<th>Creado por</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($instituciones as $institucione): ?>
										<tr>

											<td><?php echo h($institucione['Institucione']['name']); ?>&nbsp;</td>
											<td><?php echo ($institucione['Institucione']['tipo'] == 1) ? "Pública" : "Privada"; ?>&nbsp;</td>
											<td><?php echo h($institucione['Institucione']['codsql']); ?>&nbsp;</td>
											<td><?php echo h($institucione['Institucione']['created']); ?>&nbsp;</td>
											<td><?php echo h($institucione['CreatedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($institucione['Institucione']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $institucione['Institucione']['id']; ?>,'<?php echo $this->webroot;?>admin\/Instituciones\/view\/<?php echo $institucione['Institucione']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-institucionesedit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Instituciones/edit/<?php echo $institucione['Institucione']['id']; ?>', '#institucionesedit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar la institución?', '<?php echo $this->webroot; ?>admin/Instituciones/updatedelete/<?php echo $institucione['Institucione']['id']; ?>','#institucionestable')">
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