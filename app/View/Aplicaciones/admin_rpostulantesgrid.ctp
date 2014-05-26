<div class="row-fluid">
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="icon-group"></i>
									POSTULANTES
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Nacionalidad</th>
											<th>Instituci&oacute;n</th>
											<th>Pa&iacute;s instituci&oacute;n</th>
											<th>Departamento</th>
											<th>Carrera</th>
											<th>Proceso</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										for ($i=0; $i < count($postulantes) ; $i++) { 
									 ?>
										<tr>
											<td><?php echo h($postulantes[$i]['users']['name']); ?>&nbsp;</td>
											<td>
											<?php 
											if (strlen(trim($postulantes[$i]['paises']['name'])) > 0) {
												echo h($postulantes[$i]['paises']['name']); 
											}else{
												echo 'No completado';
											}
											?>&nbsp;
											</td>
											<td>
												<?php
												if(isset($postulantes[$i]['users']['institucion_id']) &&  ($postulantes[$i]['users']['institucion_id']) > 0 && strlen(trim(($postulantes[$i]['instituciones']['name']))) > 0)
												{
													echo h($postulantes[$i]['instituciones']['name']); 
												}elseif (isset($postulantes[$i]['users']['instituciones_adicionale_id']) &&  ($postulantes[$i]['users']['instituciones_adicionale_id']) > 0 && strlen(trim(($postulantes[$i]['instituciones_adicionales']['name']))) > 0) {
													echo h($postulantes[$i]['instituciones_adicionales']['name']); 
												}else{
													echo 'No completado';
												}	
												?>

											&nbsp;
											</td>
											<td>
												<?php 
												if (isset($postulantes[$i]['paisinstitucion']['name']) && strlen(trim($postulantes[$i]['paisinstitucion']['name'])) > 0) {
													echo $postulantes[$i]['paisinstitucion']['name'];
												}elseif(isset($postulantes[$i]['paisotro']['name']) && strlen(trim($postulantes[$i]['paisotro']['name'])) > 0){
													echo $postulantes[$i]['paisotro']['name'];
												}else{
													echo "No completado";
												}
												?>
												&nbsp;
											</td>
											<td>
												<?php 
												if (isset($postulantes[$i]['departamentos']['name']) && strlen(trim($postulantes[$i]['departamentos']['name'])) > 0) {
													echo $postulantes[$i]['departamentos']['name'];
												}elseif($postulantes[$i]['users']['instituciones_adicionale_id'] > 0){
													echo "No Aplica";
												}
												else{
													echo "No completado";
												}
												?>&nbsp;
											</td>
											<td>
												<?php 
													echo (isset($postulantes[$i]['carreras']['name']) && strlen(trim($postulantes[$i]['carreras']['name'])) > 0) ? $postulantes[$i]['carreras']['name'] : "No completado"; 
												?>
											&nbsp;
											</td>
											<td>
												<?php 
													if(isset($postulantes[$i]['procesos']['name']) && strlen(trim($postulantes[$i]['procesos']['name'])) > 0)
													{
														echo $postulantes[$i]['procesos']['name'];
													}else{
														echo "No completado";
													}

														
												?>
											&nbsp;
											</td>
											<td class="actions">

												<a class="btn" target="_blank" href="<?php echo $this->webroot;?>admin/Aplicaciones/aplicacion/<?php echo $postulantes[$i]['users']['id']; ?>"><i class='icon-search'></i> Ver</a>

											</td>
											
										</tr>
									<?php } ?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				  </div>
				</div>