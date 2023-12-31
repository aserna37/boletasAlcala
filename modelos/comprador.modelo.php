<?php

require_once "conexion.php";

class ModeloCompradores
{
// Mostrar Productos
    
public static function mdlMostrarCompradores()
    {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM personas WHERE perComprador = 'S'");
                      
            $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;

    }

    public static function mdlAsignacionBoletaComprador($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(comDocumento, bolId) VALUES 
        (:documento, :bolId)");

        $stmt->bindParam(":documento", $datos["comDocumento"], PDO::PARAM_STR);
        $stmt->bindParam(":bolId", $datos["bolId"], PDO::PARAM_STR);
                      
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    public static function mdlVerCompradorBoletas($item, $valor)
    {

            $stmt = Conexion::conectar()->prepare("SELECT boletas.bolNum1 as boleta1,
                                                          boletas.bolNum2 as boleta2,
                                                          boletas.bolId as boletaId,
                                                          comprador_boletas.id as boletaVenId
                                                          FROM boletas 
                                                          INNER JOIN comprador_boletas ON
                                                                boletas.bolId = comprador_boletas.bolId 
                                                          WHERE $item = :item");
                      
            $stmt->bindParam(":item", $valor, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;

    }

    public static function mdlVerDatosComprador($item, $valor)
    {

            $stmt = Conexion::conectar()->prepare("SELECT personas.perNombres as nombres,
                                                          personas.perApellidos as apellidos,
                                                          personas.perCelular as celular,
                                                          comprador_boletas.id as id,
                                                          comprador_boletas.bolId as boleta
                                                          FROM comprador_boletas 
                                                          INNER JOIN personas ON
                                                                comprador_boletas.comDocumento = personas.perId 
                                                          WHERE $item = :item");
                      
            $stmt->bindParam(":item", $valor, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return $stmt->fetchAll();
       
            $stmt->close();
    
            $stmt = null;

    }

    public static function mdlEliminarCompradorBoleta($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("DELETE from $tabla WHERE $item =:item");

        $stmt->bindParam(":item", $valor, PDO::PARAM_STR);
                      
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }


//     public static function mdlIngresarProducto($tabla, $datos)
    
//     {
//         $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, valor_unidad, estado) VALUES 
//         (:nombre, :valor_unidad, :estado)");

//         $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
//         $stmt->bindParam(":valor_unidad", $datos["valor_unidad"], PDO::PARAM_STR);
//         $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
    
//         if ($stmt->execute()) {

//             return "ok";

//         } else {

//             return "error";

//         }

//         $stmt->close();
//         $stmt = null;

//     }


//     public static function mdlEstadoProducto($tabla, $item1, $item2)
    
//     {
        
        
//         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $tabla.estado = :item1
//                                                WHERE $tabla.id = :item2");
        
//         $stmt->bindValue(":item1", $item1, PDO::PARAM_INT);
//         $stmt->bindValue(":item2", $item2, PDO::PARAM_INT);
        
//         if ($stmt->execute()) {

//             return "ok";

//         } else {

//             return "error";

//         }

//         $stmt->close();
//         $stmt = null;

//     }


//     public static function mdlEditarProducto($tabla, $datos)
    
// {
//     $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, valor_unidad=:valor_unidad, fecha_modificacion=:fecha_modificacion WHERE id = :id");

//     $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
//     $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
//     $stmt->bindParam(":valor_unidad", $datos["valor_unidad"], PDO::PARAM_STR);
//     $stmt->bindParam(":fecha_modificacion", $datos["fecha_modificacion"], PDO::PARAM_STR);

//     if ($stmt->execute()) {

//         return "ok";

//     } else {

//         return "error";

//     }

//     $stmt->close();
//     $stmt = null;

// }

// public static function mdlGuardarProductoDetalle($tabla, $tabla1, $datos)
//     {

//         $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha, producto_id, cantidad) VALUES 
//         (:fecha, :producto_id, :cantidad)");

//         $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
//         $stmt->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_STR);
//         $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
    
//         $stmt->execute();

               
//         $stmt1 = Conexion::conectar()->prepare("SELECT SUM(cantidad) as total FROM $tabla WHERE producto_id=:producto_id");

//         $stmt1->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_STR);

//         $stmt1->execute();

//         $res = $stmt1->fetch();
//         $total = $res['total'];

        

//         $stmt2 = Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE producto_id=:producto_id");

//         $stmt2->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_STR);
        
//         $stmt2->execute();
        
//         $resultado = $stmt2->fetchAll();

//         $contar = count($resultado);
                
//         if($contar == 0){
            
//             $totalAcumulado = Conexion::conectar()->prepare("INSERT INTO $tabla1(producto_id, total) VALUES 
//             (:producto_id, :total)");
    
//             $totalAcumulado->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_STR);
//             $totalAcumulado->bindParam(":total", $total, PDO::PARAM_STR);
            
            
//             if ($totalAcumulado->execute()) {

//                 return "ok";
        
//             } else {
        
//                 return "error";
        
//             }

            
//         }else{
            
//             $totalAcumulado = Conexion::conectar()->prepare("UPDATE $tabla1 SET total=:total WHERE producto_id = :producto_id");

//             $totalAcumulado->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_STR);
//             $totalAcumulado->bindParam(":total", $total, PDO::PARAM_STR);
            
//             if ($totalAcumulado->execute()) {

//                 return "ok";
        
//             } else {
        
//                 return "error";
        
//             }
                
//         }
//         $totalAcumulado->close();
//         $totalAcumulado = null;
//     }

//     public static function mdlMostrarStocks()
//     {
           
//     $stmt = Conexion::conectar()->prepare("SELECT productos.nombre as Pro_nombre,
//                                                           productos_cantidad_total.total as Pro_total,
//                                                           productos.id as Pro_id
//                                                    FROM productos INNER JOIN productos_cantidad_total ON
//                                                    productos.id = productos_cantidad_total.producto_id");
        
        
//         $stmt->execute();

//         return $stmt->fetchAll();
    
                
//             $stmt->close();
    
//             $stmt = null;

//     }

//     public static function mdlMostrarStockDetalle($tabla,$item,$valor)
//     {
           
//     $stmt1 = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        
//     $stmt1->bindParam(":" . $item, $valor, PDO::PARAM_STR);    
        
//     $stmt1->execute();

//         return $stmt1->fetchAll();
    
                
//             $stmt1->close();
    
//             $stmt1 = null;

//     }








}