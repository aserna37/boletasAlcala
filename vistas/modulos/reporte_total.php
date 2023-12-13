<h1 class="text-center"><span class="badge rounded-pill bg-warning text-dark">Reporte total con fecha</span></h1>
    <br>
    <h2 class="bg-danger text-center text-white p-2">
    <?php
        $dtz = new DateTimeZone("America/Bogota");
        $dt = new DateTime("now", $dtz);
        $currentTime = $dt->format("Y-m-d") . "  " . $dt->format("h:i:sa");
        echo $currentTime;
    ?>
  </h2>
<hr>

<div class="container text-center shadow p-3 mb-5 rounded">
    
<h1>No. boletas vendidas <span class="badge badge-pill badge-warning">
    <?php
    $valor=40000;
    $respuesta = ModeloReporte::mdlReportePagosTotales($valor);
    $total = $respuesta[0]['total'] ." ". 'boletas';
    echo $total;            
    ?>
    
</span></h1>
<hr>
<br>
<h1>No. boletas abonadas <span class="badge badge-pill badge-warning">
    <?php
    $respuesta = ModeloReporte::mdlReportePagosParciales();
    $total = $respuesta[0]['total'] ." ". 'boletas';
    echo $total;            
    ?>  

</span></h1>
<hr>
<br>
<h1>No. de boletas sin vender o abonar <span class="badge badge-pill badge-warning">
    <?php
    $valor=0;
    $respuesta = ModeloReporte::mdlReportePagosTotales($valor);
    $total = $respuesta[0]['total'] ." ". 'boletas';
    echo $total;            
    ?>  
</span></h1>
<hr>
<br>
<h1>Total dinero recolectado <span class="badge badge-pill badge-warning">
    <?php
    $respuesta = ModeloReporte::mdlReporteDineroRecolectado();
    $total = '$'. "". number_format($respuesta[0]['valorTotal']);
    echo $total;            
    ?>  
</span></h1>
<hr>
<br>
</div>







    