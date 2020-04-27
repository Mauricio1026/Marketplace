<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>marketplace</title>
    <!--llama la hoja de estilos-->
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>

    <?php
    include("../ConexionBase/Conexiondb.php");

    $registros = $conexion_db->query("SELECT * FROM CATALOGO")->fetchAll(PDO::FETCH_OBJ);

    if (isset($_POST["cr"])) { //si se ha pulsado el botón cr, que es para insertar
        //el Id, no es necesario traerlo, porque es autonumerico
        $nom = $_POST["nom"];
        $desc = $_POST["desc"];
        $fot = $_POST["fot"];
        $fech = $_POST["fech"];
        $cap = $_POST["cap"];
        $prec = $_POST["prec"];


        $SQL = "INSERT INTO CATALOGO (NOMBRE, DESCRIPCION, FOTO, FECHA, CAPACIDAD, PRECIO) VALUES (:nombre, :descripcion, :foto, :fecha, :capacidad,:precio)";
        $Resultado = $conexion_db->prepare($SQL);
        $Resultado->execute(array(":nombre" => $nom, ":descripcion" => $desc, ":foto" => $fot, ":fecha" => $fech, ":capacidad" => $cap, ":precio" => $prec));
        header("Location:Catalogo.php");
    }

    ?>

    <h1>Catalogo<span class="subtitulo">Marketplace</span></h1>

    <Form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <table width="50%" border="0" align="center">
            <tr>
                <!--TR crea las filas en la tabla-->
                <td class="primera_fila">Id</td>
                <!--TD maneja las columnas de la tabla-->
                <td class="primera_fila">Nombre</td>
                <td class="primera_fila">Descripcion</td>
                <td class="primera_fila">Fotos</td>
                <td class="primera_fila">Fecha</td>
                <td class="primera_fila">Cantidad</td>
                <td class="primera_fila">Precio</td>

                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>

            <!-- filas que requiero repetir n veces, conforme el número de registros de la BD-->
            <?php
            foreach ($registros as $usuario) : ?>
                <tr>

                    <td><?php echo $usuario->idCatalogo ?></td>
                    <td><?php echo $usuario->Nombre ?></td>
                    <td><?php echo $usuario->Descripcion ?></td>
                    <td><?php echo $usuario->Foto ?></td>
                    <td><?php echo $usuario->Fecha ?></td>
                    <td><?php echo $usuario->Capacidad ?></td>
                    <td><?php echo $usuario->Precio ?></td>



                    <!--Con el boton borrar,  llamar el archivo Borrar_Registro y le paso el Id a eliminar
      despues de llamar la pagina Borrar_Registro.php, agrego un ? y el nombre del parametro
      ademas de eso no puedo decirle que el ?Id=3, porque siempre me estaría refiriendo al registro 3
      lo que debo hacer es insertar un código PHP, para pasarle ese parametro dinamicamente, es decir el Id 
      del objeto que el bucle foreach este evaluando en el momento, del botón que se haya oprimido-->
                    <td class="bot"><a href="Borrar_Registro.php?Id=<?php echo $usuario->idCatalogo ?>">
                            <input type='button' name='del' id='del' value='Borrar'></a></td>


                    <!--Con el boton borrar,  llamar el archivo Borrar_Registro y le paso el Id a eliminar
      despues de llamar la pagina Borrar_Registro.php, agrego un ? y el nombre del parametro-->

                    <td class='bot'><a href="Update_Registro.php?Id=<?php echo $usuario->Id ?> & nom=<?php echo $usuario->Nombre ?> 
                       & desc=<?php echo $usuario->Descripcion ?> & fot=<?php echo $usuario->Foto ?>&fech=<?php echo $usuario->Fecha ?> &cap=<?php echo $usuario->Capacidad ?> &prec=<?php echo $usuario->Precio ?>">
                            <input type='button' name='up' id='up' value='Actualizar'></a></td>
                </tr> <!-- finaliza la primera fila-->
            <?php
            endforeach;
            ?>

            <tr>
                <td></td>
                <td><input type='text' name='nom' size='10' class='centrado'></td>
                <td><input type='text' name='desc' size='10' class='centrado'></td>
                <td><input type='text' name='fot' size='10' class='centrado'></td>
                <td><input type='text' name='fech' size='10' class='centrado'></td>
                <td><input type='text' name='cap' size='10' class='centrado'></td>
                <td><input type='text' name='prec' size='10' class='centrado'></td>
                <!--este bóton insertar es de tipo submit, para que envié la info a la BD-->
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            </tr>
        </table>
    </Form>
    <center><a href="../Home.php"><button  style='width:100px; height:50px'>INICIO</button></a></center>
    <p>&nbsp;</p>
</body>

</html>