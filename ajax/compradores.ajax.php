<?php

require_once "../controladores/compradores.controlador.php";
require_once "../modelos/comprador.modelo.php";

require_once "../controladores/boletas.controlador.php";
require_once "../modelos/boleta.modelo.php";

class AjaxCompradores
{
    public function ajaxVerCompradorBoletas(){

        $item='comprador_boletas.comDocumento';
        $valor = $this->documento;

        $respuesta = ControladorCompradores::ctrVerCompradorBoletas($item,$valor);

        $boletasCompradores = '';

        for ($i = 0; $i < count($respuesta); $i++){
            
            $boleta = $respuesta[$i]['boleta1'].'-'.$respuesta[$i]['boleta2']; 
            $boletasCompradores.="<span class='badge mr-1 rounded-pill bg-danger text-white'>$boleta</span>";
        }

        echo $boletasCompradores;

        
    }


    public function ajaxBuscarCompradorBoletas(){
        
        $item = 'bolId';
        $valor = $this->idBoleta;

        $verComprador = ControladorCompradores::ctrVerDatosComprador($item,$valor);
        
        for ($i = 0; $i < count($verComprador); $i++){

            $nombres =   $verComprador[$i]['nombres'];
            $apellidos = $verComprador[$i]['apellidos'];
            $celular =   $verComprador[$i]['celular'];
            $boletaId =  $verComprador[$i]['id'];
        
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

public function ajaxLiberarCompradorBoletas(){

    $item ='id';
    $valor = $this->idCompradorBoleta;

    $respuesta = ControladorCompradores::ctrVerDatosComprador($item,$valor);

    for ($i = 0; $i < count($respuesta); $i++){
        
        $valor = $respuesta[$i]['boleta'];
        
        $buscarBoleta = ControladorBoletas::ctrBuscarBoletaId($valor);
        
        $estado = 'N';
        $valor = $buscarBoleta[0]['bolNum1'];
        $item = 'bolVendida';
        
        $actualizarBoleta = ControladorBoletas::ctrCambiarEstadoBoleta($item,$valor,$estado);

        }

        $item ='id';
        $valor = $this->idCompradorBoleta;
        
        $eliminarCompradorBoleta = ControladorCompradores::ctrEliminarDatosComprador($item,$valor);

        echo $eliminarCompradorBoleta;

}

}

if (isset($_POST["documento"])) {

        $comprador                = new AjaxCompradores();
        $comprador->documento     = $_POST["documento"];
        $comprador->ajaxVerCompradorBoletas();
    
}

if (isset($_POST["idBoletaComprador"])) {

    $comprador                = new AjaxCompradores();
    $comprador->idBoleta     = $_POST["idBoletaComprador"];
    $comprador->ajaxBuscarCompradorBoletas();

}

if (isset($_POST["idCompradorBoleta"])) {

    $comprador                   = new AjaxCompradores();
    $comprador->idCompradorBoleta = $_POST["idCompradorBoleta"];
    $comprador->ajaxLiberarCompradorBoletas();

}








?>