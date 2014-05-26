<?php
/*echo "<pre>";
print_r($data);
echo "</pre>";*/
?>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered blue">
							<div class="box-title">
								<h3>
									<i class="icon-group"></i>
									POSTULANTES DE <?php echo strtoupper($institucion); ?>
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Postulante</th>
											<th>C&oacute;digo Postulante</th>
											<th>% Completado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										for ($i=0; $i < count($data); $i++) {
										if ($data[$i]['users']['completado'] == 100) {
										$valor = '
										<div class="alert alert-success" style="margin-bottom:0px !important">
											<strong>'.$data[$i]['users']['completado'].' %</strong>
										</div>
										';
										}elseif ($data[$i]['users']['completado'] < 100 && $data[$i]['users']['completado'] > 50) {
										$valor = '
										<div class="alert alert-info" style="margin-bottom:0px !important">
											<strong>'.$data[$i]['users']['completado'].' %</strong>
										</div>
										';
										}else{
										$valor = '
										<div class="alert alert-error" style="margin-bottom:0px !important">
											<strong>'.$data[$i]['users']['completado'].' %</strong>
										</div>
										';
										}
									 ?>
										<tr>
											<td><?php echo h($data[$i]['users']['name']); ?>&nbsp;</td>
											<td><?php echo h($data[$i]['aplicaciones']['codigoPostulante']); ?>&nbsp;</td>
											<td><?php echo $valor; ?></td>
											<td class="actions">
												<a class="btn" target = "_blank" href="<?php echo $this->webroot;?>admin/Aplicaciones/aplicacion/<?php echo $data[$i]['users']['id']; ?>">
													<i class='icon-search'></i> Ver
												</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				  </div>