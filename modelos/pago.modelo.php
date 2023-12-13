<?php
require_once "conexion.php";

class ModeloPago
{
    public static function mdlAgregarPago($tabla, $datos)
    
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(pagBoleta, pagValor, fecha) VALUES 
        (:pagBoleta, :pagValor, :fecha)");

        $stmt->bindParam(":pagBoleta", $datos["pagBoleta"], PDO::PARAM_STR);
        $stmt->bindParam(":pagValor", $datos["pagValor"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    public static function mdlActualizarValor($tabla, $item, $total)
    
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET bolTotal = :valor WHERE bolId = :item");

        $stmt->bindParam(":valor", $total, PDO::PARAM_STR);
        $stmt->bindParam(":item", $item, PDO::PARAM_STR);
                
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }


    public static function mdlValidarAbono($tabla,$boleta){

        $stmt = Conexion::conectar()->prepare("SELECT SUM(pagValor) as SUMA FROM $tabla WHERE pagBoleta = :valor");
        
        $stmt->bindParam(":valor", $boleta, PDO::PARAM_STR);
        
        $stmt->execute();

        return $stmt->fetchAll();
    
        $stmt->close();
    
        $stmt = null;

    }

    public static function mdlBuscarPagos($tabla, $item, $valor)
    
    {
        $stmt = Conexion::conectar()->prepare("SELECT boletas.bolNum1 as Numero1,
                                                      boletas.bolNum2 as Numero2,
                                                      pagos.pagValor as pago,
                                                      pagos.fecha as fecha
                                                  FROM boletas 
                                                  INNER JOIN pagos ON boletas.bolId = pagos.pagBoleta
                                                  WHERE pagos.pagBoleta = :valor");
        
        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
        
    $stmt->execute();

    return $stmt->fetchAll();
    
                
    $stmt->close();
    
    $stmt = null;

    }


    public static function mdlBuscarPagosFecha($tabla, $valor)

        {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad, SUM(pagValor) as suma FROM $tabla WHERE fecha =:valor");
            
            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return $stmt->fetchAll();
                            
            $stmt->close();
        
            $stmt = null;

         }
}

?>