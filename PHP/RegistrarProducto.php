<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
    <style>
        body{
            background-image: url(https://th.bing.com/th/id/R.adc7a1fcb3109ec7e633e2be0bd7e38c?rik=Rxd%2bxZH4fNpXrQ&riu=http%3a%2f%2fl.rgbimg.com%2fcache1pKqKk%2fusers%2fx%2fxy%2fxymonau%2f600%2fmPiTonE.jpg&ehk=a1a8zeuGSg8H%2bcNWezZQ7eR4UYzRZu10TzPPrR4KgZE%3d&risl=&pid=ImgRaw&r=0);
        }
    </style>
</head>
<body>
   

<h1>Registrar un producto</h1>
    <form name="RegistrarProducto" method="post">
        <p><label>ID:</label>
        <input type="number" name="id" id="id"><br></p>
        <p><label>Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br></p>
        <p><label>Precio:</label>
        <input type="number" name="precio" id="precio"><br></p>
        <p><input type="submit" name="enviar" value="AGREGAR"><br></p>
    </form>

    <?php
        require("DatosConexion.php");
        if(isset($_POST['enviar'])){
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];

            $query="INSERT INTO platillo VALUES ($id, '$nombre', $precio)";
            $resultado=mysqli_query($Conexion,$query);
            if($resultado){
                echo"<script languaje='JavaScript'>alert('Los datos fueron ingresados correctamente');location.assign(Menu.html);</script>";
            }
            else{
                echo"<script languaje='JavaScript'>alert('Los datos NO FUERON ingresados');location.assign(Menu.html);</script>";
            }
            mysqli_close($Conexion);
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
