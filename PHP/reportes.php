
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">

 
    <link rel="stylesheet" href="../css/es.css">

    

    <title>Reportes</title>
</head>

<br>
<div class="container is-fluid">


<div class="col-xs-12">


		<h2>Reporte de ventas por fecha</h2>
<br>

		<div>
       
<style>	
    body{
        background-image: url(https://img.freepik.com/vector-gratis/pila-dinero-monedas-oro-icono-estilo-dibujos-animados-3d-monedas-signo-dolar-fajo-efectivo-ilustracion-vector-plano-moneda-riqueza-inversion-exito-ahorro-economia-concepto-beneficio_74855-26108.jpg?w=360&t=st=1685305774~exp=1685306374~hmac=b95f72209c82b4db503ddb8d9a48bc3b1c1c40697e82049bfab8aa243df78f51);
    }
th {
        font-weight: bold;
        color: black;
    }</style>

<form action="" method="GET">
    
                            <div class="row">
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label><b>Del Dia</b></label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b></b></label> <br>
                                      <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form>




                    <table class="table table-striped" id= "table_id">
                            <thead>
                            <tr class="bg-dark">
                            <th>Total en caja de ese dia:</th>
                        
                  
                                </tr>
                            </thead>
                            <tbody>

<?php 
                       require("DatosConexion.php"); 

                                if(isset($_GET['from_date']))
                                {
                                    $from_date = $_GET['from_date'];

                                    $query = "SELECT (SUM(platillo.precio*CantidadPlatillo)) + (SELECT SUM(bebida.precio*CantidadBebida) FROM bebida,comanda_bebida where bebida.id=comanda_bebida.bebida and fecha_bebida='$from_date') as TOTAL FROM platillo, platillo_comanda where platillo.id=platillo_comanda.platillo and fecha_platillo='$from_date';";
                                    $query_run = mysqli_query($Conexion, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($result=mysqli_fetch_array($query_run)){
                                            echo $result["TOTAL"].'<br>';
                                        }    
                                    
                                    }
                                    else
                                    {
                                        ?>
                                      
                                         <tr>
                                         <td><?php  echo "No se encontraron resultados"; ?></td>
                                  <?php
                                    }
                                }
                            ?>
		</div>





</html>