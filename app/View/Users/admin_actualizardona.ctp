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

<div class="bottom">
    <div id="graph1" style="min-width: 310px; height: 400px; margin: 0 auto">
        <?php
        if (empty($new)) 
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
            <span class="name">Total de postulantes</span>
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
