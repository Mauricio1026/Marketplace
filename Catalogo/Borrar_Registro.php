<?php

include ("../ConexionBase/conexiondb.php");

$Id=$_GET["Id"];
//construyo la sentencia SQL, para borrar el argumento que recibo por la URL desde el formulario
$conexion_db->query("DELETE FROM CATALOGO WHERE IDCATALOGO='$Id'");
//redirijo al Index para que no se quede en una página en blanco
header("Location:Catalogo.php");
