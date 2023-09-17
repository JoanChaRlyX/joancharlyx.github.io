<!--AUTOR: Juan Carlos Beltran Pichardo FECHA DE CREACIÓN: 4 de mayo de 2023 -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="./CSS/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comanda Registrada!</title>
</head>

<body>
    <?php
        require("DatosConexion.php");
        date_default_timezone_set('America/Mexico_City');
        //VARIABLES
        $NComanda=$_POST["NumeroComanda"];
        $NMesa=$_POST["Mesa"];
        $fecha = date("Y-m-d");
        $variables = [
            "T_Pastor" => "ID_TPastor",
            "T_Pastorcq" => "ID_TPastorcq",
            "T_Sirloin" => "ID_TSirloin",
            "T_Sirloincq" => "ID_TSirloincq",
            "T_Pollo" => "ID_TPollo",
            "G_Pastor" => "ID_GPastor",
            "G_Sirloin" => "ID_GSirloin",
            "V_Pastor" => "ID_VPastor",
            "V_Sirloin" => "ID_VSirloin",
            "C_Pastor" => "ID_CPastor",
            "C_Sirloin" => "ID_CSirloin",
            "P_Brownie" => "ID_PBrownie",
            "P_PanElote" => "ID_PPanElote",
            "A_Pollo" => "ID_APollo",
            "A_Sirloin" => "ID_ASirloin",
            "A_Natural" => "ID_ANatural",
            "QF_Pastor" => "ID_QPastor",
            "QF_Sirloin" => "ID_QSirloin",
            "QF_Natural" => "ID_QNatural",
            "E_Cebollas" => "ID_ECebollas",
            "E_Chicharron" => "ID_EChicharron"
        ];

        $bebidas = [
            "BAguaNatural" => "ID_AguaNatural",
            "BAguaSabor" => "ID_AguaSabor",
            "BRefresco" => "ID_BRefresco",
            "BVictoria" => "ID_BVictoria",
            "BVictoriaM" => "ID_BVictoriaM",
            "BVictoriaC" => "ID_BVictoriaC",
            "BCorona" => "ID_BCorona",
            "BCoronaM" => "ID_BCoronaM",
            "BCoronaC" => "ID_BCoronaC",
            "BUltra" => "ID_BUltra",
            "BUltraM" => "ID_BUltraM",
            "BUltraC" => "ID_BUltraC"
        ];

        //Inserción de los datos de manera recursiva
        $Insercion="INSERT INTO comanda VALUES ($NComanda,$NMesa,NOW())";
        $Resultado= mysqli_query($Conexion,$Insercion);//¡No mover ni quitar!

        foreach ($variables as $cantidadVariable => $idVariable) {
            $cantidad = $_POST[$cantidadVariable];
            $id = $_POST[$idVariable];

            if (!empty($cantidad)) {
                $Insercion = "INSERT INTO platillo_comanda VALUES ($NComanda, $id, $cantidad,NOW())";
                $Resultado = mysqli_query($Conexion, $Insercion); // ¡No mover ni quitar!
            }
        }

		foreach ($bebidas as $cantidadVariable => $idVariable) {
			$cantidad = $_POST[$cantidadVariable];
            $id = $_POST[$idVariable];

            if (!empty($cantidad)) {
                $Insercion = "INSERT INTO comanda_bebida VALUES ($NComanda, $id, $cantidad,NOW())";
                $Resultado = mysqli_query($Conexion, $Insercion); // ¡No mover ni quitar!
            }
		}

        if(!$Resultado){ //Se comprueba si el script sql se ejecutó correctamente
            echo "<b>Error en la consulta</b>";
        }else{ //Se muestran los datos guardados en base a un SELECT
            echo "<b>Registro guardado</b><br><br>";
            $Consulta = "SELECT CantidadPlatillo, nombre from platillo, platillo_comanda where id=platillo and comanda=$NComanda and fecha_platillo='$fecha'";
            $Resultado = mysqli_query($Conexion,$Consulta);
            
            //Mostrar los resultados de cantidad de platillos en una tabla HTML
            echo "<tr><th><b>Cantidad</b></th><th><b> Platillo</b></th></tr><br>";
            while ($fila = mysqli_fetch_array($Resultado)) {
                echo "<tr><td>" . $fila["CantidadPlatillo"] . "    </td><td>" . $fila["nombre"] . "</td></tr>";
                echo "<br>";
            }
            //Mostrar los resultados de cantidad de bebidas
            $Consulta = "SELECT CantidadBebida, nombre from comanda_bebida, bebida where id=bebida and comanda=$NComanda and fecha_bebida='$fecha'";
            $Resultado = mysqli_query($Conexion,$Consulta);

            while ($fila = mysqli_fetch_array($Resultado)) {
                echo "<tr><td>" . $fila["CantidadBebida"] . "    </td><td>" . $fila["nombre"] . "</td></tr>";
                echo "<br>";
            }
            echo "</table>";
        }
        mysqli_close($Conexion);
    ?>
    <button onclick="FIN()">FIN</button> <!--Cuando presionas el boton te regresa a la interfaz principal-->
    <!--Funcion para el boton FIN-->
    <script>
        function FIN(){
            window.location.href="../Menu.html";
        }
    </script>
</body>
</html>