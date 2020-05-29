<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Marketplace/Css/estilo.css">
    <title>MarketPlace</title>
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
    <center>
        <table>
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
                    <a class="button" href="Home.php">Inicio</a>
                </td>
                <td>
                    <a class="button" href="../Catalogo/Catalogo.php">Catalogo</a>
                </td>
                <td>
                    <a class="button" href="../reservas/FormuReserva.php">Reserva</a>
                </td>
                <td>
                    <a class="button" href="../Registrousuario/FormularioregistroUsuario.php">Inscripción</a>
                </td>

                <td>
                    <a class="button" href="../Contacto/Contacto.php"> Contactenos</a>
                </td>

            </tr>
        </table>
    </center>
</body>

</html>