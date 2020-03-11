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
      $mail = mysqli_real_escape_string($conection, $_POST['correo_cliente']);
      $pass = md5(mysqli_real_escape_string($conection, $_POST['contraseña_cliente']));

      $query = mysqli_query($conection,"SELECT * FROM cliente WHERE correo_cliente = '$mail' AND contraseña_cliente = '$pass' ");
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
          <h1>Bienvenidos Elite Bodas</h1>
        </div>
        <br>  
      <h3>Iniciar Sesión</h3>
        <!-- Ingresar Usuario -->
              <div class="formControl">
                <label for="correo_cliente">Usuario</label>
                <input type="text" name="correo_cliente" required placeholder="Ingrese su correo">
              
        <!-- Ingresar Constraseña -->
                <label for="password">Contraseña</label>
                <input type="password" name="contraseña_cliente" placeholder="&#128272; Ingrese su contraseña"> 
                <br>
                <input type="submit" value="INGRESAR">
                </div>
                <div class="alert"><?php echo isset($alert)? $alert: ''; ?></div>
      </form>
    </div>
     </div>
    </section>
  </section>
  </body>
</html>
