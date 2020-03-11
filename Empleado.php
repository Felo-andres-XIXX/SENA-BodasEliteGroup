  <?php

 session_start();

  if(!isset($_SESSION['idCargo'])){
  	header('location: iniciar_sesion.php');
  }else{
  	if($_SESSION['idCargo']!=2){
  		header('location: index.php');
  	}
  }

 ?>



 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/Lo1.PNG">
	<link rel="stylesheet" href="css/principal.css">
	<?php
		include "includes/scripts.php";
	?>
	<title>Sistema de Inventario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<?php
		include "includes/header_emp.php";
	?>
	<section id="container">
		
		<h1>Bienvenido al sistema <?php echo $_SESSION["nombre"];	 ?></h1>
	</section>

		<?php
			include "includes/footer.php";
		?>
</body>
</html>