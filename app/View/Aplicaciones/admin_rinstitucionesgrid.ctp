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
/*debug($int1);
echo "<pre>";
print_r($instituciones);
echo "</pre>";*/
?>
<script>
	$(function () {
    	
		// Build the chart
        $('#graph3').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Instituciones por periodo'
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
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
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
											<th>Instituci&oacute;n</th>
											<th>Pa&iacute;s</th>
											<th>Departamento</th>
											<th># Postulantes</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach ($int1 as $key => $value) {
									 ?>
										<tr>
											<td><?php echo h($key); ?>&nbsp;</td>
											<td><?php echo h($value['pais']); ?>&nbsp;</td>
											<td><?php echo h($value['departamentos']); ?>&nbsp;</td>
											<td><?php echo h($value['contador']).' ('.number_format(($value['contador']*100)/$totalpostulantes,2).'% )'; ?>&nbsp;</td>
											<td class="actions">
												<a class="btn" onclick="view(<?php echo $value['tipo']; ?>,'<?php echo $this->webroot;?>admin\/Aplicaciones\/viewallbyint\/<?php echo $anio; ?>/<?php echo $proceso; ?>/<?php echo $value['tipo']; ?>/<?php echo $key;?>')"><i class='icon-search'></i> Ver</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				  </div>

				<script type="text/javascript">
				     function view(parameter, link) {
		   			   $.ajax({
					          url: link
				      })
				      .done(function(response) {
				          $('#subgridinstituciones').html(response);
				      })
				      .fail(function() {
				          console.log("No se pudieron cargar los datos. Consulte al departamento de IT");
				      })      
					}

				</script>

		<div class="row-fluid">
					<div class="span12">
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
											<?php echo $contador; ?> <span><i class="icon-circle-arrow-up"></i></span>
										</div>
									</div>
									<!--<div class="bottom">
										<div class="flot medium" id="flot-audience"></div>
									</div>-->
									<div class="bottom">
										<div id="graph3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
									</div>
									<div class="bottom">
										<ul class="stats-overview">
											<li>
												<span class="name">
													Total de postulantes
												</span>
												<span class="value">
													<?php echo $totalpostulantes; ?>
												</span>
											</li>
											<li>
												<span class="name">
													Total de instituciones
												</span>
												<span class="value">
													<?php echo count($int1); ?>
												</span>
											</li>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>