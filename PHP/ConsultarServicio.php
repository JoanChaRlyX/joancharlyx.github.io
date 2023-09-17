<!--AUTORES: Juan Carlos Beltran Pichardo y Luis Alberto Silva Bucio
    FECHA DE CREACIÓN: 11 de mayo de 2023-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Comanda en Servicio</title>
    <style>
        body{
            background-image: url(https://www.svgrepo.com/show/68775/table.svg);
        }
        /*Para los h3 Cantidad y Platillo. Hacer que se muestren en línea utilizando la propiedad display: inline. 
        También se ha utilizado la propiedad margin-right para agregar un margen a la derecha de las etiquetas <h3> y separarlas un poco. */
        h3{
            display: inline;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <form name="ConsultarServicio" method="post">
        <p><b>Comanda N: </b><input type="number" name="NumeroComanda" id="NumeroComanda" size="10" min="0" max="99"> <input type="submit" value="CONSULTAR"> </p> 
    </form>

    <h1>DATOS COMANDA CONSULTADA</h1>
    <?php
        date_default_timezone_set('America/Mexico_City');
        require("DatosConexion.php");
        //VARIABLES
        $NComanda=$_POST["NumeroComanda"];
        $fecha = date("Y-m-d");
        $Consulta = "SELECT * FROM comanda WHERE numero_comanda=$NComanda and fecha_comanda='$fecha'";
        $Resultado = mysqli_query($Conexion,$Consulta);

        echo "<p><b>Mesa N: ";
        while ($fila = mysqli_fetch_array($Resultado)) {
            echo $fila["mesa"];
        }
        mysqli_close($Conexion);
    ?>
    <h3>Cantidad</h3>
    <h3>Platillo</h3>
    <?php
        require("DatosConexion.php");
        //VARIABLES
        $NComanda=$_POST["NumeroComanda"];
        
        //Se muestran los datos guardados en base a un SELECT
        $Consulta = "SELECT CantidadPlatillo, nombre from platillo, platillo_comanda where id=platillo and comanda=$NComanda and fecha_platillo='$fecha'";
        $Resultado = mysqli_query($Conexion,$Consulta);
        
        //Mostrar los resultado en una tabla HTML
        // Se ha utilizado el selector td para aplicar estilos a todas las celdas de la tabla. 
        // Se ha utilizado la propiedad padding para agregar espacio alrededor del contenido de las celdas y la propiedad text-align para centrar el texto en las celdas.
        // También se ha agregado el atributo style a la etiqueta <table> con el valor border-collapse: collapse; para eliminar el espacio entre los bordes de las celdas y hacer que la tabla se vea como una sola tabla en lugar de celdas separadas.
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<style> td { padding: 20px; text-align: center; } </style>";
        while ($fila = mysqli_fetch_array($Resultado)) {
            echo "<tr><td>" . $fila["CantidadPlatillo"] . "</td><td>" . $fila["nombre"] . "</td></tr>";
        }
        echo "</table>";
        
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