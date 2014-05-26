<script type="text/javascript">
function randomFeed(){
	var $el         = $("#randomFeed");
	var random      = new Array('<span class="label"><i class="icon-plus"></i></span><a href="#">John Doe</a> added a new photo',
								'<span class="label label-success"><i class="icon-user"></i></span> New user registered',
								'<span class="label label-info"><i class="icon-shopping-cart"></i></span> New order received',
								'<span class="label label-warning"><i class="icon-comment"></i></span> <a href="#">John Doe</a> commented on <a href="#">News #123</a>'),
	auto            = $el.parents(".box").find(".box-title .actions .custom-checkbox").hasClass("checkbox-active");
	var randomIndex = Math.floor(Math.random() * 4);
	var newElement  = random[randomIndex];
	if(auto){
		$el.prepend("<tr><td>"+newElement+"</td></tr>").find("tr").first().hide();
		$el.find("tr").first().fadeIn();
		if($el.find("tbody tr").length > 20){
			$el.find("tbody tr").last().fadeOut(400, function(){
				$(this).remove();
			});
		}
	}

	slimScrollUpdate($el.parents(".scrollable"));

	setTimeout(function(){
		randomFeed();
	}, 3000);
}
</script>

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
<script>
	$(function () {
    	
		// Build the chart
        $('#graph1').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'INSTITUCIONES POR PERIODO'
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


<script type="text/javascript">
var chart;
$(document).ready(function() {
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'graph2',
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

<script type="text/javascript">
	function ajax(anio, proceso){
		$.ajax({
			url: '<?php echo $this->webroot; ?>admin/Users/actualizardona',
			type: 'POST',
			data: {proceso: proceso, anio:anio},
		})
		.done(function(response) {
			$('#actualizardona').html(response);
		})
		.fail(function() {
			alert("No se cargaron los datos. Contacta al depto de informatica");
		})
	}
	function ajax1(anio, proceso){
		$.ajax({
			url: '<?php echo $this->webroot; ?>admin/Users/actualizarbarra',
			type: 'POST',
			data: {proceso: proceso, anio:anio},
		})
		.done(function(response) {
			$('#actualizarbarra').html(response);
		})
		.fail(function() {
			alert("No se cargaron los datos. Contacta al depto de informatica");
		})
	}	
</script>
				<?php
				echo $this->Header->display("DASHBOARD");
				echo $this->Breadcrumb->create(array(
					array(
						'title' => 'Dashboard',
						'url' => array('controller' => 'Users','action' => 'dashboard'),
						'class' => ''
					)
					)
				   );
				 ?>
				<br><br>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-bar-chart"></i>
									INSTITUCIONES POR PERIODO
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh" onclick="ajax($('#institucionesanio').val(),$('#institucionesproceso').val())">
										<i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<div class="statistic-big">
									<div class="top">
										<div class="left">
											<div class="input-medium">
												<select name="institucionesanio" class='chosen-select' data-nosearch="true" id="institucionesanio" onchange="ajax($(this).val(),$('#institucionesproceso').val())">
													<?php
													for ($i=$anio; $i <= date("Y") ; $i++) { 
														if ($i == date("Y")) {
															$selected = "selected";
														}else{
															$selected = "";
														}
													?>
													<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>

										<div class="left" style="padding-left:10px">
											<div class="input-medium">
												<select name="institucionesproceso" class='chosen-select' data-nosearch="true" id="institucionesproceso" onchange="ajax($('#institucionesanio').val(),$(this).val())">
													<?php foreach ($procesos as $key => $value) { ?>
														<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
													<?php } ?>
														<option value="999999" selected>Todos</option>
												</select>
											</div>
										</div>
										<div class="right">
											<?php echo $contador; ?> <span><i class="icon-circle-arrow-up"></i></span>
										</div>
									</div>
									<div id="actualizardona">
											<div class="bottom">
												<div id="graph1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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

				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color green box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-bar-chart"></i>
									POSTULANTES POR PORCENTAJE COMPLETADO
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh" onclick="ajax1($('#aniobarras').val(),$('#procesobarras').val())">
										<i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<div class="statistic-big">
									<div class="top">
										<div class="left">
											<div class="input-medium">
												<select name="aniobarras" class='chosen-select' data-nosearch="true" id="aniobarras" onchange="ajax1($(this).val(),$('#procesobarras').val())">
													<?php
													for ($i=$anio; $i <= date("Y") ; $i++) { 
														if ($i == date("Y")) {
															$selected = "selected";
														}else{
															$selected = "";
														}
													?>
													<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>

										<div class="left" style="padding-left:10px">
											<div class="input-medium">
												<select name="procesobarras" class='chosen-select' data-nosearch="true" id="procesobarras" onchange="ajax1($('#aniobarras').val(),$(this).val())">
													<?php foreach ($procesos as $key => $value) { ?>
														<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
													<?php } ?>
														<option value="999999" selected>Todos</option>
												</select>
											</div>
										</div>
										<div class="right">
											<?php echo count($barra); ?> <span><i class="icon-circle-arrow-up"></i></span>
										</div>
									</div>
									<div id="actualizarbarra">
											<div class="bottom">
												<div id="graph2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
											</div>
											<div class="bottom">
												<ul class="stats-overview">
													<li>
														<span class="name">
															Menor de 50%
														</span>
														<span class="value">
															<?php echo $menordecincuenta; ?>
														</span>
													</li>
													<li>
														<span class="name">
															Entre 50% y 74.99%
														</span>
														<span class="value">
															<?php echo $mayorde50menor75; ?>
														</span>
													</li>
													<li>
														<span class="name">
															Entre 75% y 99.99%
														</span>
														<span class="value">
															<?php echo $entre75y100; ?>
														</span>
													</li>
													<?php if($nofinalizado > 0){ ?>
													<li>
														<span class="name">
															Completados no finalizados
														</span>
														<span class="value">
															<?php echo $nofinalizado; ?>
														</span>
													</li>
												 <?php } ?>
													<li>
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
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3><i class="icon-user"></i>Postulantes <?php echo date("Y"); ?></h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content nopadding scrollable" data-height="300" data-visible="true">
								<table class="table table-user table-nohead">
									<tbody>
										<?php for ($i=0; $i < count($letras) ; $i++) { ?>
											<tr class="alpha">
												<td class="alpha-val">
													<span><?php echo strtoupper($letras[$i] )?></span>
												</td>
												<td colspan="2"></td>
											</tr>
										<?php for ($j=0; $j < count($postulantes) ; $j++) {  ?>
										<?php if(strtoupper($postulantes[$j]['users']['letra']) == $letras[$i]){ ?>
											<tr>
												<td class='img'><img src="<?php echo $this->webroot; ?>img/esen_header.png" alt="" height="40px" width="40px"></td>
												<td class='user'><?php echo $postulantes[$j]['users']['name']; ?></td>
												<td class='icon'><a href="#" class='btn'><i class="icon-search"></i></a></td>
											</tr>
										<?php    } ?>
										<?php   } ?>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="box box-color box-bordered green">
							<div class="box-title">
								<h3><i class="icon-bullhorn"></i>Noticias diarias</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini custom-checkbox checkbox-active">Actualizaci&oacute;n automatica<i class="icon-check-empty"></i>
									</a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content nopadding scrollable" data-height="400" data-visible="true">
								<table class="table table-nohead" id="randomFeed">
									<tbody>
										<tr>
											<td><span class="label"><i class="icon-plus"></i></span> <a href="#">John Doe</a> added a new photo</td>
										</tr>
										<tr>
											<td><span class="label label-success"><i class="icon-user"></i></span> New user registered</td>
										</tr>
										<tr>
											<td><span class="label label-info"><i class="icon-shopping-cart"></i></span> New order received</td>
										</tr>
										<tr>
											<td><span class="label label-warning"><i class="icon-comment"></i></span> <a href="#">John Doe</a> commented on <a href="#">News #123</a></td>
										</tr>
										<tr>
											<td><span class="label label-success"><i class="icon-user"></i></span> New user registered</td>
										</tr>
										<tr>
											<td><span class="label label-info"><i class="icon-shopping-cart"></i></span> New order received</td>
										</tr>
										<tr>
											<td><span class="label label-warning"><i class="icon-comment"></i></span> <a href="#">John Doe</a> commented on <a href="#">News #123</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>