<?php
require_once "conexion.php";

class ModeloPersona
{
    public static function mdlIngresarPersona($tabla, $datos)
    
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(perNumero, perTipo, perNombres, perApellidos, perDireccion, perCelular, perEmail, perCiudad, perEstado, perVendedor, perComprador) VALUES 
        (:documento, :tipo, :nombres, :apellidos, :direccion, :celular, :email, :municipio, :estado, :vendedor, :comprador)");

        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":municipio", $datos["municipio"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":vendedor", $datos["vendedor"], PDO::PARAM_STR);
        $stmt->bindParam(":comprador", $datos["comprador"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    public static function mdlValidarPersona($tabla, $item, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * from $tabla WHERE $item =:item");

        $stmt->bindParam(":item", $valor, PDO::PARAM_STR);

        $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;
    }

    public static function mdlActualizarPersonaVendedor($tabla, $item, $valor, $item1, $valor1)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :item1 WHERE $item = :item");

        $stmt->bindParam(":item1", $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":item", $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;
    }








}

?>