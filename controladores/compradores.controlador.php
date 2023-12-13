<?php

class ControladorCompradores
{

    public static function ctrMostrarCompradores()
    {

        $respuesta = ModeloCompradores::mdlMostrarCompradores();

        return $respuesta;

    }

    public static function ctrAsignacionBoletaComprador($datos)
    {
        $tabla = 'comprador_boletas';

        $datosComprador = array(
            "comDocumento"      => $datos['comDocumento'],
            "bolId"             => $datos['bolId'],
        );

        $respuesta = ModeloCompradores::mdlAsignacionBoletaComprador($tabla, $datosComprador);

        return $respuesta;

    } 


    public static function ctrVerCompradorBoletas($item, $valor)
    {
        $respuesta = ModeloCompradores::mdlVerCompradorBoletas($item, $valor);

        return $respuesta;

    }

    public static function ctrVerDatosComprador($item, $valor)
    {
        $respuesta = ModeloCompradores::mdlVerDatosComprador($item, $valor);

        return $respuesta;

    }

    public static function ctrEliminarDatosComprador($item, $valor)
    {
        $tabla = 'comprador_boletas';

        $respuesta = ModeloCompradores::mdlEliminarCompradorBoleta($tabla, $item, $valor);

        return $respuesta;

    } 


    



    



}