<?php

try {
	$conexion_db = new PDO('mysql:host=localhost;dbname=marketplace', 'root', 'Admin123', array(PDO::ATTR_PERSISTENT => true));
	echo "Conectado\n";
	$conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$conexion_db->exec("SET CHARACTER SET utf8");

	//$conexion_db->exec("insert into salarychange (id, amount, changedate) values (23, 50000, NOW())");

	

} catch (PDOException $e) {
	die('error no se puede conectar a la base de datos:'  . $e->getMessage());
	echo "\nse está presentando un error en la línea:"  . $e->getLine();
}
