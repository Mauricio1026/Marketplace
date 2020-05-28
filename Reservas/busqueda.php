<?php

//Variable que contendrá el resultado de la búsqueda

$texto = »;

//Variable que contendrá el número de resgistros encontrados

$registros = »;

if($_POST){

$busqueda = trim($_POST[‘buscar’]);

$entero = 0;

if (empty($busqueda)){

$texto = "Búsqueda sin resultados";

}else{

// Si hay información para buscar, abrimos la conexión

conectar();

mysql_set_charset(‘utf8’);

// mostramos la información en utf-8

//Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar

$sql = «SELECT * FROM catalogo WHERE provincia LIKE ‘%» .$busqueda. «%’ ORDER BY provincia»;

$resultado = mysql_query($sql); //Ejecución de la consulta

//Si hay resultados…

if (mysql_num_rows($resultado) > 0){

// Se recoge el número de resultados

$registros = ‘<p>HEMOS ENCONTRADO ‘ . mysql_num_rows($resultado) . ‘ registros </p>’;

// Se almacenan las cadenas de resultado

while($fila = mysql_fetch_assoc($resultado)){

$texto .= $fila[‘provincia’] . ‘<br />’;

}

}else{ $texto = «NO HAY RESULTADOS EN LA BBDD»;

}

// Cerramos la conexión (por seguridad, no dejar conexiones abiertas) mysql_close($conexion);

}

}

?>