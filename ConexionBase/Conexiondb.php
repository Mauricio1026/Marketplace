<?php

try {
	$conexion_db = new PDO('mysql:host=localhost;dbname=marketplace', 'root', 'Admin123', array(PDO::ATTR_PERSISTENT => true));
	echo "Conectado\n";
	$conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$conexion_db->exec("SET CHARACTER SET utf8");

	$conexion_db->beginTransaction();
	$conexion_db->exec("INSERT INTO catalogo (idCatalogo, Nombre, Descripcion, foto, fecha, capacidad, precio) values (20, 'Joe', 'hvsdiugfia','kkugiuy.jpg','2020-15-2','12','654684')");
	//$conexion_db->exec("insert into salarychange (id, amount, changedate) values (23, 50000, NOW())");

	$conexion_db->commit();

} catch (PDOException $e) {
	$conexion_db->rollBack();
	die('error no se puede conectar a la base de datos:'  . $e->getMessage());
	echo "\nse está presentando un error en la línea:"  . $e->getLine();
}
