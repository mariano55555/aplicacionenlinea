<?php 
echo $this->Html->script("plugins/mockjax/jquery.mockjax", array('block' => 'script'));
echo $this->Html->script("outside/eakrokoforselect", array('block' => 'script'));
$tipofamiliares = $this->requestAction('admin/Tipofamiliares/index');
?>

<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="glyphicon-home"></i>
									TIPO DE FAMILIARES
								</h3>
							</div>
							<div class="box-content nopadding">
								<br/>
								<p>
									<a data-toggle="modal" href="#form-content-familiaradd" class="btn btn-primary" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Tipofamiliares/add', '#familiaradd')">Nuevo tipo</a>
								</p>
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Tipo</th>
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
										foreach ($tipofamiliares as $tipofamiliare): ?>
										<tr>
											<td><?php echo h($tipofamiliare['Tipofamiliare']['name']); ?>&nbsp;</td>
											<td><?php echo h($tipofamiliare['Tipofamiliare']['created']); ?>&nbsp;</td>
											<td><?php echo h($tipofamiliare['Tipofamiliare']['modified']); ?>&nbsp;</td>
											<td><?php echo h($tipofamiliare['CreatedBy']['name']); ?>&nbsp;</td>
											<td><?php echo h($tipofamiliare['ModifiedBy']['name']); ?>&nbsp;</td>
											<td>
												<?php 
													echo h($tipofamiliare['Tipofamiliare']['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; 
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" onclick="view(<?php echo $tipofamiliare['Tipofamiliare']['id']; ?>,'<?php echo $this->webroot;?>admin\/Tipofamiliares\/view\/<?php echo $tipofamiliare['Tipofamiliare']['id']; ?>')"><i class='icon-search'></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-familiaredit" class="btn" onclick="ajaxadd('<?php echo $this->webroot; ?>admin/Tipofamiliares/edit/<?php echo $tipofamiliare['Tipofamiliare']['id']; ?>', '#familiaredit')">
													<i class="icon-edit"></i> Editar
												</a>
												<a  class="btn" onclick="confirmation('¿Deseas desactivar el tipo de familiar?', '<?php echo $this->webroot; ?>admin/Tipofamiliares/updatedelete/<?php echo $tipofamiliare['Tipofamiliare']['id']; ?>','#familiartable')">
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