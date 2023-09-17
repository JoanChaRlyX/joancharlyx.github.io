<!--AUTORES: Juan Carlos Beltran Pichardo FECHA DE CREACIÓN: 31 de mayo de 2023-->


<style>
        body{
            background-image: url(https://i.pinimg.com/originals/03/f0/0d/03f00dc3bd64d96cc0b8df39caf9da4a.png);
        }
        /*Para los h3 Cantidad y Platillo. Hacer que se muestren en línea utilizando la propiedad display: inline. 
        También se ha utilizado la propiedad margin-right para agregar un margen a la derecha de las etiquetas <h3> y separarlas un poco. */
        h3{
            display: inline;
            margin-right: 20px;
        }
    </style>
<?php
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password == 'gordito21') {
            header('Location: ../MenuAdmin.html');
            exit;
        } else {
            echo 'Contraseña incorrecta';
        }
    }
?>
<form method="post">
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Ingresar">
</form>
<button onclick="FIN()">FIN</button> <!--Cuando presionas el boton te regresa a la interfaz principal-->
    <!--Funcion para el boton FIN-->
    <script>
        function FIN(){
            window.location.href="../Menu.html";
        }
    </script>
