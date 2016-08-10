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

	if(isset($_POST["btnEnviar"])){
		$platilloID = $_POST["platilloID"];
		$nombreCliente = $_POST["nombreCliente"];
		$apePaterno = $_POST["apellidoPaterno"];
		$apeMaterno = $_POST["apellidoMaterno"];
		$direccion = $_POST["direccion"];
		$Telefono = $_POST["Telefono"];
        $sugerencias = $_POST["sugerencias"];
		//Codigo para ejecutar query
		$sql = "INSERT INTO restaurante(platilloID,nombreCliente, apellidoPaterno, apellidoMaterno, direccion, Telefono,sugerencias)value('$platilloID','$nombreCliente','$apellidoPaterno', '$apellidoMaterno', '$direccion', '$Telefono','$sugerencias')";
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /gabriel/restaurante.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Platillo</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
</head>
<body>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
	
		<div class="panel-body">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Platillo:</label>

			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="platillo" name="platillo" placeholder="platillo">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-1" for="Nombre">Nombre:</label>
			      <div class="col-sm-11">
			        <input type="email" class="form-control" id="Nombre" name="correo" placeholder="Nombre">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Paterno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="apePaterno" name="apePaterno" placeholder="Apellido Paterno">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Materno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="apeMaterno" name="apeMaterno" placeholder="Apellido Materno">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Dirección">Dirección:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Dirección" name="direccion" placeholder="Dirección">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Telefono">Telefono:</label>
			      <div class="col-sm-11">
			        <input type="email" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
			      </div>
			    </div>

			    <div class="form-group">
			      <label class="control-label col-sm-1" for="Sugerencias">Sugerencias:</label>
			      <div class="col-sm-11">
			        <input type="email" class="form-control" id="Sugerencias" name="Sugerencias" placeholder="Sugerencias">
			      </div>
			    </div>
			    <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>