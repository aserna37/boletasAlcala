<?php

class Conexion
{

    public static function conectar()
    {
        // $conex = mysqli_connect("localhost","u542794454_admin","8|$][lXk","u542794454_alcala"); 

        $link = new PDO("mysql:host=localhost;dbname=rifaalcala", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND                                                                   => "SET NAMES utf8"));
        return $link;
        
    //     $link = new PDO("mysql:host=localhost;dbname=u542794454_alcala", "u542794454_admin", "8|$][lXk", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //         PDO::MYSQL_ATTR_INIT_COMMAND                                                                   => "SET NAMES utf8"));
    //     return $link;
    }
}