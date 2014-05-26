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
											<th>Postulante</th>
											<th>C&oacute;digo Postulaci&oacute;n</th>
											<th>Avance</th>
											<th>Ver</th>
										</tr>
									</thead>
									<tbody>
									<?php
										for ($i=0; $i < count($postulantes); $i++) { 
											if ($postulantes[$i]['users']['completado'] == 100) {
											$valor = '
											<div class="alert alert-success" style="margin-bottom:0px !important">
												<strong>'.$postulantes[$i]['users']['completado'].' %</strong>
											</div>
											';
											}elseif ($postulantes[$i]['users']['completado'] < 100 && $postulantes[$i]['users']['completado'] > 50) {
											$valor = '
											<div class="alert alert-info" style="margin-bottom:0px !important">
												<strong>'.$postulantes[$i]['users']['completado'].' %</strong>
											</div>
											';
											}else{
											$valor = '
											<div class="alert alert-error" style="margin-bottom:0px !important">
												<strong>'.$postulantes[$i]['users']['completado'].' %</strong>
											</div>
											';
											}
										if (isset($postulantes[$i]['users']['tabla'])) {
									 ?>
										<tr>
											<td><?php echo h($postulantes[$i]['users']['name']); ?>&nbsp;</td>
											<td><?php echo strlen(trim($postulantes[$i]['aplicaciones']['codigoPostulante']) > 0) ? $postulantes[$i]['aplicaciones']['codigoPostulante'] : "Aplicación no finalizada"; ?>&nbsp;</td>
											<td><?php echo $valor; ?></td>
											<td class="actions">
												<a class="btn" target = "_blank" href="<?php echo $this->webroot;?>admin/Aplicaciones/aplicacion/<?php echo $postulantes[$i]['users']['id']; ?>">
													<i class='icon-search'></i> Ver
												</a>
											</td>
										</tr>
									<?php }
										}
									 ?>
									</tbody>
								</table>
								
							</div>
						</div>