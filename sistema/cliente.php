<?php

 session_start();

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Inventario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<section id="container">
	
		<h1>Bienvenido al sistema <?php echo $_SESSION["nombre_cliente"];	 ?></h1>
		<a href="cerrar_sesion.php"><button style="width:16.663%">Cerrar Sistema</button></a>

	</section>
</body>
</html>