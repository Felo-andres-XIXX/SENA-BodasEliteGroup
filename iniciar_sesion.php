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

    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome.css">
 
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
    if(empty($_POST['correo_empleado']) || empty($_POST['contraseña_empleado']))
    {
      $alert = 'Ingrese su usuario y su contraseña';
    }else
    {

      require_once "conexion.php";
      $user = mysqli_real_escape_string($conection, $_POST['correo_empleado']);
      $pass = mysqli_real_escape_string($conection, $_POST['contraseña_empleado']);

      $query = mysqli_query($conection,"SELECT * FROM empleado WHERE correo_empleado = '$user' AND contraseña_empleado = '$pass' ");
      mysqli_close($conection);
      $result = mysqli_num_rows($query);

      if($result > 0)
      {
        $data = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['id_empleado'] = $data['id_empleado'];
        $_SESSION['nombre_empleado'] = $data['nombre_empleado'];
        $_SESSION['apellido_empleado'] = $data['apellido_empleado'];
        $_SESSION['telefono_empleado'] = $data['telefono_empleadoidtipoDocumento'];
        $_SESSION['correo_empleado'] = $data['correo_empleado'];
        $_SESSION['id_documento_emplead'] = $data['id_documento_emplead'];
        $_SESSION['id_tipo_documento'] = $data['id_tipo_documento'];
        $_SESSION['id_cargo'] = $data['id_cargo'];

        if(isset($_SESSION['id_cargo'])){
          switch ($_SESSION['id_cargo']) {
            case 1:
              header('location: sistema/admi.php');
              break;
            case 2:
              header('location: sistema/empleado.php');
              break;
            case 3:   
              header('location: sistema/cliente.php');
              break;
            default:
          }
        }

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
          <a class="botonHome" href="index.php"><span class="fa fa-home fa-2x"></span></a>
            <label for="tipoUsuario">Tipo de usuario: </label>
              <a href="iniciar_sesion.php">Empleado</a>
              |
              <a href="iniciar_sesionC.php">Cliente</a>
        </div>
        <br>  
      <h3>Iniciar Sesión</h3>
        <!-- Ingresar Usuario -->
              <div class="formControl">
                <label for="correo_empleado">Usuario</label>
                <input type="gmail" name="correo_empleado" required placeholder="Ingrese su usuario">
              
        <!-- Ingresar Constraseña -->
                <label for="password">Contraseña</label>
                <input type="password" name="contraseña_empleado" placeholder="&#128272; Ingrese su contraseña"> 
                <br>
                <input type="submit" value="INGRESAR">
                </div>
                <div class="alert"><?php echo isset($alert)? $alert: ''; ?></div>
         <div class="bot">
          <ul>
            <ol>  
                 <a href="recuperar.php"><b>He olvidado mi contraseña</b></a>
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