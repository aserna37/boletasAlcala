<?php

require_once "../controladores/personas.controlador.php";
require_once "../modelos/persona.modelo.php";

class AjaxPersonas
{
    public function ajaxCrearPersona(){

        $datos = array(
            "tipo"          => $this->tipo,
            "documento"     => $this->documento,
            "nombres"       => $this->nombres,
            "apellidos"     => $this->apellidos,
            "direccion"     => $this->direccion,
            "celular"       => $this->celular,
            "email"         => $this->email,
            "municipio"     => $this->municipio,
            "estado"        => $this->estado,
            "vendedor"      => $this->vendedor,
            "comprador"     => $this->comprador,
        );

        $respuesta = ControladorPersonas::ctrCrearPersonas($datos);

        echo $respuesta;
    }

    public function ajaxValidarPersonaVendedor(){
        
        $item = 'perId';
        $valor = $this->documento;

        $respuesta = ControladorPersonas::ctrValidarPersona($item, $valor);

        if(empty($respuesta)){
            echo 'ok';
        }

        for ($i = 0; $i < count($respuesta); $i++){
            
            if($respuesta[$i]['perVendedor'] == 'S'){
                echo 'error1';
            }else{
                echo 'error2';
            }
        }

    }

    public function ajaxValidarPersonaComprador(){
        
        $item = 'perId';
        $valor = $this->documento;

        $respuesta = ControladorPersonas::ctrValidarPersona($item, $valor);

        if(empty($respuesta)){
            echo 'ok';
        }

        for ($i = 0; $i < count($respuesta); $i++){
            
            if($respuesta[$i]['perComprador'] == 'S'){
                echo 'error1';
            }else{
                echo 'error2';
            }
        }

    }

    public function ajaxActualizarPersonaVendedor(){
        
        $item =     $this->item;
        $valor =    $this->documento;
        $item1 =    $this->item1;
        $valor1 =   $this->valor1;

        $respuesta = ControladorPersonas::ctrActualizarPersonaVendedor($item, $valor, $item1, $valor1);

        echo $respuesta;

    }

    public function ajaxVerPersona(){
        
        $item = 'perId';
        $valor = $this->documento;
        
        $respuesta = ControladorPersonas::ctrValidarPersona($item, $valor);

        for ($i = 0; $i < count($respuesta); $i++){

            $nombres = $respuesta[$i]['perNombres'];
            $apellidos = $respuesta[$i]['perApellidos'];
            $direccion = $respuesta[$i]['perDireccion'];
            $celular = $respuesta[$i]['perCelular'];


            echo '<div class="row">
                  <div class="col-6 mb-3">
                  Nombres <br>
                  <strong>'.strtoupper($nombres).'</strong></div>  
                  <div class="col-6 mb-3">
                  Apellidos <br>
                  <strong>'.strtoupper($apellidos).'</strong></div> 
                  <div class="col-6">
                  Dirección <br>
                  <strong>'.strtoupper($direccion).'</strong></div> 
                  <div class="col-6">
                  Celular <br>
                  <strong>'.strtoupper($celular).'</strong></div>  
                  </div>'; 
                   
        }

    }



}

if (isset($_POST["documento"])) {

        date_default_timezone_set("America/Bogota");

        $persona                = new AjaxPersonas();
        $persona->tipo          = $_POST["tipo"];
        $persona->documento     = $_POST["documento"];
        $persona->nombres       = strtolower($_POST["nombres"]);
        $persona->apellidos     = strtolower($_POST["apellidos"]);
        $persona->direccion     = strtolower($_POST["direccion"]);
        $persona->celular       = $_POST["celular"];
        $persona->email         = strtolower($_POST["email"]);
        $persona->municipio     = $_POST["municipio"];
        $persona->estado        = 'A';
        $persona->vendedor      = $_POST["vendedor"];
        $persona->comprador     = $_POST["comprador"];
        
        $persona->ajaxCrearPersona();
    
    
}

if (isset($_POST["documentoP"])) {
    $persona                = new AjaxPersonas();
    $persona->documento     = $_POST["documentoP"];
    $persona->item          = 'perNumero';
    $persona->item1         = 'perVendedor';
    $persona->valor1        = 'S';
    $persona->ajaxValidarPersonaVendedor();

}

if (isset($_POST["documentoV"])) {
    $persona                = new AjaxPersonas();
    $persona->documento     = $_POST["documentoV"];
    $persona->ajaxValidarPersonaComprador();

}

if (isset($_POST["documentoPA"])) {
    $persona                = new AjaxPersonas();
    $persona->documento     = $_POST["documentoPA"];
    $persona->item          = 'perNumero';
    $persona->item1         = 'perVendedor';
    $persona->valor1        = 'S';
    $persona->ajaxActualizarPersonaVendedor();

}

if (isset($_POST["documentoPV"])) {
    $persona                = new AjaxPersonas();
    $persona->documento     = $_POST["documentoPV"];
    $persona->item          = 'perNumero';
    $persona->item1         = 'perComprador';
    $persona->valor1        = 'S';
    $persona->ajaxActualizarPersonaVendedor();

}

if (isset($_POST["Persona"])) {
    $persona                = new AjaxPersonas();
    $persona->documento     = $_POST["Persona"];
    $persona->ajaxVerPersona();

}





?>