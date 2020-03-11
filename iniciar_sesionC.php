<!DOCTYPE html>
<html>
 <title>Eurobodas</title>
 
<body>	
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>

<div class="topnav">
  <a href="index.php">Inicio</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Buscar</button>
    </form>
  </div>
</div>

<div align="center">

  <img src="css/img/elite.png" style="width: 30%">

</div>



  <?php

$alert = '';

session_start();
if(!empty($_SESSION['active']))
{
  header('location: sistema/');
}
else{
  if(!empty($_POST))
  {
    if(empty($_POST['correo_cliente']) || empty($_POST['contraseña_cliente']))
    {
      $alert = 'Ingrese su usuario y su contraseña';
	}
	else
    {

      require_once "conexion.php";
      $user = mysqli_real_escape_string($conection, $_POST['correo_cliente']);
      $pass = mysqli_real_escape_string($conection, $_POST['contraseña_cliente']);

      $query = mysqli_query($conection,"SELECT * FROM cliente WHERE correo_cliente = '$user' AND contraseña_cliente = '$pass' ");
      $result = mysqli_num_rows($query);

      if($result > 0)
      {
        $data = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['id_cliente'] = $data['id_cliente'];
        $_SESSION['nombre_cliente'] = $data['nombre_cliente'];
        $_SESSION['apellido_cliente'] = $data['apellido_cliente'];
        $_SESSION['telefono_cliente'] = $data['telefono_cliente'];
        $_SESSION['correo_cliente'] = $data['correo_cliente'];
        $_SESSION['id_tipo_documento'] = $data['id_tipo_documento'];
        $_SESSION['cliente_num_doc'] = $data['cliente_num_doc'];
     

        header('location: sistema/cliente.php');
      }
      else
      {
          $alert = 'El usuario o la clave son incorrectos';
          session_destroy();
      }

    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
</head>
<body>
  <section class="contenedor">
    <form id="loginForm" action="" method="post">
    <section class="filtro">
      <div class="subcontenedor sombra">
        <div class="subtitulo">
          <h1>Bienvenidos a Elite Bodas</h1>
            <label for="tipoUsuario">Tipo de usuario: </label>
              <a href="iniciar_sesion.php">Empleado</a>
              |
              <a href="iniciar_sesionC.php">Cliente</a>
        </div>
        <br>  
      <h3>Iniciar Sesión</h3>
        <!-- Ingresar Usuario -->
              <div class="formControl">
                <label for="correo_cliente">Usuario</label>
                <input type="gmail" name="correo_cliente" required placeholder="Ingrese su correo">
              
        <!-- Ingresar Constraseña -->
                <label for="password">Contraseña</label>
                <input type="password" name="contraseña_cliente" placeholder="&#128272; Ingrese su contraseña"> 
                <br>
                <input type="submit" value="INGRESAR">
                </div>
                <div class="alert"><?php echo isset($alert)? $alert: ''; ?></div>
         <div class="bot">
          <ul>
            <ol>  
                 <a href="recuperar.php"><b>He olvidado mi contraseña</b></a>
             </ol>
             <ol>
                   <a href="registro_cliente.php"><b>¿No tienes una cuenta? Registrate Aqui </b></a>
                 </ol>
            </ul>
           </div>
      </form>
    </div>
     </div>
    </section>
  </section>
  </body>
</html>


<br></br>
<br></br>

 
<footer class="footer-distributed">
			<div class="footer-left">
          <img src="css/img/elite.png" style="width: 18%">
				<h3>Euro<span>Bodas</span></h3>
 
				<p class="footer-links">
					<a href="index.php">Inicio</a>
					|
					<a href="Nosotros.php">Sobre Nosotros</a>
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
