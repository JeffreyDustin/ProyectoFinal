<?php 
	//Código para conectar
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "restaurante";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	$conn->set_charset("utf8");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	if (isset($_GET["btnBuscar"])) {
		$buscar = $_GET["buscar"];
		$sql ="SELECT * FROM  restaurante
		WHERE CONCAT(nombreCliente, apellidoPaterno)
		LIKE '%$buscar%'";
	}
	else{
		$sql = "SELECT * FROM restaurante";
	}

	$result = $conn->query($sql);
	$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Pedidos</title>
	<link rel="stylesheet" type="text/css" href="estilo/estilo.css">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo/css/font-awesome.min.css">
	 
</head>
<body>
	
	
	<div class="panel panel-primary">

		<div class="panel-heading">
			<strong>Pedidos</strong>
		</div>
		<div class="container">
          <br>
		
		<strong><a id="registrar" class="btn btn-primary" href="registrarplatillo.php">Agregar Pedido</a></strong>
		 <strong><a id="registrar" class="btn btn-primary" href="restaurante.php">Regresar</a></strong>

		<div class="panel-body">
			<table class="table table-striped">
		<thead>
        <form method="GET" class="form-inline" role="form">
				<div id="busqueda" class="form-group col-md-2">
					<input type="text" name="buscar" class="form-control" id="buscar" placeholder="Buscar pedido ">
				</div>
				<div  id="btnBuscar" class="from-group col-md-1">
					<button id="btnBuscar" type="submit" name="btnBuscar" class="btn btn-primary">
						<span class="glyphicon glyphicon-search"> Buscar</span>
					</button>
				</div>
			</form>     


			
				<tr>
					<th>platiloID</th>
					<th>nombreCliente</th>
					<th>apellidoPaterno</th>
					<th>apellidoMaterno</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>sugerencias</th>
					
				</tr>
			</thead>
			<tbody>
			<?php 
				if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {?>
			    <tr>
			    	<td><?php echo $row["platiloID"]?></td>
			    	<td><?php echo $row["nombreCliente"]?></td>
			    	<td><?php echo $row["apellidoPaterno"]?></td>
			    	<td><?php echo $row["apellidoMaterno"]?></td>
			    	<td><?php echo $row["Direccion"]?></td>
			    	<td><?php echo $row["Telefono"]?></td>
			    	<td><?php echo $row["sugerencias"]?></td>
			    
			    	<td>
			    		<a href="borrarCliente.php?platiloID=<?php echo $row['platiloID'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
			    		<a href="modificarCliente.php?platiloID=<?php echo $row['platiloID'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>

			    	</td>
			    </tr>

		    <?php } //End while
				}//End if
				else {
				    echo "0 results";
				}
			 ?>
			</tbody>
			</table>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>