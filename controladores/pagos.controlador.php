<?php

class ControladorPagos
{

    public static function ctrAgregarPago($datos){

        $datosPago = array(
            
            "pagBoleta"     => $datos["pagBoleta"],
            "pagValor"      => $datos["pagValor"],
            "fecha"         => $datos["fecha"],
        );

        $respuesta = ModeloPago::mdlAgregarPago("pagos", $datosPago);

        return $respuesta;
    }

    public static function ctrActualizarValor($item, $total)
    {
        $tabla = 'boletas';
        
        $respuesta = ModeloPago::mdlActualizarValor($tabla, $item, $total);

        return $respuesta;
    }

    public static function ctrBuscarPagos($item, $valor)
    {
        $tabla = 'pagos';
        
        $respuesta = ModeloPago::mdlBuscarPagos($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrValidarAbono($boleta)
    {
        $tabla = 'pagos';
        
        $respuesta = ModeloPago::mdlValidarAbono($tabla, $boleta);

        return $respuesta;
    }

    public static function ctrBuscarPagosFecha($valor)
    {
        $tabla = 'pagos';
        
        $respuesta = ModeloPago::mdlBuscarPagosFecha($tabla, $valor);

        return $respuesta;
    }

}

?>