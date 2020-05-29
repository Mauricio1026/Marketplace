<!DOCTYPE html>
<html lang="es">

<head>
  <title> Reservas </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="./Css/estilo.css">
  <style ">
    body {
      background-color: rgb(47, 147, 194);
    }

    form {
      width: 500px;
      padding: 16px;
      border-radius: 10px;
      margin: auto;
      background-color: #ccc;
    }

    form label {
      width: 82px;
      font-weight: bold;
      display: inline-block;
    }

    form input[type="text"],
    form input[type="email"] {
      width: 180px;
      height: 15px;
      padding: 3px 10px;
      border: 1px solid #f6f6f6;
      border-radius: 3px;
      background-color: #f6f6f6;
      margin: 8px 0;
      display: inline-block;
    }


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
</head>

<body>
  <?php
  include("../ConexionBase/Conexiondb.php");
  $registros = $conexion_db->query("SELECT * FROM RESERVA")->fetchAll(PDO::FETCH_OBJ);
  if (isset($_POST["cr"])) {
    $Titulo = $_POST['Titulo'];
    $Valor = $_POST['Valor'];
    $Descripcion = $_POST['Descripcion'];
    $CantidadReservas = $_POST['CantidadReservas'];
    $EstadoReserva = $_POST['EstadoReserva'];
    $SQL = "INSERT INTO RESERVA (TITULO, VALOR, DESCRIPCION, CANTIDADRESERVAS, ESTADORESERVA) VALUES (:Titulo, :Valor, :Descripcion, :CantidadReservas, :EstadoReserva)";
    $Resultado = $conexion_db->prepare($SQL);
    $Resultado->execute(array(":Titulo" => $Titulo, ":Valor" => $Valor, ":Descripcion" => $Descripcion, ":CantidadReservas" => $CantidadReservas, ":EstadoReserva" => $EstadoReserva));
    header("Location:FormuReserva.php");
    
  }
  echo '<script>alert("SU RESERVA HA SIDO REALIZADA")</script> ';
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
				<a class="button" href="../Catalogo/Catalogo.php">Catalogo</a>
			</td>
			<td>
				<a class="button" href="../Reserva.php">Reserva</a>
			</td>
			<td>
				<a class="button" href="FormularioregistroUsuario.php">Inscripción</a>
			</td>

			<td>
				<a class="button" href="../Contacto/Contacto.php"> Contactenos</a>
			</td>

		</tr>
  </table>
  <center>
    <h1>Realiza tu reserva en minutos</h1>
    </center>
<form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
    <table>
      <tr>
        <td>Nombre de la reserva</td>
        <td><input type="text" name="Titulo" id="Titulo" required></td>
      </tr>
      <tr>
        <td>Cantidad de reservas</td>
        <td><input type="text" name="CantidadReservas" id="CantidadReservas" required></td>
      </tr>
      <tr>
        <td>¿Que desea ir hacer en la reserva?</td>
        <td><input type="text" cols="25" rows="6" id="Descripcion" name="Descripcion"></input></td>
      </tr>
      <tr>
        <td>Precio</td>
        <td><input type="text" name="Valor" id="Valor" required></td>
      </tr>
      <tr>
        <td>Estado</td>
        <td><input type="text" name="EstadoReserva" id="EstadoReserva" required></td>
      </tr>
      <tr>
        <td><input type="submit" class="button btn-primary" name='cr' id='cr'></td>
      </tr>
      
      <tr>
        <td><input type="reset" class="button btn-primary"></td>
      </tr>
    </table>
  </form>

  
</body>

</html>