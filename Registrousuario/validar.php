<?php
session_start();
include("../ConexionBase/connect_db.php");
$email = $_POST['mail'];
$pass = $_POST['pass'];
$sql2 = mysqli_query($mysqli, "SELECT * FROM ADMINISTRADOR WHERE CORREO ='$email'");
if ($f2 = mysqli_fetch_assoc($sql2)) {
	if ($pass == $f2['Contrasenaadmin']) {
		$_SESSION['idAdministrador'] = $f2['idAdministrador'];
		$_SESSION['Nombre'] = $f2['Nombre'];
        $_SESSION['Cargo'] = $f2['Cargo'];
        $_SESSION['rol'] = $f2['rol'];
		echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
		echo "<script>location.href='admin.php'</script>";
	}
}

$sql = mysqli_query($mysqli, "SELECT * FROM USUARIO WHERE CORREO='$email'");
if ($f = mysqli_fetch_assoc($sql)) {
	if ($pass == $f['Contrasena']) {
		$_SESSION['idUsuario'] = $f['idUsuario'];
		$_SESSION['Nombre'] = $f['Nombre'];
        $_SESSION['Apellido'] = $f['Apellido'];
        $_SESSION['rol'] = $f2['rol'];
		header("Location:Home.php");
	} else {
		echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		echo "<script>location.href='../index.php'</script>";
	}
} else {

	echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

	echo "<script>location.href='../index.php'</script>";
}


/*
$nr = mysqli_num_rows($query);
if ($nr == 1) {
    //header("Location:Home.php");
    echo "Bienvenido:" . $usuario;
} else if ($nr == 0) {
    echo "Error al ingresar";
}
*/