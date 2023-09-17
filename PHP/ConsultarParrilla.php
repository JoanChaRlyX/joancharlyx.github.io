<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Comanda en Parrilla</title>
    <style>
        body{
            background-image: url(https://www.supercoloring.com/sites/default/files/styles/coloring_medium/public/cif/2022/04/grill-coloring-page.png);
        }
    </style>
</head>
<body>
    <h1>Comandas pendientes:</h1> 
    <?php
        require("DatosConexion.php");
        //VARIABLES
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d");
        $Consulta = "SELECT Comanda, CantidadPlatillo, platillo.Nombre AS NombrePlatillo FROM platillo, platillo_comanda WHERE platillo.id = platillo_comanda.platillo and fecha_platillo='$fecha'";
        $Resultado = mysqli_query($Conexion,$Consulta);

        // Verificar si se obtuvieron resultados
        if (mysqli_num_rows($Resultado) > 0) {
            // Inicio de la tabla con estilos CSS
            // Se ha utilizado el selector td para aplicar estilos a todas las celdas de la tabla. 
            // Se ha utilizado la propiedad padding para agregar espacio alrededor del contenido de las celdas y la propiedad text-align para centrar el texto en las celdas.
            // También se ha agregado el atributo style a la etiqueta <table> con el valor border-collapse: collapse; para eliminar el espacio entre los bordes de las celdas y hacer que la tabla se vea como una sola tabla en lugar de celdas separadas.
            echo "<table border='1' style='border-collapse: collapse;'>";
            echo "<style> td { padding: 10px; text-align: center; } </style>";
            echo '<tr></th><th style="border: 1px solid black; text-align: center;">Comanda</th><th style="border: 1px solid black; text-align: center;">Cantidad Platillo</th><th style="border: 1px solid black; text-align: center;">Platillo</th><th style="border: 1px solid black; text-align: center;"></th></tr>';

            // Iterar sobre los resultados y mostrarlos en la tabla
            while ($fila = mysqli_fetch_assoc($Resultado)) {
                //$checked = ($miVariable == $fila['Comanda']) ? 'checked' : '';
                echo '<td style="border: 1px solid black; text-align: center;">' . $fila['Comanda'] .'</td>';
                echo '<td style="border: 1px solid black; text-align: center;">' . $fila['CantidadPlatillo'] . '</td>';
                echo '<td style="border: 1px solid black; text-align: center;">' . $fila['NombrePlatillo'] . '</td>';
                echo '</tr>';
            }

            // Fin de la tabla
            echo '</table>';
        } else {
            echo 'No se encontraron resultados.';
        }
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