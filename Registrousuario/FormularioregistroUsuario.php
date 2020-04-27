<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
</head>

<body>
    <?php
    include("../ConexionBase/Conexiondb.php");

    $registros = $conexion_db->query("SELECT * FROM USUARIO")->fetchAll(PDO::FETCH_OBJ);

    if (isset($_POST["cr"])) { //si se ha pulsado el botón cr, que es para insertar
        //el Id, no es necesario traerlo, porque es autonumerico
        $Nombre = $_POST['nom'];
        $Apellido = $_POST['ape'];
        $Correo = $_POST['correo'];
        $Telefono = $_POST['tel'];
        $Direccion = $_POST['direc'];
        $Genero = $_POST['genero'];
        $FechaNacimiento = $_POST['fechanacim'];
        $Ciudad = $_POST['cuidad'];
        $Nacionalidad = $_POST['nacio'];
        $pass = $_POST['pass'];
        $rpass = $_POST['rpass'];
        if ($pass != $rpass) {
            die('las contaseñas no coinciden, Verifique <br /> <a href="Home.php">Volver</a>');
        }
        $SQL = "INSERT INTO USUARIO (NOMBRE, APELLIDO, CORREO, TELEFONO, DIRECCION, GENERO, FECHANACIMIENTO, CIUDAD, NACIONALIDAD) VALUES (:nombre, :descripcion, :foto, :fecha, :capacidad,:precio)";
        $Resultado = $conexion_db->prepare($SQL);
        $Resultado->execute(array(":nom" => $Nombre, ":ape" => $Apellido, ":correo" => $Correo, ":tel" => $Telefono, ":direc" => $Direccion, ":genero" => $Genero, ":fechanacim"=> $FechaNacimiento, ":ciudad"=> $Ciudad,":nacio"=>$Nacionalidad));
        header("Location:FormularioregistroUsuario.php");
    }

    ?>
    <h1>FORMULARIO DE REGISTRO DE USUARIO</h1>

    <Form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <table width="50%" border="0" align="center">
            <tr>
                <!--TR crea las filas en la tabla-->
                <td class="primera_fila">Id</td>
                <!--TD maneja las columnas de la tabla-->
                <td class="primera_fila">Nombre</td>
                <td class="primera_fila">Apellido</td>
                <td class="primera_fila">Correo</td>
                <td class="primera_fila">Telefono</td>
                <td class="primera_fila">Direccion</td>
                <td class="primera_fila">Genero</td>
                <td class="primera_fila">Fecha Nacimiento</td>
                <td class="primera_fila">Ciudad</td>
                <td class="primera_fila">Nacionalidad</td>


                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>

            <!-- filas que requiero repetir n veces, conforme el número de registros de la BD-->
            <?php
            foreach ($registros as $usuario) : ?>
                <tr>

                    <td><?php echo $usuario->idUsuario ?></td>
                    <td><?php echo $usuario->Nombre ?></td>
                    <td><?php echo $usuario->Apellido ?></td>
                    <td><?php echo $usuario->Correo ?></td>
                    <td><?php echo $usuario->Telefono ?></td>
                    <td><?php echo $usuario->Direccion ?></td>
                    <td><?php echo $usuario->Genero ?></td>
                    <td><?php echo $usuario->FechaNacimiento ?></td>
                    <td><?php echo $usuario->Ciudad ?></td>
                    <td><?php echo $usuario->Nacionalidad ?></td>

                    <!--Con el boton borrar,  llamar el archivo Borrar_Registro y le paso el Id a eliminar
  despues de llamar la pagina Borrar_Registro.php, agrego un ? y el nombre del parametro
  ademas de eso no puedo decirle que el ?Id=3, porque siempre me estaría refiriendo al registro 3
  lo que debo hacer es insertar un código PHP, para pasarle ese parametro dinamicamente, es decir el Id 
  del objeto que el bucle foreach este evaluando en el momento, del botón que se haya oprimido-->
                    <td class="bot"><a href="Borrar_Registro.php?Id=<?php echo $usuario->idUsuario ?>">
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
                <td><input type='text' name='prec' size='10' class='centrado'></td>
                <td><input type='text' name='prec' size='10' class='centrado'></td>
                <td><input type='text' name='prec' size='10' class='centrado'></td>
                <!--este bóton insertar es de tipo submit, para que envié la info a la BD-->
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            </tr>
        </table>
    </Form>
    <center><a href="../Home.php"><button style='width:100px; height:50px'>INICIO</button></a></center>
    <p>&nbsp;</p>
</body>

</html>