<?php
if ($nofinalizado > 0) {
	$categorias = "[
                'Menor de 50%',
                'Entre 50% y 74.99%',
                'Entre 75% y 99.99%',
                'Completados no finalizados',
                'Finalizados'
                ]
		";

			$data="[
					{y: ".$menordecincuenta.", color:'#FF0000'}, 
					{y: ".$mayorde50menor75.", color:'#FFFF00'}, 
					{y: ".$entre75y100.", color:'#00BFFF'}, 
					{y: ".$nofinalizado.", color:'#00FA9A'}, 
					{y: ".$completado.", color:'#008000'}
				]";

}else{
	$categorias = "[
                'Menor de 50%',
                'Entre 50% y 74.99%',
                'Entre 75% y 99.99%',
                'Finalizados'
                ]
		";

			$data="[
					{y: ".$menordecincuenta.", color:'#FF0000'}, 
					{y: ".$mayorde50menor75.", color:'#FFFF00'}, 
					{y: ".$entre75y100.", color:'#00BFFF'}, 
					{y: ".$completado.", color:'#008000'}
				]";

}
?>
<script type="text/javascript">
var chart;
$(document).ready(function() {
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'graph6',
            type: 'column',
            //margin: [50, 50, 100, 80]
        },
        title: {
            text: 'PORCENTAJE DE AVANCE POR APLICACIONES'
        },
        xAxis: {
            categories: <?php echo $categorias; ?>
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Postulantes (#)'
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Postulantes',
            data: <?php echo $data; ?>
        }]
    });


});
</script>


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
											<th>Postulante</th>
											<th>Nacionalidad</th>
											<th>C&oacute;digo Postulaci&oacute;n</th>
											<th>Instituci&oacute;n</th>
											<th>Carrera</th>
											<th>Proceso</th>
											<th>Avance</th>
											<th>Acciones</th>
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
									 ?>
										<tr>
											<td><?php echo h($postulantes[$i]['users']['name']); ?>&nbsp;</td>
											<td><?php echo h($postulantes[$i]['paises']['name']); ?>&nbsp;</td>
											<td><?php echo strlen(trim($postulantes[$i]['aplicaciones']['codigoPostulante']) > 0) ? $postulantes[$i]['aplicaciones']['codigoPostulante'] : "Aplicación no finalizada"; ?>&nbsp;</td>
											<td>
												<?php 
													if(isset($postulantes[$i]['institucionesv']['name'])){
														echo h($postulantes[$i]['institucionesv']['name']).' ('.$postulantes[$i]['institucionesv']['pais'].' )';
													}else{
													 	echo $postulantes[$i]['institucionesv']['pais'];
													}
													 
												?>
											&nbsp;</td>
											<td><?php echo h($postulantes[$i]['carreras']['name']); ?>&nbsp;</td>
											<td><?php echo h($postulantes[$i]['procesos']['name']); ?>&nbsp;</td>
											<td><?php echo $valor; ?></td>
											<td class="actions">
												<a class="btn" target = "_blank" href="<?php echo $this->webroot;?>admin/Aplicaciones/aplicacion/<?php echo $postulantes[$i]['users']['id']; ?>">
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


<div class="row-fluid">
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-bar-chart"></i>
									INSTITUCIONES POR PERIODO
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<div class="statistic-big">
									<div class="top">
										<div class="right">
											<?php echo count($postulantes); ?> <span><i class="icon-circle-arrow-up"></i></span>
										</div>
									</div>
									<!--<div class="bottom">
										<div class="flot medium" id="flot-audience"></div>
									</div>-->
									<div class="bottom">
										<div id="graph6" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
									</div>
									<div class="bottom">
										<ul class="stats-overview">
											<li onclick="updatepost(1)" style="cursor:pointer">
												<span class="name">
													Menor de 50%
												</span>
												<span class="value">
													<?php echo $menordecincuenta; ?>
												</span>
											</li>
											<li onclick="updatepost(2)" style="cursor:pointer">
												<span class="name">
													Entre 50% y 74.99%
												</span>
												<span class="value">
													<?php echo $mayorde50menor75; ?>
												</span>
											</li>
											<li onclick="updatepost(3)" style="cursor:pointer">
												<span class="name">
													Entre 75% y 99.99%
												</span>
												<span class="value">
													<?php echo $entre75y100; ?>
												</span>
											</li>
											<?php if($nofinalizado > 0){ ?>
											<li onclick="updatepost(4)" style="cursor:pointer">
												<span class="name">
													Completados no finalizados
												</span>
												<span class="value">
													<?php echo $nofinalizado; ?>
												</span>
											</li>
										 <?php } ?>
											<li onclick="updatepost(5)" style="cursor:pointer">
												<span class="name">
													Finalizados
												</span>
												<span class="value">
													<?php echo $completado; ?>
												</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-bar-chart"></i>
									POSTULANTES POR PORCENTAJE COMPLETADO
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content" id="postulantestable">
								<div class="alert alert-info" style="margin-bottom:0px !important">
									<strong>Cuadro de postulantes</strong>&nbsp; Click en un rango de la legenda del gr&aacute;fico para actualizar la informaci&oacute;n
								</div>
							</div>
						</div>
					</div>
		</div>
		<script type="text/javascript">
		function updatepost(rango) {
			proceso = '<?php echo $proceso; ?>';
			anio    = '<?php echo $anio; ?>';
			$.ajax({
				url: '<?php echo $this->webroot; ?>admin/Aplicaciones/updatepost',
				type: 'POST',
				data: {rango: rango, proceso:proceso, anio:anio},
			})
			.done(function(response) {
				$('#postulantestable').html(response);
			})
			.fail(function() {
				alert("No se pudo cargar los datos. Consulta con el depto de informatica");
			})
		}
		</script>