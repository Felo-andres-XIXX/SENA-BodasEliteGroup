<?php

include 'conexion.php';

$empleadosdisponibles = mysqli_query($conection,"SELECT a.nombre_empleado as Nombres, 
a.apellido_empleado as Apellido,
a.telefono_empleado as Telefono, 
nombre_cargo as Cargo,
a.estado_empleado as Estado
FROM Empleado AS A
INNER JOIN CARGO As b on b.id_cargo = a.id_cargo
WHERE a.estado_empleado = '1'
order by a.nombre_empleado;");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>


    <link rel="stylesheet" href="css/estilo.css">

    <link rel="stylesheet" href="css/decoracion.css">
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
 
</head>
<body>

<div class="topnav">
  <a href="servicios.php">Atras</a>
  <a href=" ">Eventos</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Buscar</button>
    </form>
  </div>
</div>
<center>
<?php
    if(!empty($empleadosdisponibles)){?>
        <table>
    <thead>
        <tr>
            <th style="width: 8%; color: rgb(0, 0, 0); background-color: rgb(76, 232, 170)">Nombres</th>
            <th style="width: 8%; color: rgb(0, 0, 0); background-color: rgb(76, 232, 170)">Apellido</th>
            <th style="width: 25%; color: rgb(0, 0, 0); background-color: rgb(76, 232, 170)">Teléfono</th>
            <th style="width: 35%; color: rgb(0, 0, 0); background-color: rgb(76, 232, 170)">Cargo</th>
            <th style="width: 10%; color: rgb(0, 0, 0); background-color: rgb(76, 232, 170)">Estado</th>
        </tr>
    </thead>
    <?php
    $registros=mysqli_num_rows($empleadosdisponibles);
            if ($registros > 0) {
                while($arreglo =mysqli_fetch_array($empleadosdisponibles)){
            
            ?>
                <tbody>
                    <tr>
                        <th style=" color: rgb(55, 55, 55); background-color: rgb(180, 255, 229)"><?php echo $arreglo["Nombres"] ?></th>
                        <th style=" color: rgb(55, 55, 55); background-color: rgb(180, 255, 229)"><?php echo $arreglo["Apellido"] ?></th>
                        <th style=" color: rgb(55, 55, 55); background-color: rgb(180, 255, 229)"><?php echo $arreglo["Telefono"] ?></th>
                        <th style=" color: rgb(55, 55, 55); background-color: rgb(180, 255, 229)"><?php echo $arreglo["Cargo"]?></th>
                        <th style=" color: rgb(55, 55, 55); background-color: rgb(180, 255, 229)"><?php echo $arreglo["Estado"]?></th>
                    </tr>
                </tbody>
                <?php
            }
        }
    }
    else{

        echo "<script type=\"text/javascript\">alert('No hay personal disponible. Comuniquese con nosotros.');</script>"; 

    }
    ?>
    </table>
</center>
</body>

<footer class="footer-distributed">
 
            <div class="footer-left">
          <img src="css/img/elite.png" style="width: 18%">
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
                      <p><span>A 22b-71,, Cra. 44a #22b1</span>
                        Colombia, Bogota - 110111</p>
                </div>
 
                <div>
                    <i class="fa fa-phone"></i>
                    <p> (+57) 321 477 1511 </p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:comercial01.bodaselite@gmail.com">comercial01.bodaselite@gmail.com</a></p>


                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>Más de nosotros</span>
                    Ofrecemos todo tipo de eventos, sociales, empresariales, y todo lo referente a cada uno.</p>
                <div class="footer-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </footer>

</html>