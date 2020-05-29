<html>
<head>
  <title>Reservas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>


  <div class="col-md-4">

    <center><h1>Interfaz De Reservas Proveedores</h1></center>

    <form method="POST" action="reservas.php" >

    <div class="form-group">
      <label for="idReserva">ID de la reserva</label>
      <input type="text" name="idReserva" class="form-control" id="idReserva">
    </div>

    <div class="form-group">
      <label for="Titulo">Titulo de la reserva</label>
      <input type="text" name="Titulo" class="form-control" id="Titulo">
    </div>

    <div class="form-group">
        <label for="Valor">Valor de la reserva</label>
        <input type="text" name="Valor" class="form-control" id="Valor" >
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripcion de la reserva</label>
        <input type="text" name="Descripcion" class="form-control" id="Descripcion" >
    </div>

    <div class="form-group">
        <label for="CantidadReservas">Cantidad de La Oferta</label>
        <input type="text" name="CantidadReservas" class="form-control" id="CantidadReservas">
    </div>
    <div class="form-group">
        <label for="EstadoReserva">Estado de la reserva</label>
        <input type="text" name="EstadoReserva " class="form-control" id="EstadoReserva ">
    </div>
    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("abrir_conexion.php");
      $idReserva    ="";
      $Titulo    ="";
      $Valor ="";
      $Descripcion    ="";
      $CantidadReservas   ="";
      $EstadoReserva   ="";

      if(isset($_POST['btn_registrar']))
      {    
        $idReserva    =$_POST['idReserva'];  
        $Titulo    =$_POST['Titulo'];
        $Valor =$_POST['Valor'];
        $Descripcion    =$_POST['Descripcion'];
        $CantidadReservas   =$_POST['CantidadReservas'];

        if($idReserva==""|| $Titulo==""||$Valor==""){
            echo "los campos son obligatorios";
        }
        else 
        {
            mysqli_query($conexion,"INSERT INTO $tabla_db2 (idReserva,Titulo,
            Valor,Descripcion,CantidadReservas,EstadoReserva )
            values
            ('$idReserva','$Titulo','$Valor' ,'$Descripcion','$CantidadReservas','$EstadoReserva')");
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