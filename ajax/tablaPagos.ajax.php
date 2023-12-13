<?php
require_once "../controladores/boletas.controlador.php";
require_once "../modelos/boleta.modelo.php";

class TablaPagos
{

    public function mostrarTablaPagos(){

        $pagos = ControladorBoletas::ctrMostrarBoletas();

        $number_filter_row = count($pagos);
        $data = array();

        for ($i = 0; $i < count($pagos); $i++){

                $pagoBoleta = $pagos[$i]['bolTotal'];
                $mostrarAbonos = "<span class='badge badge-pill badge-danger'>".number_format($pagoBoleta)."</span>"; 
                $pagoTotal = 40000 - intval($pagoBoleta);
                $mostrarTotal = "<span class='badge badge-pill badge-success'>".number_format($pagoTotal)."</span>"; 
                $acciones = "<div class='btn-group'>
                                <button class='btn btn-outline-danger rounded btn-sm mr-2 btnAgregarPago' idBoleta='" . $pagos[$i]["bolId"] . "'>Agregar abono</button>
                                <button class='btn btn-outline-success rounded btn-sm mr-2 btnVerPagos' idBoleta='" . $pagos[$i]["bolId"] . "'>Ver fecha abono</button>
                                </div>"
                                ;
                
                           
                
                $sub_array = array();
                $sub_array[] = $pagos[$i]["bolNum1"];
                $sub_array[] = $pagos[$i]["bolNum2"];
                $sub_array[] = $mostrarAbonos;
                $sub_array[] = $mostrarTotal;
                $sub_array[] = $acciones;
                $data[] = $sub_array;

            }

            $output = array(
                'recordsTotal'  =>  $number_filter_row,
                'data'          =>  $data
            );

            echo json_encode($output);

     }
}


// EJECUTAR PROCESO

$mostrarPagos = new TablaPagos();
$mostrarPagos->mostrarTablaPagos();
    

    
        




