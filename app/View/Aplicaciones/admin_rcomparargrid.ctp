<?php

if ($rango == 1) {
	$titulo = "GRAFICO COMPARATIVO DE LOS AÑOS " .$anio1." y ".$anio2;
}else{
	$titulo = "GRAFICO COMPARATIVO ENTRE LOS AÑOS " .$anio1." y ".$anio2;
}

$categorias = "[";
	for ($i=0; $i < count($proc); $i++) { 
		if ($i == count($proc)-1) {
		$categorias .= "'".$proc[$i]."']";
		}else{
		$categorias .= "'".$proc[$i]."',";	
		}
	}
	$a = 1;
	$serie="";
	foreach ($new as $key => $value) {
		$serie.='{name:"'.$key.'",data:[';
		$l = 1;
		foreach ($value as $k => $v) {
			if (count($new) == $a) {
				if (count($value) == $l) {
					$serie.=$v.']';
				}else{
					$serie.=$v.',';
				}
				
			}else{
				if (count($value) == $l) {
					$serie.=$v.']';
				}else{
					$serie.=$v.',';
				}
			}
			$l++;
		}
		if (count($new) == $a) {
			$serie .= "}";
		}else{
			$serie .= "},";
		}
	$a++;
	}

if (count($ejes) == 1 || count($proc) == 1) {
?>
<script type="text/javascript">
$(function () {
        $('#graph9').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: '<?php echo $titulo; ?>'
            },
            subtitle: {
                text: 'Fuente: ESEN WEBAPP'
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
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
	            <?php echo $serie; ?>
            ]
        });
    });
</script>
		<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-bar-chart"></i>
									GRAFICO COMPARATIVO
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
											<?php #echo count($postulantes); ?> <span><i class="icon-circle-arrow-up"></i></span>
										</div>
									</div>
									<!--<div class="bottom">
										<div class="flot medium" id="flot-audience"></div>
									</div>-->
									<div class="bottom">
										<div id="graph9" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
									</div>
									<div class="bottom">
										<ul class="stats-overview">
											<li onclick="updatepost(1)" style="cursor:pointer">
												<span class="name">
													Menor de 50%
												</span>
												<span class="value">
													<?php #echo $menordecincuenta; ?>
												</span>
											</li>
											<li onclick="updatepost(2)" style="cursor:pointer">
												<span class="name">
													Entre 50% y 74.99%
												</span>
												<span class="value">
													<?php #echo $mayorde50menor75; ?>
												</span>
											</li>
											<li onclick="updatepost(3)" style="cursor:pointer">
												<span class="name">
													Entre 75% y 99.99%
												</span>
												<span class="value">
													<?php #echo $nofinalizado; ?>
												</span>
											</li>
											
											<li onclick="updatepost(5)" style="cursor:pointer">
												<span class="name">
													Finalizados
												</span>
												<span class="value">
													<?php #echo $completado; ?>
												</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>

<?php
}else{
?>
<script type="text/javascript">
$(function () {
        $('#graph9').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: '<?php echo $titulo; ?>'
            },
            subtitle: {
                text: 'Fuente: ESEN WEBAPP'
            },
            xAxis: {
                categories: <?php echo $categorias; ?>
            },
            yAxis: {
                title: {
                    text: 'Postulantes (#)'
                }
            },
            tooltip: {
                enabled: false,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'°C';
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true,
                        style: {
                            textShadow: '0 0 3px white, 0 0 3px white'
                        }
                    },
                    enableMouseTracking: false
                }
            },
            series: [
                   <?php echo $serie; ?>
            ]
        });
    });
    


</script>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-bar-chart"></i>
									GRAFICO COMPARATIVO
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
											<?php #echo count($postulantes); ?> <span><i class="icon-circle-arrow-up"></i></span>
										</div>
									</div>
									<!--<div class="bottom">
										<div class="flot medium" id="flot-audience"></div>
									</div>-->
									<div class="bottom">
										<div id="graph9" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
									</div>
									<div class="bottom">
										<ul class="stats-overview">
											<li onclick="updatepost(1)" style="cursor:pointer">
												<span class="name">
													Menor de 50%
												</span>
												<span class="value">
													<?php #echo $menordecincuenta; ?>
												</span>
											</li>
											<li onclick="updatepost(2)" style="cursor:pointer">
												<span class="name">
													Entre 50% y 74.99%
												</span>
												<span class="value">
													<?php #echo $mayorde50menor75; ?>
												</span>
											</li>
											<li onclick="updatepost(3)" style="cursor:pointer">
												<span class="name">
													Entre 75% y 99.99%
												</span>
												<span class="value">
													<?php #echo $nofinalizado; ?>
												</span>
											</li>
											
											<li onclick="updatepost(5)" style="cursor:pointer">
												<span class="name">
													Finalizados
												</span>
												<span class="value">
													<?php #echo $completado; ?>
												</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
<?php
}
?>