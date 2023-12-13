<?php
require_once "conexion.php";

class ModeloReporte
{
    public static function mdlReportePagosTotales($valor)
    
    {
        $stmt = Conexion::conectar()->prepare("SELECT count(bolTotal) as total FROM boletas WHERE bolTotal = :valor");

        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();
    
        $stmt->close();
    
        $stmt = null;

    }

    public static function mdlReportePagosParciales()
    
    {
        $stmt = Conexion::conectar()->prepare("SELECT count(bolTotal) as total FROM boletas WHERE bolTotal <> 0 AND bolTotal <> 40000");

        $stmt->execute();

        return $stmt->fetchAll();
    
        $stmt->close();
    
        $stmt = null;

    }

    public static function mdlReporteDineroRecolectado()
    
    {
        $stmt = Conexion::conectar()->prepare("SELECT SUM(pagValor) as valorTotal FROM pagos");

        $stmt->execute();

        return $stmt->fetchAll();
    
        $stmt->close();
    
        $stmt = null;

    }

    
}

?>