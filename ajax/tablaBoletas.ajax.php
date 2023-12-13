<?php
require_once "../controladores/boletas.controlador.php";
require_once "../modelos/boleta.modelo.php";

class TablaBoletas
{

    public function mostrarTablaBoletas(){

        $boletas = ControladorBoletas::ctrMostrarBoletas();

        $number_filter_row = count($boletas);
        $data = array();

        for ($i = 0; $i < count($boletas); $i++){

            
                if($boletas[$i]['bolAsignada'] == 'N' && $boletas[$i]['bolVendida'] == 'N'){
                    
                    $etiqueta = "<span class='badge badge-pill badge-secondary'>Disponible</span>";
                    $acciones ='';
                
                }elseif($boletas[$i]['bolAsignada'] == 'S' && $boletas[$i]['bolVendida'] == 'N'){
                
                    $etiqueta = "<span class='badge badge-pill badge-success'>Asignada</span>";
                    $acciones = "<button class='btn btn-outline-success rounded btn-sm mr-2 btnVerVendedor' idBoleta='" . $boletas[$i]["bolId"] . "'>Ver Vendedor</button>";
                
                }elseif($boletas[$i]['bolAsignada'] == 'N' && $boletas[$i]['bolVendida'] == 'S'){

                    $etiqueta = "<span class='badge badge-pill badge-danger'>Vendida</span>";
                    $acciones = "<button class='btn btn-outline-danger rounded btn-sm mr-2 btnVerComprador' idBoleta='" . $boletas[$i]["bolId"] . "'>Ver Comprador</button>";


                }else{
                
                    $etiqueta = "<span class='badge badge-pill badge-danger'>Vendida</span>";
                    $acciones = "<div class='btn-group'>
                                <button class='btn btn-outline-danger rounded btn-sm mr-2 btnVerComprador' idBoleta='" . $boletas[$i]["bolId"] . "'>Ver Comprador</button>
                                <button class='btn btn-outline-success rounded btn-sm mr-2 btnVerVendedor' idBoleta='" . $boletas[$i]["bolId"] . "'>Ver Vendedor</button>
                                </div>"
                                ;
                }
                           
                
                $sub_array = array();
                $sub_array[] = $boletas[$i]["bolNum1"];
                $sub_array[] = $boletas[$i]["bolNum2"];
                $sub_array[] = $etiqueta;
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

$mostrarBoletas = new TablaBoletas();
$mostrarBoletas->mostrarTablaBoletas();
    

    
        




