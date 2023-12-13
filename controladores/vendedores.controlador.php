<?php

class ControladorVendedores
{

    public static function ctrMostrarVendedores()
    {

        $respuesta = ModeloVendedores::mdlMostrarVendedores();

        return $respuesta;

    }

    public static function ctrAsignacionBoletaVendedor($datos)
    {
        $tabla = 'vendedor_boletas';

        $datosVendedor = array(
            "venDocumento"      => $datos['venDocumento'],
            "bolId"             => $datos['bolId'],
        );

        $respuesta = ModeloVendedores::mdlAsignacionBoletaVendedor($tabla, $datosVendedor);

        return $respuesta;

    } 


    public static function ctrVerVendedorBoletas($item, $valor)
    {
        $respuesta = ModeloVendedores::mdlVerVendedorBoletas($item, $valor);

        return $respuesta;

    }

    public static function ctrVerDatosVendedor($item, $valor)
    {
        $respuesta = ModeloVendedores::mdlVerDatosVendedor($item, $valor);

        return $respuesta;

    }

    public static function ctrEliminarDatosVendedor($item, $valor)
    {
        $tabla = 'vendedor_boletas';

        $respuesta = ModeloVendedores::mdlEliminarVendedorBoleta($tabla, $item, $valor);

        return $respuesta;

    } 


    



    



}