<?php

class ControladorPersonas{

    public static function ctrCrearPersonas($datos)
    {
        $datosPersona = array(
            "tipo"          => $datos["tipo"],
            "documento"     => $datos["documento"],
            "nombres"       => $datos["nombres"],
            "apellidos"     => $datos["apellidos"],
            "direccion"     => $datos["direccion"],
            "celular"       => $datos["celular"],
            "email"         => $datos["email"],
            "municipio"     => $datos["municipio"],
            "estado"        => $datos["estado"],
            "vendedor"      => $datos["vendedor"],
            "comprador"     => $datos["comprador"],
        );

        $respuesta = ModeloPersona::mdlIngresarPersona("personas", $datosPersona);

        return $respuesta;
    }

    public static function ctrValidarPersona($item, $valor)
    {
        $tabla = 'personas';
        
        $respuesta = ModeloPersona::mdlValidarPersona($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrActualizarPersonaVendedor($item, $valor, $item1, $valor1)
    {
        $tabla = 'personas';
        
        $respuesta = ModeloPersona::mdlActualizarPersonaVendedor($tabla, $item, $valor, $item1, $valor1);

        return $respuesta;
    }
}




?>