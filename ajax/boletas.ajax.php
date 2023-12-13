<?php

require_once "../controladores/boletas.controlador.php";
require_once "../modelos/boleta.modelo.php";

require_once "../controladores/vendedores.controlador.php";
require_once "../modelos/vendedor.modelo.php";

require_once "../controladores/compradores.controlador.php";
require_once "../modelos/comprador.modelo.php";




class AjaxBoletas
{

    public function ajaxVerBoleta()
        {
            $valor = $this->numeroBoleta;
                            
            $respuesta = ControladorBoletas::ctrBuscarBoletas($valor);

            for ($i = 0; $i < count($respuesta); $i++) {

                $boletaId = $respuesta[$i]['bolId'];

                if($respuesta[$i]['bolAsignada'] == 'S'){
                    
                    echo 'error';
                
                }else{
                    
                    $estado = $this->estado;
                    $valor = $this->numeroBoleta;
                    $item = 'bolAsignada';
                    
                    $actualizarBoleta = ControladorBoletas::ctrCambiarEstadoBoleta($item,$valor,$estado);

                    $datos = array(
                        "venDocumento"      => $this->documento,
                        "bolId"             => $boletaId,
                    );

                       $registroVendedor = ControladorVendedores::ctrAsignacionBoletaVendedor($datos);
    
                        echo $registroVendedor;
                    


                }

            }

        }
            
            
            public function ajaxVerBoletaComprador()
        {
            $valor = $this->numeroBoleta;
                            
            $respuesta = ControladorBoletas::ctrBuscarBoletas($valor);

            for ($i = 0; $i < count($respuesta); $i++) {

                $boletaId = $respuesta[$i]['bolId'];

                if($respuesta[$i]['bolVendida'] == 'S'){
                    
                    echo 'error';
                
                }else{
                    
                    $estado = $this->estado;
                    $valor = $this->numeroBoleta;
                    $item = 'bolVendida';
                    
                    $actualizarBoleta = ControladorBoletas::ctrCambiarEstadoBoleta($item, $valor, $estado);

                    $datos = array(
                        "comDocumento"      => $this->documento,
                        "bolId"             => $boletaId,
                    );

                       $registroComprador = ControladorCompradores::ctrAsignacionBoletaComprador($datos);
    
                        echo $registroComprador;
                    


                }

            }


            
        }




    }

 
// VALIDAR BOLETAS ************************************************

if (isset($_POST["documentoV"])) {
            
    $validarBoleta                   = new AjaxBoletas();
    $validarBoleta->documento       = $_POST["documentoV"];
    $validarBoleta->numeroBoleta     = $_POST["boletaV"];
    $validarBoleta->estado           = 'S';
    
    $validarBoleta->ajaxVerBoleta();
}

if (isset($_POST["documentoC"])) {
            
    $validarBoleta                   = new AjaxBoletas();
    $validarBoleta->documento       = $_POST["documentoC"];
    $validarBoleta->numeroBoleta     = $_POST["boletaC"];
    $validarBoleta->estado           = 'S';
    
    $validarBoleta->ajaxVerBoletaComprador();
}
    




?>