<!DOCTYPE html>
<html>
 <title>Registro Cliente</title>
 <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
 
	<title>Responsive Footer</title>
 
	<link rel="stylesheet" href="css/estilo.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    
    <link href="CSS/estilos.css" rel="stylesheet" type="text/css">
 
</head>
<div class="topnav">
<a href="index.php">volver</a>
</div>
<body>
<div align="center">

<img src="img/elite.png" style="width: 20%">

</div>
</body>
<?php

include "conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PQR</title>
</head>
<body>
    
    <form action="" method="post">

    <div>
        <label for="id_cotizacion">Identificación de la cotización:</label>
        <input type="text" id="id_cotizacion" name="id_cotizacion" required/>
    </div>
    
    <div>
        <h3>Deje sus comentarios:</h3>
        <textarea name="odservacion_cotizacion" rows="10" cols="50" placeholder="(Opcional)" required></textarea>
    </div>
    
    </form>



</body>
</html>

 
<footer class="footer-distributed">
 
			<div class="footer-left">
          <img src="img/elite.png" style="width: 18%">
				<h3>Euro<span>Bodas</span></h3>
 
				<p class="footer-links">
					<a href="index.php">Inicio</a>
					|
					<a href="nosotros.php">Sobre Nosotros</a>
					|
					<a href="#">About</a>
					|
					<a href="#">Contacto</a>
				</p>
 
				<p class="footer-company-name">© 2019 EuroBodas Derechos reservados </p>
			</div>
 
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <p><span>a 22b-71,, Cra. 44a #22b1</span>
						Colombia, Bogota - 110111</p>
				</div>
 
				<div>
					<i class="fa fa-phone"></i>
					<p>+57 321 477 1511</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:comercial01.bodaselite@gmail.com">comercial01.bodaselite@gmail.com</a></p>


				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>Mas de nosotros</span>
					Ofrecemos todo tipo de eventos, sociales, empresariales, y todo lo referente a cada uno.</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</footer>

</body>

</html>
