<?php
require_once "../controladores/compradores.controlador.php";
require_once "../modelos/comprador.modelo.php";

class TablaCompradores
{

    public function mostrarTablaCompradores(){

        $compradores = ControladorCompradores::ctrMostrarCompradores();

               

        $number_filter_row = count($compradores);
        $data = array();

        for ($i = 0; $i < count($compradores); $i++){

            
            
            /*=============================================
                AGREGAR ETIQUETAS DE ESTADO
                =============================================*/
                           
                $acciones = "<div class='btn-group'>
                                <button class='btn btn-danger btn-sm mr-2 btnAsignaBoletaC' documentoComprador='" . $compradores[$i]["perId"] . "'>Asignar Boletas</button>
                                <button class='btn btn-secondary btn-sm mr-2 btnInfoPersona' documentoVendedor='" . $compradores[$i]["perId"] . "'>Ver Info</button>
                                </div>"
                                ;


                $sub_array = array();
                $sub_array[] = $compradores[$i]["perId"];
                $sub_array[] = ucwords($compradores[$i]["perNombres"]);
                $sub_array[] = ucwords($compradores[$i]["perApellidos"]);
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

$mostrarCompradores = new TablaCompradores();
$mostrarCompradores->mostrarTablaCompradores();
    

    
        




