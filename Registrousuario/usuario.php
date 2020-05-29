<!DOCTYPE html>

<?php
session_start();
if (@!$_SESSION['Nombre']) {
	header("Location:Home.php");
} elseif ($_SESSION['roll']==1) {
	header("Location:admin.php");
}
?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login Usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<script src="bootstrap/js/jquery-1.8.3.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body data-offset="40" background="" style="background-attachment: fixed">
	<div class="container">
		<header class="header">
			<div class="row">


			</div>
		</header>

		<div id="myCarousel" class="carousel slide homCar">
			<div class="carousel-inner" style="border-top:18px solid #222; border-bottom:1px solid #222; border-radius:4px;">
				<div class="item active">
					<img src="Imagenes/novedades.jpg" alt="#" style="min-height:250px; min-width:100%" />
					<div class="carousel-caption">
						<h4>Novedades y Noticias</h4>
						<p>
							Aqui podras ver las diferentes ofertas que te ofrece el marketplace.
						</p>
					</div>
				</div>
				<div class="item">
					<img src="Imagenes/Paintball.jpg" alt="#" style="min-height:250px; min-width:100%" />
					<div class="carousel-caption">
						<h4>Paintball</h4>
						<p>
							Adquiere en tu reserva 2 dias de Paintball.
						</p>
					</div>
				</div>
				<div class="item">
					<img src="Imagenes/islas.jpg" alt="#" style="min-height:250px; min-width:100%" />
					<div class="carousel-caption">
						<h4>Islas</h4>
						<p>
							No olvide relajarte en vacaciones con la oferta de islas.
						</p>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>

		</div>

		<div class="span2">
			<div class="well well-small">
				<h4>Agregar Reversa </h4>
				<a href=""><small>Agregar</small></a>
			</div>
		</div>

		<div class="span2">
			<div class="well well-small">
				<h4>Consultar Reversa </h4>
				<a href=""><small>Consultar</small></a>
			</div>
		</div>


		<div class="span2">
			<div class="well well-small">
				<h4>Agregar Oferta </h4>
				<a href=""><small>Agregar</small></a>
			</div>
		</div>

		<div class="span2">
			<div class="well well-small">
				<h4>Consultar Oferta </h4>
				<a href=""><small>Consultar</small></a>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<h3>Todas tus ofertas y reservas</h3>
		<br>
		<div class="row" style="text-align:center">




			<div class="span2">
				<div class="well well-small">
					<h4>Natacion</h4>
					<a href=""><small>Ver detalles</small></a>
				</div>
			</div>



			<div class="span2">
				<div class="well well-small">
					<h4>Spa</h4>
					<a href=""><small>Ver detalles</small></a>
				</div>
			</div>
			<div class="span2">
				<div class="well well-small">
					<h4>Comidas</h4>
					<a href=""><small>Ver detalles</small></a>
				</div>
			</div>
			<div class="span2">
				<div class="well well-small">
					<h4>Cine</h4>
					<a href=""><small>Ver detalles</small></a>
				</div>
			</div>
		</div>


		<div class="span12">
			<div class="well well-small">
				<h4>Deseas revisar nuestro catalogo</h4>
				<a href="Catalogo/Catalogo.php"><small>Pulsa Aqui</small></a>




				<h4>Necesitas Ayuda de Contacto para estar mas accesorado</h4>
				<a href="Contacto/Contacto.php"><small>Pulsa Aqui</small></a>
			</div>
		</div>
	</div>

	</style>
</body>

</html>