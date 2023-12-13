<?php

class ControladorBoletas
{

    public static function ctrMostrarBoletas(){

        $respuesta = ModeloBoleta::mdlMostrarBoleta();

        return $respuesta;

    }

    public static function ctrBuscarBoletas($valor){

        $respuesta = ModeloBoleta::mdlBuscarBoleta($valor);

        return $respuesta;

    }

    public static function ctrBuscarBoletaId($valor){

        $respuesta = ModeloBoleta::mdlBuscarBoletaId($valor);

        return $respuesta;

    }


    public static function ctrCambiarEstadoBoleta($item, $valor, $estado){
        
        $respuesta = ModeloBoleta::mdlCambiarEstadoBoleta($item, $valor, $estado);
       
        return $respuesta; 
    }

    public static function ctrContarBoletas($item, $item1, $valor, $valor1, $it){
        
        $tabla = 'boletas';

        $respuesta = ModeloBoleta::mdlContarBoletas($tabla, $item, $item1, $valor, $valor1, $it);
        
        return $respuesta;
    }

    public static function ctrContarBoletasAV($item,$valor){
        
        $tabla = 'boletas';

        $respuesta = ModeloBoleta::mdlContarBoletasAV($tabla, $item, $valor);
        
        return $respuesta;
    }


    



    



}