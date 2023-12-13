<div class="row mt-5 animate__animated animate__fadeInDown">
    <div class="col-md-4 col-sm-12">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body text-center">
            <i class="fas fa-ticket-alt fa-4x"></i>
            <?php
            $item = "bolVendida";
            $valor = "S";
            $respuesta = ControladorBoletas::ctrContarBoletasAV($item, $valor);
            $conteo = count($respuesta);
            echo '<h1><strong>'.$conteo.'</strong></h1>';  
            ?>
            <h5>Boletas Vendidas</h5>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
    <div class="card shadow p-3 mb-5 bg-white rounded">
    <div class="card-body text-center">
            <i class="fab fa-stack-overflow fa-4x"></i>
            <?php
            $item = "bolAsignada";
            $valor = "S";
            $respuesta = ControladorBoletas::ctrContarBoletasAV($item,$valor);
            $conteo = count($respuesta);
            echo '<h1><strong>'.$conteo.'</strong></h1>';  
            ?>
            <h5>Boletas Entregadas</h5>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
    <div class="card shadow p-3 mb-5 bg-white rounded">
    <div class="card-body text-center">
            <i class="fas fa-clipboard-list fa-4x"></i>
            <?php
            $item = "bolAsignada";
            $valor = "N";
            $it = "AND";
            $item1 = "bolVendida";
            $valor1 = "N";
            $respuesta = ControladorBoletas::ctrContarBoletas($item, $item1, $valor, $valor1,$it);
            $conteo = count($respuesta);
            echo '<h1><strong>'.$conteo.'</strong></h1>';  
            ?>
            <h5>Boletas Disponibles</h5>
            </div>
        </div>
    </div>
</div>
