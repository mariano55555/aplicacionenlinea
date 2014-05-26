				<?php
				echo $this->Header->display("CARGOS");
				echo $this->Breadcrumb->create(array(
					array(
						'title' => 'Dashboard',
						'url' => array('controller' => 'Users','action' => 'dashboard'),
						'class' => ''
					),
					array(
						'title' => 'Configuración básica',
						'url' => array('controller' => 'Aplicaciones','action' => 'generales'),
						'class' => ''
						
					),
					array(
						'title' => $cargo['Cargo']['name'],
						'class' => 'current'
					)
					)
				   );
				 ?>
				<br><br>
				<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-title">
									<h3>
										<i class="icon-list"></i>
										<?php echo h($cargo['Cargo']['name']);?>
									</h3>
								</div>
								<div class="box-content">
									<div class="row-fluid">
										<div class="span12">
											<dl class='dl-horizontal'>
												<dt><?php echo __('Cargo'); ?></dt>
												<dd>
													<?php echo h($cargo['Cargo']['name']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Creado'); ?></dt>
												<dd>
													<?php echo h($cargo['Cargo']['created']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Modificado'); ?></dt>
												<dd>
													<?php echo h($cargo['Cargo']['modified']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Creado por'); ?></dt>
												<dd>
													<?php echo h($cargo['CreatedBy']['name']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Modificado por'); ?></dt>
												<dd>
													<?php echo h($cargo['ModifiedBy']['name']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Estado'); ?></dt>
												<dd>
													<?php echo h($cargo['Cargo']['activo'] == 1)? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; ?>
													&nbsp;
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="icon-group"></i>
									<?php echo h($cargo['Cargo']['name']); ?>
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Celular</th>
											<th>Email</th>
											<th>Postulante</th>
											<th>Creado</th>
											<th>Modificado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($cargo['Recomendadore'] as $recomendadore): ?>
										<tr>
											<td><?php echo $recomendadore['name']; ?></td>
											<td><?php echo $recomendadore['celular']; ?></td>
											<td><?php echo $recomendadore['email']; ?></td>
											<td><?php echo $recomendadore['CreatedBy']['name']; ?></td>
											<td><?php echo $recomendadore['created']; ?></td>
											<td><?php echo $recomendadore['modified']; ?></td>
											<td class="actions">
												<?php echo $this->Html->link(__('View'), array('controller' => 'recomendadores', 'action' => 'view', $recomendadore['id'])); ?>
												<?php echo $this->Html->link(__('Edit'), array('controller' => 'recomendadores', 'action' => 'edit', $recomendadore['id'])); ?>
												<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recomendadores', 'action' => 'delete', $recomendadore['id']), null, __('Are you sure you want to delete # %s?', $recomendadore['id'])); ?>
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				  </div>

