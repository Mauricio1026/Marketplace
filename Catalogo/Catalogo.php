<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>marketplace</title>
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
    <table align="center">
        <tr>
            <td colspan="5">
                <FONT FACE="impact" SIZE=6 COLOR="black">Market Place</FONT>
            </td>
        </tr>
        <tr>
            <td>
                <a href="../Home.php"><button>Inicio</button></a>
            </td>
            <td>
                <a href="Catalogo.php"><button>Catalogo</button></a>
            </td>
            <td>
                <a href="Reserva.php"><button>Reserva</button></a>
            </td>
            <td>
                <a href="../Registrousuario/registro.php"><button>Inscripción</button></a>
            </td>

            <td>
                <a href="../Contacto/Contacto.php"><button>Contactenos</button></a>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <h1>Categorias</h1>
                <Form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table>
                        <tr>
                            <td class="primera_fila">Id</td>
                            <td class="primera_fila">Nombre</td>
                            <td class="primera_fila">Descripcion</td>
                            <td class="primera_fila">Fotos</td>
                            <td class="primera_fila">Fecha</td>
                            <td class="primera_fila">Cantidad</td>
                            <td class="primera_fila">Precio</td>
                        </tr>
                        <?php
                        foreach ($registros as $usuario) :
                        ?>
                            <tr>
                                <td><?php echo $usuario->idCatalogo ?></td>
                                <td><?php echo $usuario->Nombre ?></td>
                                <td><?php echo $usuario->Descripcion ?></td>
                                <td><?php echo $usuario->Foto ?></td>
                                <td><?php echo $usuario->Fecha ?></td>
                                <td><?php echo $usuario->Capacidad ?></td>
                                <td><?php echo $usuario->Precio ?></td>
                                <td class="bot"><a href="Borrar_Registro.php?Id=<?php echo $usuario->idCatalogo ?>">
                                        <input type='button' name='del' id='del' value='Borrar'></a></td>
                                <td class='bot'><a href="Update_Registro.php?Id=<?php echo $usuario->Id ?> & nom=<?php echo $usuario->Nombre ?> 
                       & desc=<?php echo $usuario->Descripcion ?> & fot=<?php echo $usuario->Foto ?>&fech=<?php echo $usuario->Fecha ?> &cap=<?php echo $usuario->Capacidad ?> &prec=<?php echo $usuario->Precio ?>">
                                        <input type='button' name='up' id='up' value='Actualizar'></a></td>
                            </tr>
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
                            <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
                        </tr>
                    </table>
                </Form>
            </td>
            <td>
                <h1>Titulo Categoria</h1>
                <center>
                    <img src="../Imagenes/Catalogo.png">
                </center>
            </td>

            <td>
                <h1>Servicios</h1>
                <img src="../Imagenes/Servicio1.jpg">
            </td>
        </tr>
        <?php
        try {
            $conexion_db->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
            $conexion_db->beginTransaction();
            $conexion_db->exec("INSERT INTO catalogo ( Nombre, Descripcion, foto, fecha, capacidad, precio) values (:nombre, :descripcion, :foto, :fecha, :capacidad,:precio)");
            $conexion_db->commit();
        } catch (Exception $e) {
            $conexion_db->rollBack();
            return $e->getMessage();
        }
        ?>




    </table>
</body>

</html>