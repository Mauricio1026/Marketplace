<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>marketplace</title>
	<!--llama la hoja de estilos-->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>
<style type="text/css">
	.boton_login {
		text-decoration: none;
		padding: 5px;
		font-weight: 600;
		font-size: 20px;
		color: #ffffff;
		background-color: #000000;
		border-radius: 6px;
		border: 1px solid #0016b0;
	}

	.boton_login:hover {
		color: #000000;
		background-color: #ffffff;
	}

	.button {
		text-decoration: none;
		padding: 5px;
		border-radius: 6px;
		font-weight: 600;
		font-size: 20px;
		background-color: white;
		color: black;
		border: 2px solid #555555;
	}

	.button:hover {
		background-color: #555555;
		color: white;
	}
</style>

<body>
	<table align="center">
		<tr>
			<td colspan="5">
				<FONT FACE="Delninoys" SIZE=10 COLOR="black">Market Place</FONT>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h3>
					Bienvenido al sitio web de <strong>MARKETPLACE</strong> en este puede realizar la reserva de diversos productos
				</h3>
			</td>
			<td>
				<a class="boton_login" href="../Registrousuario/index.php">Login</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="button" href="../Home.php">Inicio</a>
			</td>
			<td>
				<a class="button" href="../Catalogo/Catalogo.php">Catalogo</a>
			</td>
			<td>
				<a class="button" href="../Reserva.php">Reserva</a>
			</td>
			<td>
				<a class="button" href="FormularioregistroUsuario.php">Inscripción</a>
			</td>

			<td>
				<a class="button" href="../Contacto/Contacto.php"> Contactenos</a>
			</td>

		</tr>
	</table>

	<center>
		<h1>FORMULARIO DE REGISTRO USUARIO</h1>
	</center>
	<?php
	include("../ConexionBase/Conexiondb.php");
	$registros = $conexion_db->query("SELECT * FROM USUARIO")->fetchAll(PDO::FETCH_OBJ);
	if (isset($_POST["cr"])) { //si se ha pulsado el botón cr, que es para insertar
		//el Id, no es necesario traerlo, porque es autonumerico
		$nombre = $_POST["nom"];
		$apellido = $_POST["ape"];
		$correo = $_POST["correo"];
		$telefono = $_POST["tel"];
		$direccion = $_POST["direc"];
		$genero = $_POST["genero"];
		$fechanacio = $_POST["fechanacim"];
		$ciudad = $_POST["ciudad"];
		$nacionalidad = $_POST["nacio"];
		$pass = $_POST["pass"];
		$rpass = $_POST["rpass"];
		$SQL = "INSERT INTO USUARIO (NOMBRE, APELLIDO, CORREO, TELEFONO, DIRECCION, GENERO, FECHANACIMIENTO, CIUDAD, NACIONALIDAD, CONTRASENA, CONTRASENAREPETIDA) VALUES (:nombre, :apellido, :correo, :telefono, :direccion, :genero, :fechanacimiento, :ciudad, :nacionalidad, :pass, :rpass)";
		$Resultado = $conexion_db->prepare($SQL);
		$Resultado->execute(array(":nombre" => $nombre, ":apellido" => $apellido, ":correo" => $correo, ":telefono" => $telefono, ":direccion" => $direccion, ":genero" => $genero, ":fechanacimiento" => $fechanacio, ":ciudad" => $ciudad, ":nacionalidad" => $nacionalidad, ":pass" => $pass, ":rpass" => $rpass));
		header("Location:FormularioregistroUsuario.php");
	}
	?>
	<Form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
		<table width="50%" border="0" align="center">
			<tr>
				<td>Nombre: </td>
				<td><input type='text' name='nom' size='45' class='centrado' required></td>
			</tr>
			<tr>
				<td>Apellido:</td>
				<td><input type='text' name='ape' size='45' class='centrado' required></td>
			</tr>
			<tr>
				<td>Correo: </td>
				<td><input type='email' name='correo' size='45' class='centrado' required></td>
			</tr>
			<tr>
				<td>Telefono: </td>
				<td><input type='tel' name='tel' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Dirección: </td>
				<td><input type='text' name='direc' size='45' class='centrado' required></td>
			</tr>
			<tr>
				<td>Genero: </td>
				<!--<td><input type='text' name='genero' size='30' class='centrado' required></td>-->
				<td><select name="genero" class='centrado' required>
						<option selected value="0"> Elige una opción </option>
						<option value="1">masculino</option>
						<option value="2">femenino</option>
					</select></td>
			</tr>
			<tr>
				<td>Fecha Nacimiento: </td>
				<!--<td><input type='text' name='fechanacim' size='30' class='centrado' required></td>-->
				<td><input type='date' name='fechanacim' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Ciudad: </td>
				<td><input type='text' name='ciudad' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Nacionalidad: </td>
				<td><input type='text' name='nacio' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Contraseña: </td>
				<td><input type='password' name='pass' size='16' class='centrado'></td>
			</tr>
			<tr>
				<td>Repite Contraseña: </td>
				<td><input type='password' name='rpass' size='16' class='centrado' require></td>
			</tr>
			<tr>
				<td class='bot' colspan="2">
					<center><input class="button" type='submit' name='cr' id='cr' value='Enviar' required></center>
				</td>
			</tr>
		</table>
	</Form>
</body>

</html>