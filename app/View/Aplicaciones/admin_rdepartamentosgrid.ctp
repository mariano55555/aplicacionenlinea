<?php
/*echo "<pre>";
print_r($data);
echo "</pre>";*/

?>
<?php

if ($otros > 0) {
	$serie = "[";
	$i     = 1;
	$total = count($new);
	foreach ($new as $key => $value) {
		$serie.='["'.$key.'",'.$value.'],';
	}
	$serie.='["otros",'.$otros.']]';
}else{
	$serie = "[";
	$i     = 1;
	$total = count($new);
	foreach ($new as $key => $value) {
		if ($total == $i) {
			$serie.='["'.$key.'",'.$value.']]';
		}else{
			$serie.='["'.$key.'",'.$value.'],';
		}
	$i++;
	}
}

?>
<script>
	$(function () {
    	
		// Build the chart
        $('#graph7').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Departamentos por periodo'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Participación',
                data: <?php echo $serie; ?>
            }]
        });
    });


</script>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-group"></i>
									DEPARTAMENTOS
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-bordered table-hover table-nomargin table-striped dataTable dataTable-reorder dataTable-colvis">
									<thead>
										<tr>
											<th>Departamento / Ciudad</th>
											<th>Pa&iacute;s</th>
											<th>Postulantes</th>
											<th>Participaci&oacute;n</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($new1 as $key => $value) {
									 ?>
										<tr>
											<td><?php echo h($key); ?>&nbsp;</td>
											<td><?php echo h($value['pais']); ?>&nbsp;</td>
											<td><?php echo h($value['contador']); ?>&nbsp;</td>
											<td><?php echo ($value['participacion']).' %'; ?>&nbsp;</td>
											<td class="actions">
												<a class="btn" onclick="postulante(<?php echo $value['tipo']; ?>,'<?php echo $this->webroot;?>admin\/Aplicaciones\/viewallbydepto\/<?php echo $anio; ?>/<?php echo $proceso; ?>/<?php echo $key; ?>/<?php echo $value['tipo'] ; ?>')"><i class='icon-search'></i> Ver</a>
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
									DEPARTAMENTOS POR PERIODO
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
											<?php echo $total; ?> <span><i class="icon-circle-arrow-up"></i></span>
										</div>
									</div>
									<!--<div class="bottom">
										<div class="flot medium" id="flot-audience"></div>
									</div>-->
									<div class="bottom">
										<div id="graph7" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
									</div>
									<div class="bottom">
										<ul class="stats-overview">
											<li>
												<span class="name">
													Menor de 50%
												</span>
												<span class="value">
													<?php #echo $menordecincuenta; ?>
												</span>
											</li>
											<li>
												<span class="name">
													Entre 50% y 74.99%
												</span>
												<span class="value">
													<?php #echo $mayorde50menor75; ?>
												</span>
											</li>
											<li>
												<span class="name">
													Entre 75% y 99.99%
												</span>
												<span class="value">
													<?php #echo $nofinalizado; ?>
												</span>
											</li>
											<li>
												<span class="name">
													Finalizados
												</span>
												<span class="value">
													<?php# echo $completado; ?>
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
									POSTULANTES POR DEPARTAMENTO
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content" id="deptotable">
								<div class="alert alert-info" style="margin-bottom:0px !important">
									<strong>Cuadro de postulantes por departamento</strong>&nbsp; Click en "ver" del cuadro de departamentos para ver los postulantes
								</div>
							</div>
						</div>
					</div>
					</div>
					<script type="text/javascript">
					function postulante(tipo, link) {
						$.ajax({
							url: link
						})
						.done(function(response) {
							$('#deptotable').html(response);
						})
						.fail(function() {
							alert("No se pudieron cargar los datos. Contacte al depto de informatica");
						})				
					}
					</script>