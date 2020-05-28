<?php    
    $Nombre = $_POST['nom'];
	$Apellido = $_POST['ape'];
	$Correo = $_POST['correo'];
	$Telefono = $_POST['tel'];
	$Direccion = $_POST['direc'];
	$Genero = $_POST['genero'];
	$FechaNacimiento = $_POST['fechanacim'];
	$Ciudad = $_POST['ciudad'];
	$Nacionalidad = $_POST['nacio'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];

    require("../ConexionBase/Conexiondb.php");
    $checkemail=mysqli_query($mysqli,"SELECT * FROM usuarios WHERE email='$mail'");
    $check_mail=mysqli_num_rows($checkemail);
    if($pass==$rpass){
        if($check_mail>0){
            echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
        }else{
            mysqli_query($mysqli,"INSERT INTO usuarios VALUES('','$Nombre','$Apellido','$Correo','$Telefono','$Direccion','$Genero','$FechaNacimiento','$Ciudad','$Nacionalidad','$pass','$rpass')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				
        }
    }else{
			echo 'Las contraseñas son incorrectas';
		}


?>