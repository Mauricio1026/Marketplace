<?php
 include("../ConexionBase/Conexiondb.php");
 require("FormularioregistroUsuario.php");
$query =mysqli_query($conexion_db,"SELECT * FROM usuario WHERE correo ='".$correo."' and contrasena ='".$pass."'");
$nr = mysqli_num_rows($query);
if($nr==1){
    //header("Location:Home.php");
    echo"Bienvenido:" .$usuario;
}else if($nr==0){
    echo "Error al ingresar";
}
?>