<!DOCTYPE html>

<html lang=»es-ES»>

<head>

    <meta charset='utf-8'>

</head>

<body>

    <form id=»buscador» name=»buscador» method=»post» action=»<?php echo $conexion_db['PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ'] ?>»>

        <input id=»buscar» name=»buscar» type=»search» placeholder=»Buscar aquí…» autofocus>

        <input type=»submit» name=»buscador» class=»boton peque aceptar» value=»buscar»>

    </form>

    <?php

    // Resultado, número de registros y contenido.

    echo 'Catalogo';

    ?>

</body>

</html>