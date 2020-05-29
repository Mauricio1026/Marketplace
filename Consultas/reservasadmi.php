<html>

<head>
  <title>Reservas Administrador</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style type="text/css">
  .button {
    text-decoration: none;
    padding: 2px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 15px;
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

  <div class="row">
    <div class="col-md-4"></div>


    <div class="col-md-4">

      <center>
        <h1>Interfaz De Reservas Administrador</h1>
      </center>
      <td>
        <a class="button" href="../Registrousuario/admin.php">Volver</a>
      </td>
      <form method="POST" action="reservasadmi.php">

        <div class="form-group">
          <label for="Titulo">Titulo de la reserva</label>
          <input type="text" name="Titulo" class="form-control" id="Titulo">
        </div>

        <div class="form-group">
          <label for="Valor">Valor de la reserva</label>
          <input type="text" name="Valor" class="form-control" id="Valor">
        </div>
        <div class="form-group">
          <label for="Descripcion">Descripcion de la reserva</label>
          <input type="text" name="Descripcion" class="form-control" id="Descripcion">
        </div>

        <div class="form-group">
          <label for="CantidadReservas">Cantidad de La reserva</label>
          <input type="text" name="CantidadReservas" class="form-control" id="CantidadReservas">
        </div>
        <div class="form-group">
          <label for="EstadoReserva">Estado de la reserva</label>
          <input type="text" name="EstadoReserva " class="form-control" id="EstadoReserva ">
        </div>

        <center>
          <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
          <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
          <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
          <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
        </center>

      </form>

      <?php
      include("abrir_conexion.php");
      $Titulo    = "";
      $Valor = "";
      $Descripcion    = "";
      $CantidadReservas   = "";
      $EstadoReserva   = "";

      if (isset($_POST['btn_registrar'])) {
        $Titulo    = $_POST['Titulo'];
        $Valor = $_POST['Valor'];
        $Descripcion    = $_POST['Descripcion'];
        $CantidadReservas   = $_POST['CantidadReservas'];

        if ($Titulo == "" || $Valor == "") {
          echo "los campos son obligatorios";
        } else {
          mysqli_query($conexion, "INSERT INTO $tabla_db3 (Titulo,
            Valor,Descripcion,CantidadReservas,EstadoReserva )
            values ('$Titulo','$Valor' ,'$Descripcion','$CantidadReservas','$EstadoReserva')");
        }
      }

      if (isset($_POST['btn_consultar'])) {
        $Titulo    = $_POST['Titulo'];
        $Valor = $_POST['Valor'];
        $Descripcion    = $_POST['Descripcion'];
        $CantidadReservas   = $_POST['CantidadReservas'];

        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db3");

        while ($consulta = mysqli_fetch_array($resultados)) {
          echo "
          <table width=\"100%\" size=\"10\" border=\"1\" >
            <tr>
              <td>
                <b><center>Id Reserva</center></b>
              </td>
              <td>
                <b><center>Titulo</center></b>
              </td>
              <td>
              <b><center>Valor</center></b>
              </td>
              <td>
              <b><center>Descripcion</center></b>
              </td>
              <td>
              <b><center>Cantidad Reservas</center></b>
              </td>
              <td>
              <b><center>Estado Reserva</center></b>
              </td>
              
            </tr>
            <tr>
              <td><center>" . $consulta['idReserva'] . "</td>
              <td><center>" . $consulta['Titulo'] . "</td>
              <td><center>" . $consulta['Valor'] . "</td>
              <td><center>" . $consulta['Descripcion'] . "</td>
              <td><center>" . $consulta['CantidadReservas'] . "</td>
              <td><center>" . $consulta['EstadoReserva'] . "</td>
            </tr>
       </table>";
        }
      }
      include("cerrar_conexion.php");
      ?>

    </div>


    <!-- TERMINA LA COLUMNA -->



    <div class="col-md-4"></div>
  </div>





</body>

</html>