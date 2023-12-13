<?php
require_once "../controladores/vendedores.controlador.php";
require_once "../modelos/vendedor.modelo.php";

class TablaVendedores
{

    public function mostrarTablaVendedores(){

        $vendedores = ControladorVendedores::ctrMostrarVendedores();

               

        $number_filter_row = count($vendedores);
        $data = array();

        for ($i = 0; $i < count($vendedores); $i++){

            
            
            /*=============================================
                AGREGAR ETIQUETAS DE ESTADO
                =============================================*/
                           
                $acciones = "<div class='btn-group'>
                                <button class='btn btn-danger btn-sm mr-2 btnAsignaBoleta' documentoVendedor='" . $vendedores[$i]["perId"] . "'>Asignar Boletas</button>
                                <button class='btn btn-secondary btn-sm mr-2 btnInfoPersona' documentoVendedor='" . $vendedores[$i]["perId"] . "'>Ver Info</button>
                                </div>"
                                ;


                $sub_array = array();
                $sub_array[] = $vendedores[$i]["perId"];
                $sub_array[] = ucwords($vendedores[$i]["perNombres"]);
                $sub_array[] = ucwords($vendedores[$i]["perApellidos"]);
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

$mostrarVendedores = new TablaVendedores();
$mostrarVendedores->mostrarTablaVendedores();
    

    
        




