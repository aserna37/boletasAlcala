<?php

require_once "../modelos/conexion.php";

    $tabla = 'municipios';
    $item = 'departamento_id';
    $valor = $_POST['departamento'];

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item order by nombre ASC");

    $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

    $stmt->execute();
        

        $cadena="<label for='municipio' class='col-form-label col-form-label-sm'>Municipio</label><select class='custom-select custom-select-sm' name='municipio' id='municipio' required>
        <option value=''>Seleccione Municipio...</option>";

        while($value = $stmt->fetch(PDO::FETCH_ASSOC)){
            $cadena=$cadena.'<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
        }

        echo  $cadena."</select>";
    












?>
                        