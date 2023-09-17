<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <script type="text/JavaScript">
        function confirmar(){
            return confirm('¿Realmente estás seguro? Se borrarán los datos seleccionados de forma permanente');
        }
    </script>    
    <style>
        body{
            background-image: url(https://th.bing.com/th/id/R.adc7a1fcb3109ec7e633e2be0bd7e38c?rik=Rxd%2bxZH4fNpXrQ&riu=http%3a%2f%2fl.rgbimg.com%2fcache1pKqKk%2fusers%2fx%2fxy%2fxymonau%2f600%2fmPiTonE.jpg&ehk=a1a8zeuGSg8H%2bcNWezZQ7eR4UYzRZu10TzPPrR4KgZE%3d&risl=&pid=ImgRaw&r=0);
        }
    </style>
</head>
<body>
    <?php
        require("DatosConexion.php");
        $sql="SELECT * FROM platillo";
        $resultado=mysqli_query($Conexion,$sql);
    ?>
    <h1>Lista de Productos</h1>
    <table>
        <thread>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>    
        </thread>
        <tbody>
            
            <?php
                while($filas=mysqli_fetch_array($resultado)){
                    echo "<tr><td>" . $filas["id"] . "    </td><td>" . $filas["nombre"] ."    </td><td>" .  $filas["precio"] . "    </td><td>" . "<a href='EditarProducto.php?id=".$filas["id"]."'>Editar</a> - <a href='EliminarProducto.php?id=".$filas["id"]."'onclick='return confirmar()'>Eliminar</a>" . "    </td><td>" . "</td></tr>";
                    
                }
            ?>
            
        </tbody>        
    </table>    
    <button onclick="FIN()">FIN</button> <!--Cuando presionas el boton te regresa a la interfaz principal-->
    <!--Funcion para el boton FIN-->
    <script>
        function FIN(){
            window.location.href="../Menu.html";
        }
    </script>
</body>    
</html>