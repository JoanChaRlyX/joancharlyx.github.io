<?php
    //VARIABLES PARA CONEXION
    $Servidor= "localhost";
    $Usuario= "root";
    $Clave= "";
    $BD= "santocapricho";

    //CONECTAR
    $Conexion= mysqli_connect($Servidor,$Usuario,$Clave);
    if(mysqli_connect_errno()){ //COMPROBAR LA CONEXION
        echo "Fallo al conectar con la BDD";
        exit();
    }
    mysqli_set_charset($Conexion,"utf8"); //PARA QUE ACEPTE ACENTOS !No Mover!
    mysqli_select_db($Conexion,$BD) or die ("No se encuentra la BDD"); //COMPRUEBA LA CONEXION CON LA BDD
?>