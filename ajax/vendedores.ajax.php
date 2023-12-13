<?php

require_once "../controladores/vendedores.controlador.php";
require_once "../modelos/vendedor.modelo.php";

require_once "../controladores/boletas.controlador.php";
require_once "../modelos/boleta.modelo.php";

class AjaxVendedores
{
    public function ajaxVerVendedorBoletas(){

        $item='vendedor_boletas.venDocumento';
        $valor = $this->documento;

        $respuesta = ControladorVendedores::ctrVerVendedorBoletas($item,$valor);

        $boletasVendedores = '';

        for ($i = 0; $i < count($respuesta); $i++){
            
            $boleta = $respuesta[$i]['boleta1'].'-'.$respuesta[$i]['boleta2']; 
            $boletasVendedores.="<span class='badge mr-1 rounded-pill bg-danger text-white'>$boleta</span>";
        }

        echo $boletasVendedores;

        
    }


    public function ajaxBuscarVendedorBoletas(){
        
        $item = 'bolId';
        $valor = $this->idBoleta;

        $verVendedor = ControladorVendedores::ctrVerDatosVendedor($item,$valor);
        
        for ($i = 0; $i < count($verVendedor); $i++){

            $nombres = $verVendedor[$i]['nombres'];
            $apellidos = $verVendedor[$i]['apellidos'];
            $celular = $verVendedor[$i]['celular'];
            $boletaId = $verVendedor[$i]['id'];
        
        $buscarBoleta = ControladorBoletas::ctrBuscarBoletaId($valor);

        $boleta = $buscarBoleta[0]['bolNum1'].'-'.$buscarBoleta[0]['bolNum2'];   
            
        
        echo '<div class="row">
        <div class="col-6 mb-3 text-center">
        Nombres <br>
        <strong>'.strtoupper($nombres).'</strong></div>  
        <div class="col-6 mb-3 text-center">
        Apellidos <br>
        <strong>'.strtoupper($apellidos).'</strong></div> 
        <div class="col-6 text-center">
        Celular <br>
        <strong>'.strtoupper($celular).'</strong></div>  
        <div class="col-6 text-center">
        No. Boleta <br>
        <strong>'.$boleta.'</strong></div>
        <div class="col-12 text-center" hidden>
        BoletaId <br>
        <strong id="boletaId">'.$boletaId.'</strong></div> 
        </div>
        <br>
        ';
    }
}

public function ajaxLiberarVendedorBoletas(){

    $item ='id';
    $valor = $this->idVendedorBoleta;

    $respuesta = ControladorVendedores::ctrVerDatosVendedor($item,$valor);

    for ($i = 0; $i < count($respuesta); $i++){
        
        $valor = $respuesta[$i]['boleta'];
        
        $buscarBoleta = ControladorBoletas::ctrBuscarBoletaId($valor);
        
        $estado = 'N';
        $valor = $buscarBoleta[0]['bolNum1'];
        $item = 'bolAsignada';
        
        $actualizarBoleta = ControladorBoletas::ctrCambiarEstadoBoleta($item,$valor,$estado);

        }

        $item ='id';
        $valor = $this->idVendedorBoleta;
        
        $eliminarVendedorBoleta = ControladorVendedores::ctrEliminarDatosVendedor($item,$valor);

        echo $eliminarVendedorBoleta;

        

    
}

}

if (isset($_POST["documento"])) {

        $vendedor                = new AjaxVendedores();
        $vendedor->documento     = $_POST["documento"];
        $vendedor->ajaxVerVendedorBoletas();
    
}

if (isset($_POST["idBoletaVendedor"])) {

    $vendedor                = new AjaxVendedores();
    $vendedor->idBoleta     = $_POST["idBoletaVendedor"];
    $vendedor->ajaxBuscarVendedorBoletas();

}

if (isset($_POST["idVendedorBoleta"])) {

    $vendedor                   = new AjaxVendedores();
    $vendedor->idVendedorBoleta = $_POST["idVendedorBoleta"];
    $vendedor->ajaxLiberarVendedorBoletas();

}








?>