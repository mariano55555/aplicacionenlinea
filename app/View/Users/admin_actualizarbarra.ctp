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
<div class="bottom">
    <div id="graph2" style="min-width: 310px; height: 400px; margin: 0 auto">
        <?php
        if (empty($data)) 
        {
        ?>
        <div class="alert alert-info" style="margin-bottom:0px !important">
            <strong>Intenta nuevamente!</strong>No hay informaci&oacute;n para los parametros consultados.
        </div>
        <?php
        }
        ?>
    </div>
</div>
<div class="bottom">
    <ul class="stats-overview">
        <li>
            <span class="name">Menor de 50%</span>
            <span class="value"><?php echo $menordecincuenta; ?></span>
        </li>
        <li>
            <span class="name">Entre 50% y 74.99%</span>
            <span class="value"><?php echo $mayorde50menor75; ?></span>
        </li>
        <li>
            <span class="name">Entre 75% y 99.99%</span>
            <span class="value"><?php echo $entre75y100; ?></span>
        </li>
        <?php if($nofinalizado > 0){ ?>
        <li>
            <span class="name">Completados no finalizados</span>
            <span class="value"><?php echo $nofinalizado; ?></span>
        </li>
        <?php } ?>
        <li>
            <span class="name">Finalizados</span>
            <span class="value"><?php echo $completado; ?></span>
        </li>
    </ul>
    <?php
    if (isset($mensaje)) {
        echo $mensaje;
    }
    ?>
</div>