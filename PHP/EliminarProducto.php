<?php
    require("DatosConexion.php");
    $id=$_GET['id'];
    $query="DELETE FROM platillo where id=$id ";
    $resultado=mysqli_query($Conexion,$query);
    if($resultado){
        echo"<script languaje='JavaScript'>alert('Los datos fueron ELIMINADOS correctamente');location.assign(Lista_Bebidas.php);</script>";
    }
    else{
        echo"<script languaje='JavaScript'>alert('Los datos NO FUERON ELIMINADOS correctamente');location.assign(Lista_Bebidas.php);</script>";
    }
    mysqli_close($Conexion);       
?>