				<?php
				echo $this->Header->display("CARRERAS");
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
						'title' => $carrera['Carrera']['name'],
						'class' => 'current'
					)
					)
				   );
				 ?>
				 <div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-title">
									<h3>
										<i class="icon-list"></i>
										<?php echo h($carrera['Carrera']['name']);?>
									</h3>
								</div>
								<div class="box-content">
									<div class="row-fluid">
										<div class="span12">
											<dl class='dl-horizontal'>
												<dt><?php echo __('Cargo'); ?></dt>
												<dd>
													<?php echo h($carrera['Carrera']['name']); ?>
													&nbsp;
												</dd>
												<dd>
													<?php echo h($carrera['Carrera']['created']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Modified'); ?></dt>
												<dd>
													<?php echo h($carrera['Carrera']['modified']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Creado por'); ?></dt>
												<dd>
													<?php echo h($carrera['CreatedBy']['name']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Modificado por'); ?></dt>
												<dd>
													<?php echo h($carrera['ModifiedBy']['name']); ?>
													&nbsp;
												</dd>
												<dt><?php echo __('Estado'); ?></dt>
												<dd>
													<?php echo h($carrera['Carrera']['activo'] == 1)? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; ?>
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
									<?php echo h($carrera['Carrera']['name']); ?>
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Usuario</th>
											<th>Email</th>
											<th>Direccion</th>
											<th>Activo</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($carrera['User'] as $user): ?>
										<tr>
											<td><?php echo $user['name']; ?></td>
											<td><?php echo $user['username']; ?></td>
											<td><?php echo $user['email']; ?></td>
											<td><?php echo $user['direccion']; ?></td>
											<td><?php echo ($user['activo'] == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-warning">Inactivo</span>'; ?>
											<td class="actions">
												<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
												<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
												<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				  </div>
