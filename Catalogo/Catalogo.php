<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>marketplace</title>
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>
<style type="text/css">
    .boton_login {
        text-decoration: none;
        padding: 5px;
        font-weight: 600;
        font-size: 20px;
        color: #ffffff;
        background-color: #000000;
        border-radius: 6px;
        border: 1px solid #0016b0;
    }

    .boton_login:hover {
        color: #000000;
        background-color: #ffffff;
    }

    .button {
        text-decoration: none;
        padding: 5px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 20px;
        background-color: white;
        color: black;
        border: 2px solid #555555;
    }

    .button:hover {
        background-color: #555555;
        color: white;
    }

</style>
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
                    <FONT FACE="Delninoys" SIZE=10 COLOR="black">Market Place</FONT>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <h3>
                        Bienvenido al sitio web de <strong>MARKETPLACE</strong> en este puede realizar la reserva de diversos productos
                    </h3>
                </td>
                <td>
                    <a class="boton_login" href="../Registrousuario/desconectar.php">Cerrar Sesión</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="button" href="../Registrousuario/Home.php">Inicio</a>
                </td>
                <td>
                    <a class="button" href="Catalogo.php">Catalogo</a>
                </td>
                <td>
                    <a class="button" href="../Reserva.php">Reserva</a>
                </td>
                <td>
                    <a class="button" href="../Registrousuario/FormularioregistroUsuario.php">Inscripción</a>
                </td>
                <td>
                    <a class="button" href="../Contacto/Contacto.php"> Contactenos</a>
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

                            </tr>
                        <?php
                        endforeach;
                        ?>

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