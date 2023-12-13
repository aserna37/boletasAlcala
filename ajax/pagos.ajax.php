<?php

require_once "../controladores/boletas.controlador.php";
require_once "../modelos/boleta.modelo.php";

require_once "../controladores/pagos.controlador.php";
require_once "../modelos/pago.modelo.php";


class AjaxPagos
{
    public function ajaxValidarPagoBoleta()

        {

           $boleta  = $this->pagBoleta;
           $valor   = $this->pagValor;
           $fecha   = $this->fecha;
    

        $validarBoleta = ControladorPagos::ctrValidarAbono($boleta);

        if($validarBoleta[0]['SUMA'] == NULL ){
            
            if($valor > 40000){
                echo 'error';
            
            }else{

                $datos = array(
                                "pagBoleta"     => $boleta,
                                "pagValor"      => $valor,
                                "fecha"         => $fecha
                            );

                $agregarAbono = ControladorPagos::ctrAgregarPago($datos);

                $item = $boleta;
                $total = $valor;

                $actualidadPago = ControladorPagos::ctrActualizarValor($item,$total);

                echo $actualidadPago;
                
            } 

        }else{
            
            $totalAbonos = $validarBoleta[0]['SUMA'] + $valor;

            if($totalAbonos > 40000){
                echo 'error';
                           
            }else{

                $datos = array(
                    "pagBoleta"     => $boleta,
                    "pagValor"      => $valor,
                    "fecha"         => $fecha
                );

                $agregarAbono = ControladorPagos::ctrAgregarPago($datos);

                $item = $boleta;
                $total = $totalAbonos;

                $actualidadPago = ControladorPagos::ctrActualizarValor($item,$total);

                echo $actualidadPago;
                
            }
        }     

        






        //     $valor = $this->pagBoleta;

        //     $valorTotalBoleta = 0;
            
        //     $boleta = ControladorBoletas::ctrBuscarBoletas($valor);

        //     for ($i = 0; $i < count($boleta); $i++){

        //         $valorTotalBoleta = intval($boleta[$i]['bolTotal']) + intval($this->pagValor);

        //     };

        //     if($valorTotalBoleta > 40000){
                
        //       echo 'error';
            
        //     }else{

        //         $datos = array(
        //             "pagBoleta"     => $this->pagBoleta,
        //             "pagValor"      => $this->pagValor,
        //             "fecha"         => $this->fecha,
        //         );

                
        //         $agregarAbono = ControladorPagos::ctrAgregarPago($datos);

        //         $item = $this->pagBoleta;
        //         $total = $valorTotalBoleta;

        //         $actualidadPago = ControladorPagos::ctrActualizarValor($item,$total);

        //         echo $actualidadPago;
                

        //    }

    }

        public function ajaxBuscarPagoBoleta()

        {
            $item  = 'pagBoleta';
            $valor = $this->BoletaId;
            
            $busqueda = ControladorPagos::ctrBuscarPagos($item,$valor);

            echo json_encode($busqueda);

        }

        public function ajaxBuscarPagosFecha(){
            
            $valor = $this->fechaPago;

            //echo $valor;

            $respuesta = ControladorPagos::ctrBuscarPagosFecha($valor);

            $total = '$'. "". number_format($respuesta[0]['suma']);

            $datos = array(
                "cantidad"      => $respuesta[0]['cantidad'],
                "suma"          => $total,
            );

            echo json_encode($datos);
        }


}

if (isset($_POST["boletaIdPago"])) {

    date_default_timezone_set("America/Bogota");
            
    $validarBoleta                   = new AjaxPagos();
    $validarBoleta->pagBoleta       = $_POST["boletaIdPago"];
    $validarBoleta->pagValor        = intval($_POST["valor"]);
    $validarBoleta->fecha           = $_POST["fecha"];
    
    $validarBoleta->ajaxValidarPagoBoleta();
}

if (isset($_POST["idBoletaA"])) {

    $buscarPagos                   = new AjaxPagos();
    $buscarPagos->BoletaId       = $_POST["idBoletaA"];
        
    $buscarPagos->ajaxBuscarPagoBoleta();
}

if(isset($_POST["fechaPago"])){

    $pagoBoletas = new AjaxPagos();
    $pagoBoletas->fechaPago = $_POST["fechaPago"];
    $pagoBoletas->ajaxBuscarPagosFecha();

}





?>