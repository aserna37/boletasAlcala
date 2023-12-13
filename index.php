<?php

require_once "controladores/plantillas.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/departamento.controlador.php";
require_once "controladores/boletas.controlador.php";


require_once "modelos/usuario.modelo.php";
require_once "modelos/boleta.modelo.php";
require_once "modelos/departamento.modelo.php";
require_once "modelos/reporte.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
?>
