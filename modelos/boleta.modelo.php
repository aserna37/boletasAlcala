<?php

require_once "conexion.php";

class ModeloBoleta
{
// Mostrar Productos
    
public static function mdlMostrarBoleta()
    {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM boletas ORDER by bolId");
            
            $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;

    }

    public static function mdlBuscarBoleta($valor)
    {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM boletas WHERE bolNum1 =:valor OR bolNum2=:valor");

            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;

    }

    public static function mdlCambiarEstadoBoleta($item, $valor, $estado)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE boletas SET $item = :estado WHERE bolNum1 =:valor OR bolNum2=:valor");

        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
                  return "ok";
  
            } else {
  
                return "error";
            }
    
            $stmt->close();
            $stmt = null;
    }

    public static function mdlBuscarBoletaId($valor)
    {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM boletas WHERE bolId =:valor");

            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;

    }

    public static function mdlContarBoletas($tabla, $item, $item1, $valor, $valor1, $it)
    {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:valor $it $item1 =:valor1");

            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
            $stmt->bindParam(":valor1", $valor1, PDO::PARAM_STR);
            
            
            $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;

    }

    public static function mdlContarBoletasAV($tabla, $item, $valor)
    {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:valor");

            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
            
                       
            $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;

    }

}