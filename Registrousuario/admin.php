<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
} elseif ($_SESSION['rol'] == 2) {
	header("Location:index2.php");
}
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body data-offset="40" background="images/fondotot.jpg" style="background-attachment: fixed">
	<div class="container">
		<header class="header">
			<br>
		</header>


		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<div class="nav-collapse">
						<ul class="nav">
							<li class=""><a href="admin.php">Inicio</a></li>


						</ul>
						<form action="#" class="navbar-search form-inline" style="margin-top:6px">

						</form>
						<ul class="nav pull-right">
							<li><a href="">Bienvenido <strong><?php echo $_SESSION['user']; ?></strong> </a></li>
							<li><a href="desconectar.php"> Cerrar Cesión </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>


		<div class="row">



			<div class="span12">

				<div class="caption">


					<h2> Administración de usuarios registrados</h2>
					<div class="well well-small">
						<hr class="soft" />
						<h4>Tabla de Usuarios</h4>
						<div class="row-fluid">


							<?php

							require("../ConexionBase/Conexiondb.php");
							$sql = ("SELECT * FROM login");
							$query = mysqli_query($mysqli, $sql);

							echo "<table border='1'; class='table table-hover';>";
							echo "<tr class='warning'>";
							echo "<td>Id</td>";
							echo "<td>Usuario</td>";
							echo "<td>Password</td>";
							echo "<td>Correo</td>";
							echo "<td>Password del administrador</td>";
							echo "<td>Editar</td>";
							echo "<td>Borrar</td>";
							echo "</tr>";
							?>

							<?php
							while ($arreglo = mysqli_fetch_array($query)) {
								echo "<tr class='success'>";
								echo "<td>$arreglo[0]</td>";
								echo "<td>$arreglo[1]</td>";
								echo "<td>$arreglo[2]</td>";
								echo "<td>$arreglo[3]</td>";
								echo "<td>$arreglo[4]</td>";

								echo "<td><a href='actualizar.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";
								echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='images/eliminar.png' class='img-rounded'/></a></td>";
								echo "</tr>";
							}

							echo "</table>";

							extract($_GET);
							if (@$idborrar == 2) {

								$sqlborrar = "DELETE FROM login WHERE id=$id";
								$resborrar = mysqli_query($mysqli, $sqlborrar);
								echo '<script>alert("REGISTRO ELIMINADO")</script> ';
								echo "<script>location.href='admin.php'</script>";
							}

							?>
							<div class="span8">

							</div>
						</div>
						<br />

					</div>
				</div>

			</div>
		</div>
		<hr class="soften" />
		<footer class="footer">

			<hr class="soften" />
		</footer>
	</div>
	</style>
</body>

</html>