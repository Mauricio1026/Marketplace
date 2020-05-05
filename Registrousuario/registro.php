<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>marketplace</title>
	<!--llama la hoja de estilos-->
	<link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>

	<?php
	include("../ConexionBase/Conexiondb.php");

	if (isset($_POST["cr"])) {
		$Nombre = $_POST['nom'];
		$Apellido = $_POST['ape'];
		$Correo = $_POST['correo'];
		$Telefono = $_POST['tel'];
		$Direccion = $_POST['direc'];
		$Genero = $_POST['genero'];
		$FechaNacimiento = $_POST['fechanacim'];
		$Ciudad = $_POST['ciudad'];
		$Nacionalidad = $_POST['nacio'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];

		if ($pass1 == $pass2) {
		} else {
	?>
			<script>
				alert("Las contraseñas ingresadas no coinciden");
				location.href = "registro.php";
			</script>
	<?php

		}

		$SQL = "INSERT INTO USUARIO (NOMBRE, APELLIDO, CORREO, TELEFONO, DIRECCION, GENERO, FECHANACIMIENTO, CIUDAD, NACIONALIDAD, CONTRASENA, CONTRASENAREPETIDA) VALUES (:nombre, :ape, :correo, :tel, :direc, :genero,:fechanacim, :ciudad, : nacio, :pass1,:pass2)";
		$Resultado = $conexion_db->prepare($SQL);
		$Resultado->execute(array(":id" => 0, ":nom" => $Nombre, ":ape" => $Apellido, ":correo" => $Correo, ":tel" => $Telefono, ":direc" => $Direccion, ":genero" => $Genero, ":fechanacim" => $FechaNacimiento, ":ciudad" => $Ciudad, ":nacio" => $Nacionalidad, ":pass1" => $pass1, ":pass2" => $pass2));
		header("Location:registro.php");
	}

	?>

	<center>
		<h1>FORMULARIO DE REGISTRO USUARIO</h1>
	</center>
	<Form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
		<table width="50%" border="0" align="center">
			<tr>
				<td>Nombre: </td>
				<td><input type='text' name='nom' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Apellido:</td>
				<td><input type='text' name='ape' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Correo: </td>
				<td><input type='email' name='correo' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Telefono: </td>
				<td><input type='tel' name='tel' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Dirección: </td>
				<td><input type='text' name='direc' size='30' class='centrado' required></td>
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
				<td><input type='password' name='pass1' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td>Repite Contraseña: </td>
				<td><input type='password' name='pass2' size='30' class='centrado' required></td>
			</tr>
			<tr>
				<td class='bot'><input type='submit' name='cr' id='cr' value='Enviar' required></td>
			</tr>

		</table>
	</Form>
	<center><a href="../Home.php"><button style='width:100px; height:50px'>INICIO</button></a></center>
</body>

</html>