<html>

<head>
  <title>Ofertas Administrador</title>
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
        <h1>Interfaz Ofertas Administrador</h1>
        <td>
          <a class="button" href="../Registrousuario/admin.php">Volver</a>
        </td>
      </center>

      <form method="POST" action="ofertasadmi.php">

        <div class="form-group">
          <label for="doc">Nombre De la Oferta</label>
          <input type="text" name="doc" class="form-control" id="doc">
        </div>

        <div class="form-group">
          <label for="nombre">Valor de la oferta</label>
          <input type="text" name="nombre" class="form-control" id="nombre">
        </div>

        <div class="form-group">
          <label for="dir">Fecha de la Oferta</label>
          <input type="date" name="dir" class="form-control" id="dir">
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

      $NombreOferta   = "";
      $ValorOferta = "";
      $FechaOferta    = "";

      if (isset($_POST['btn_registrar'])) {
        $NombreOferta = $_POST['NomberOferta'];
        $ValorOferta = $_POST['ValorOferta'];
        $FechaOferta = $_POST['FechaOferta'];
        if ($NomberOferta == "" || $ValorOferta == "" || $FechaOferta == "") {
          echo "los campos son obligatorios";
        } else {
          mysqli_query($conexion, "INSERT INTO $tabla_db1 (NomberOferta,
            ValorOferta,FechaPferta)values('$NombreOferta','$ValorOferta' ,'$FechaOferta')");
        }
      }

      if (isset($_POST['btn_consultar'])) {
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1");
        while ($consulta = mysqli_fetch_array($resultados)) {
          echo "
          <table width=\"100%\" size=\"10\" border=\"1\" >
            <tr>
              <td>
                <b><center>Id Oferta</center></b>
              </td>
              <td>
                <b><center>Nombre Oferta</center></b>
              </td>
              <td>
              <b><center>Valor Oferta</center></b>
              </td>
              
            </tr>
            <tr>
              <td><center>" . $consulta['IdOferta'] . "</td>
              <td><center>" . $consulta['NomberOferta'] . "</td>
              <td><center>" . $consulta['ValorOferta'] . "</td>
            </tr>
       </table>";
        }
      }

      if (isset($_POST['btn_actualizar'])) {
      }

      if (isset($_POST['btn_eliminar'])) {
      }

      include("cerrar_conexion.php");
      ?>

    </div>


    <!-- TERMINA LA COLUMNA -->



    <div class="col-md-4"></div>
  </div>





</body>

</html>