<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Comanda</title>
    <style>
        body{
            background-image: url(https://th.bing.com/th/id/R.adc7a1fcb3109ec7e633e2be0bd7e38c?rik=Rxd%2bxZH4fNpXrQ&riu=http%3a%2f%2fl.rgbimg.com%2fcache1pKqKk%2fusers%2fx%2fxy%2fxymonau%2f600%2fmPiTonE.jpg&ehk=a1a8zeuGSg8H%2bcNWezZQ7eR4UYzRZu10TzPPrR4KgZE%3d&risl=&pid=ImgRaw&r=0);
        }
    </style>
</head>
<body>
    <h1>Modificar Comanda</h1>
    <form name="RegistrarComanda" method="post">
        <div style="display: flex;">
            <p>Comanda N: <input type="number" name="NumeroComanda" id="NumeroComanda" size="10" min="0" max="99"><input type="submit" value="CONSULTAR"></p>
        </div>
    </form>
    <?php
        require("DatosConexion.php");
        date_default_timezone_set('America/Mexico_City');
        //VARIABLES
        $NComanda=$_POST["NumeroComanda"];
        //Consulta para N° de mesa
        $fecha = date("Y-m-d");
        $Consulta = "SELECT * FROM comanda WHERE numero_comanda=$NComanda and fecha_comanda='$fecha'";
        $Resultado = mysqli_query($Conexion,$Consulta);
        $fila = mysqli_fetch_assoc($Resultado);
        $Mesa = $fila["mesa"];

        $Consulta = "SELECT id, nombre, CantidadPlatillo from platillo, platillo_comanda where comanda=$NComanda AND platillo=id and fecha_platillo='$fecha'";
        $Resultado = mysqli_query($Conexion,$Consulta);
        $i=1;
        while ($i <= 21) {
            $fila = mysqli_fetch_assoc($Resultado);
            $CantidadPlatillo = $fila["CantidadPlatillo"];
            $ID = $fila["id"];
            if ($ID == 1) {
                $T_Pastor = $CantidadPlatillo;
            }
            if($ID == 2){
                $T_Pastorcq = $CantidadPlatillo;
            }
            if ($ID == 3) {
                $T_Sirloin = $CantidadPlatillo;
            }
            if ($ID == 4) {
                $T_Sirloincq = $CantidadPlatillo;
            }
            if ($ID == 5) {
                $T_Pollo = $CantidadPlatillo;
            }
            if ($ID == 6) {
                $G_Pastor = $CantidadPlatillo;
            }
            if($ID == 7){
                $G_Sirloin = $CantidadPlatillo;
            }
            if ($ID == 8) {
                $V_Pastor = $CantidadPlatillo;
            }
            if ($ID == 9) {
                $V_Sirloin = $CantidadPlatillo;
            }
            if ($ID == 10) {
                $C_Pastor = $CantidadPlatillo;
            }
            if ($ID == 11) {
                $C_Sirloin = $CantidadPlatillo;
            }
            if ($ID == 12) {
                $A_Pollo = $CantidadPlatillo;
            }
            if ($ID == 13) {
                $A_Sirloin = $CantidadPlatillo;
            }
            $i++;
        }
    ?>

    <form name="ModificarComanda" method="post">
        <p>Mesa N: <input type="number" name="Mesa" id="Mesa" value="<?php echo $Mesa; ?>"></p>
        <!-- Numero de comanda -->
        <p>Comanda N: <input type="number" name="NumeroComanda" id="NumeroComanda" value="<?php echo $NComanda; ?>" size="10" min="0" max="99"></p>
        <h2>Tacos</h2>
        <p>Pastor $18<input type="number" name="T_Pastor" id="T_Pastor" value="<?php echo $T_Pastor; ?>"><input type="checkbox"> Cilandro<input type="checkbox"> Cebolla<input type="checkbox"> Piña</p>
        <input type="hidden" name="ID_TPastor" id="ID_TPastor" value="1">
        <p>Pastor c/queso $25 <input type="number" name="T_Pastorcq" id="T_Pastorcq" value="<?php echo $T_Pastorcq; ?>"><input type="checkbox"> Cilandro<input type="checkbox"> Cebolla<input type="checkbox"> Piña</p>
        <input type="hidden" name="ID_TPastorcq" id="ID_TPastorcq" value="2">
        <p>Sirloin $25 <input type="number" name="T_Sirloin" id="T_Sirloin" value="<?php echo $T_Sirloin; ?>"></p>
        <input type="hidden" name="ID_TSirloin" id="ID_TSirloin" value="3">
        <p>Sirloin c/queso $32 <input type="number" name="T_Sirloincq" id="T_Sirloincq" value="<?php echo $T_Sirloincq; ?>"></p>
        <input type="hidden" name="ID_TSirloincq" id="ID_TSirloincq" value="4">
        <p>Pollo $25 <input type="number" name="T_Pollo" id="T_Pollo" value="<?php echo $T_Pollo; mysqli_close($Conexion);?>"></p>
        <input type="hidden" name="ID_TPollo" id="ID_TPollo" value="5">
        <div style="display: flex;">
            <div style="margin-right: 100px;">
                <h2>Gringas</h2>
                <p>Pastor $40 <input type="number" name="G_Pastor" id="G_Pastor"></p>
                <input type="hidden" name="ID_GPastor" id="ID_GPastor" value="6">
                <p>Sirloin $60 <input type="number" name="G_Sirloin" id="G_Sirloin"></p>
                <input type="hidden" name="ID_GSirloin" id="ID_GSirloin" value="7">

                <h2>Volcanes</h2>
                <p>Pastor $55 <input type="number" name="V_Pastor" id="V_Pastor"></p>
                <input type="hidden" name="ID_VPastor" id="ID_VPastor" value="8">
                <p>Sirloin $45 <input type="number" name="V_Sirloin" id="V_Sirloin"></p>
                <input type="hidden" name="ID_VSirloin" id="ID_VSirloin" value="9">
            </div>
            <div>
                <h2>Costras</h2>
                <p>Pastor $50 <input type="number" name="C_Pastor" id="C_Pastor"></p>
                <input type="hidden" name="ID_CPastor" id="ID_CPastor" value="10">
                <p>Sirloin $60 <input type="number" name="C_Sirloin" id="C_Sirloin"></p>
                <input type="hidden" name="ID_CSirloin" id="ID_CSirloin" value="11">

                <h2>Postres</h2>
                <p>Brownie $40 <input type="number" name="P_Brownie" id="P_Brownie"></p>
                <input type="hidden" name="ID_PBrownie" id="ID_PBrownie" value="20">
                <p>Pan de elote $30 <input type="number" name="P_PanElote" id="P_PanElote"></p>
                <input type="hidden" name="ID_PPanElote" id="ID_PPanElote" value="21">
            </div>
        </div>

        <div style="display: flex;">
            <div style="margin-right: 100px;">
                <h2>Alambres</h2>
                <p>Pollo $110 <input type="number" name="A_Pollo" id="A_Pollo"><input type="checkbox">Queso</p>
                <input type="hidden" name="ID_APollo" id="ID_APollo" value="12">
                <p>Sirloin $110 <input type="number" name="A_Sirloin" id="A_Sirloin"><input type="checkbox">Queso</p>
                <input type="hidden" name="ID_ASirloin" id="ID_ASirloin" value="13">
                <p>Natural $100 <input type="number" name="A_Natural" id="A_Natural"><input type="checkbox">Queso</p>
                <input type="hidden" name="ID_ANatural" id="ID_ANatural" value="14">
            </div>
            <div>
                <h2>Queso Fundido</h2>
                <p>Pastor $85 <input type="number" name="QF_Pastor" id="QF_Pastor"></p>
                <input type="hidden" name="ID_QPastor" id="ID_QPastor" value="15">
                <p>Sirloin $95 <input type="number" name="QF_Sirloin" id="QF_Sirloin"></p>
                <input type="hidden" name="ID_QSirloin" id="ID_QSirloin" value="16">
                <p>Natural $75 <input type="number" name="QF_Natural" id="QF_Natural"></p>
                <input type="hidden" name="ID_QNatural" id="ID_QNatural" value="17">
            </div>
        </div>

        <h2>Extras</h2>
        <p>Cebollas Preparadas $40 <input type="number" name="E_Cebollas" id="E_Cebollas"></p>
        <input type="hidden" name="ID_ECebollas" id="ID_ECebollas" value="18">
        <p>Chicharron de Queso $80 <input type="number" name="E_Chicharron" id="E_Chicharron"></p>
        <input type="hidden" name="ID_EChicharron" id="ID_EChicharron" value="19">

        <h1>BEBIDAS</h1>
        <p>Agua Natural $20 <input type="number" name="BAguaNatural" id="BAguaNatural"></p>
        <input type="hidden" name="ID_AguaNatural" id="ID_AguaNatural" value="1">
        <p>Agua de Sabor $35 <input type="number" name="BAguaSabor" id="BAguaSabor"></p>
        <input type="hidden" name="ID_AguaSabor" id="ID_AguaSabor" value="2">
        <p>Refresco $30 <input type="number" name="BRefresco" id="BRefresco"></p>
        <input type="hidden" name="ID_BRefresco" id="ID_BRefresco" value="3">
        <h2>Alcohol</h2>
        <p>Victoria<input type="number" name="BVictoria" id="BVictoria"></p>
        <input type="hidden" name="ID_BVictoria" id="ID_BVictoria" value="4">
        <p>Victoria Michelada <input type="number" name="BVictoriaM" id="BVictoriaM"></p>
        <input type="hidden" name="ID_BVictoriaM" id="ID_BVictoriaM" value="5">
        <p>Victoria Clamato<input type="number" name="BVictoriaC" id="BVictoriaC"></p>
        <input type="hidden" name="ID_BVictoriaC" id="ID_BVictoriaC" value="6">
        <p>Corona<input type="number" name="BCorona" id="BCorona"></p>
        <input type="hidden" name="ID_BCorona" id="ID_BCorona" value="7">
        <p>Corona Michelada<input type="number" name="BCoronaM" id="BCoronaM"></p>
        <input type="hidden" name="ID_BCoronaM" id="ID_BCoronaM" value="8">
        <p>Corona Clamato<input type="number" name="BCoronaC" id="BCoronaC"></p>
        <input type="hidden" name="ID_BCoronaC" id="ID_BCoronaC" value="9">
        <p>Ultra<input type="number" name="BUltra" id="BUltra"></p>
        <input type="hidden" name="ID_BUltra" id="ID_BUltra" value="10">
        <p>Ultra Michelada<input type="number" name="BUltraM" id="BUltraM"></p>
        <input type="hidden" name="ID_BUltraM" id="ID_BUltraM" value="11">
        <p>Ultra Clamato<input type="number" name="BUltraC" id="BUltraC"></p>
        <input type="hidden" name="ID_BUltraC" id="ID_BUltraC" value="12">
   
        <input type="submit" name="MODIFICAR">
    </form>

    <?php
        require("DatosConexion.php");
        
        //VARIABLES
        $NComanda=$_POST["NumeroComanda"];
        $NMesa=$_POST["Mesa"];
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
        foreach ($variables as $cantidadVariable => $idVariable) {
            $cantidad = $_POST[$cantidadVariable];
            $id = $_POST[$idVariable];

            if (!empty($cantidad)) {
                $Insercion = "UPDATE platillo_comanda SET CantidadPlatillo = $cantidad WHERE platillo_comanda.comanda = $NComanda AND platillo_comanda.platillo = $id and fecha_platillo='$fecha'";
                $Resultado = mysqli_query($Conexion, $Insercion); // ¡No mover ni quitar!
            }
        }

		// foreach ($bebidas as $cantidadVariable => $idVariable) {
		// 	$cantidad = $_POST[$cantidadVariable];
        //     $id = $_POST[$idVariable];

        //     if (!empty($cantidad)) {
        //         $Insercion = "INSERT INTO comanda_bebida VALUES ($NComanda, $id, $cantidad)";
        //         $Resultado = mysqli_query($Conexion, $Insercion); // ¡No mover ni quitar!
        //     }
		// }

        if(!$Resultado){ //Se comprueba si el script sql se ejecutó correctamente
            echo "<b>Error en la consulta</b>";
        }
        mysqli_close($Conexion);
    ?>
    
    <button onclick="FIN()">CANCELAR</button> <!--Cuando presionas el boton te regresa a la interfaz principal-->
    <!--Funcion para el boton FIN-->
    <script>
        function FIN(){
            window.location.href="../Menu.html";
        }
    </script>
</body>
</html>