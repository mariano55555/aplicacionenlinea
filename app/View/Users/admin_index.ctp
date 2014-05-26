<script>
 $("#newaccount").click(function(event)
    {
        var modal = $(this);
        // load content with AJAX
        $.ajax({
            url: '<?php echo $this->webroot; ?>admin/Users/add',
            success: function(data){
                $('.modal-body').html(data);
            }
        });
    });
</script>
				
				<?php
				echo $this->Header->display("Usuarios");
				echo $this->Breadcrumb->create(array(
					array(
						'title' => 'Dashboard',
						'url' => array('controller' => 'Users','action' => 'dashboard'),
						'class' => ''
					),
					array(
						'title' => 'Usuarios',
						'url' => array('controller' => 'Users','action' => 'index'),
						'class' => 'current'
					)
					)
				   );
				 ?>
				<br><br>
			<div class="row-fluid">
					<div class="span12">
				<!--Modal window-->
				<a data-toggle="modal" href="#myModal" id="newaccount" class="btn btn-primary">Nueva cuenta</a>
				<div class="modal hide fade" id="myModal">
				  <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" href ="<?php echo $this->webroot; ?>Users/">×</button>
				    <h3>Nueva cuenta</h3>
				  </div>
				  <div class="modal-body">
				    <p>Cargando...</p>
				  </div>
				</div>
				<div id="usuarios">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									CUENTAS DE USUARIOS
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th><?php echo __('Nombre'); ?></th>
											<th><?php echo __('Cuenta de usuario'); ?></th>
											<th><?php echo __('Perfil'); ?></th>
											<th><?php echo __('activo'); ?></th>
											<th><?php echo __('creado'); ?></th>
											<th><?php echo __('creado por'); ?></th>
											<th><?php echo __('Acciones'); ?></th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($users as $user): ?>
										<tr>
											<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
											<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
											<td>
												<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
											</td>
											<td>
												<?php 
												echo ($user['User']['activo'] == 1 ? 'Activo' : 'Inactivo'); ?>
												&nbsp;

											</td>
											<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
											<td><?php echo h($user['CreatedBy']['name']); ?>&nbsp;</td>
											
											<td class="actions">
												<a href="#" class="btn" rel="tooltip" id="estadospoaver" reg="<?php echo $user['User']['id']; ?>"><i class="icon-search"></i> Ver</a>

												<a  data-toggle="modal" href="#form-content-estadospoa-edit" class="btn estadospoaeditar" reg="<?php echo $user['User']['id']; ?>"><i class="icon-edit"></i> Editar</a>

												<a href="#" class="btn" rel="tooltip" id="estadospoaactivo" reg="<?php echo $user['User']['id']; ?>"><i class="icon-remove-sign"></i> ¿Inactivo?</a>
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
