
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="vistas/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="vistas/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="vistas/plugins/sweet_alert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/plugins/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="vistas/plugins/toast/toastr.min.css">
    <?php
    
    if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){
        echo '<link rel="stylesheet" href="vistas/css/style.css">';
    }else{
        echo '<link rel="stylesheet" href="vistas/css/login.css">';
    }
    ?>
    <title>Boletas Bomberos Alcala V</title>

    
</head>
<body>
<?php
if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {
    
    // include "modulos/menu.php";

    echo '<div id="right-panel" class="right-panel">';

    include "modulos/navbar.php";

    if (isset($_GET["ruta"])) {
    
        if ($_GET["ruta"] == "menu" ||
            $_GET["ruta"] == "compradores" ||
            $_GET["ruta"] == "vendedores" ||
            $_GET["ruta"] == "boletas" ||
            $_GET["ruta"] == "pagos" ||
            $_GET["ruta"] == "reportes" ||
            $_GET["ruta"] == "reporte_por_fecha" ||
            $_GET["ruta"] == "reporte_total" ||
            $_GET["ruta"] == "salir") {
            include "modulos/" . $_GET["ruta"] . ".php";

        }

    }

    
    echo "</div>";
    
    include "modulos/footer.php";
} else {

    include "modulos/login.php";

}


?>


<script src="vistas/plugins/datatables/jquery-3.5.1.js"></script>
<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/js/style.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="vistas/plugins/sweet_alert2/sweetalert2.all.min.js"></script>
<script src="vistas/plugins/toast/toastr.min.js"></script>
</body>
</html>
