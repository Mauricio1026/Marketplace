<?php
$mysqli = new MySQLi("localhost", "root","Admin123", "marketplace");
		if ($mysqli -> connect_errno) {
			die("Fallo la conexión a MySQL: (" .$mysqli -> connect_errno(). ") " .$mysqli -> mysqli_connect_error());
		}
		else{
			echo "Conexión exitosa!";
			
		}
?>