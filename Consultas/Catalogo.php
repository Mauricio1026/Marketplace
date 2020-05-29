<html>
<head>
  <title>Catalogo Proveedores</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>


  <div class="col-md-4">

    <center><h1>Interfaz De Catalogos Proveedores</h1></center>

    <form method="POST" action="Catalogo.php" >


    <div class="form-group">
      <label for="Nombre">Nombre del Catalogo</label>
      <input type="text" name="Nombre" class="form-control" id="Nombre">
    </div>

    <div class="form-group">
        <label for="Descripcion">Descripcion del Catalogo</label>
        <input type="text" name="Descripcion" class="form-control" id="Descripcion" >
    </div>

    <div class="form-group">
        <label for="Fecha">Fecha del Catalogo</label>
        <input type="text" name="Fecha" class="form-control" id="Fecha">
    </div>

    <div class="form-group">
        <label for="Precio">Precio del Catalogo</label>
        <input type="text" name="Precio" class="form-control" id="Precio">
    </div>
    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
    </center>

  </form>

  <?php
    include("abrir_conexion.php");
      

    $Nombre    ="";
    $Descripcion="";
    $Fecha="";
    $Precio   ="";

    if(isset($_POST['btn_registrar']))
    {    
  
      $Nombre    =$_POST['Nombre'];
      $Descripcion  =$_POST['Descripcion'];
      $Fecha   =$_POST['Fecha '];
      $Precio   =$_POST['Precio'];

      if($Nombre ==""||$Descripcion==""){
          echo "los campos son obligatorios";
      }
      else 
      {
          mysqli_query($conexion,"INSERT INTO $tabla_db2 (Nombre,
          Descripcion,Fecha,Precio  )
          values
          ('$Nombre','$Descripcion' ,'$Fecha','$Precio ')");
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