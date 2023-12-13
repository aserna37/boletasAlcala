<?php
class ControladorUsuarios{

    public function ctrIngresoUsuario(){

        if(isset($_POST['usuario'])){


            $tabla = "usuarios";
            $item  = "usuId";
            $valor = $_POST["usuario"];
            $contraseña = $_POST['contraseña'];
    
            $respuesta = ModeloUsuario::mdlMostrarUsuario($tabla, $item, $valor);

            if(is_array($respuesta)){
                
                if ($respuesta["usuId"] == $valor && $respuesta["usuContraseña"] == $contraseña) {
    
                                             
                                $_SESSION["validarSesionBackend"] = "ok";
                                $_SESSION["usuId"]                = $respuesta["usuId"];
                                $_SESSION["usuNombre"]            = $respuesta["usuNombre"];
                                
                                echo '<script>
        
                                    window.location = "menu";
        
                                </script>';
                }
                else{
                    echo '<br>
                    <div class="text-center">
                    <span class="badge bg-danger">Usuario<br>Incorrecto</span>
                    </div>';
                }
            }
           
        }
   }
}
?>