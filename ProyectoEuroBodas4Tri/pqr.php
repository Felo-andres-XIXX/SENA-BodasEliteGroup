<!DOCTYPE html>
<html>
 <title>Comentarios</title>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="footer, address, phone, icons" />
 
    <title>Responsive Footer</title>
 
    <link rel="stylesheet" href="css/estilo.css">

    <link rel="stylesheet" href="css/iniciar_sesion.css">
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
 
</head>


<div class="topnav">
  <a href="index.php">Volver</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Buscar</button>
    </form>
  </div>

<br>    
<body>

</body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PQR</title>
    
    <link rel="stylesheet" href="css/estilo.css">
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
 
</head>


<body>
<br>
<div><center>
<img src="css/img/elite.png">
</center></div>

    <form action=" " method="POST">

    <center>

    <div>
    <h3>Deje sus comentarios:</h3>
    <textarea name="odservacion_cotizacion" rows="10" cols="50" placeholder="(Obligatorio)" 
    required>
    </textarea>
    </div>

<input type="submit" value="GUARDAR">
    </center>

</form>

<?php

include "conexion.php";

if (!empty($_POST['odservacion_cotizacion']))
{
    $observ = $_POST['odservacion_cotizacion'];
    $resultado = mysqli_query($conection, "UPDATE cotizacion SET odservacion_cotizacion = '$observ' WHERE id_cotizacion = '3';");
if ($resultado){
    echo "<script type=\"text/javascript\">alert('Se guardo su comentario.');</script>" ;
    header('location: pqr.php');
  
}else {
    echo "<script type=\"text/javascript\">alert('Error al guardar el comentario.');</script>"; 
}
}




?>

</body>
</html>

 
<footer class="footer-distributed">
 
<div class="footer-left">
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
            </div>
        </footer>

</body>

</html>